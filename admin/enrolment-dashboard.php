<?php
session_start();
// Use same admin authentication as your existing admin panel
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$search = $_GET['search'] ?? '';
$filter = (int)($_GET['course'] ?? 0);

$where = "WHERE 1=1";
if ($search) $where .= " AND (e.full_name LIKE '%$search%' OR e.email LIKE '%$search%')";
if ($filter) $where .= " AND e.course_id = $filter";

$result = mysqli_query($conn, "SELECT e.*, c.name as course_name 
    FROM enrolments e JOIN courses c ON e.course_id = c.id 
    $where ORDER BY e.enrolled_at DESC");

$courses = mysqli_query($conn, "SELECT id, name FROM courses");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enrolment Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<div class="container mt-4">
    <h2>Course Enrolments</h2>
    <form method="GET" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search" value="<?= htmlspecialchars($search) ?>">
        <select name="course" class="form-control mr-2">
            <option value="">All Courses</option>
            <?php while($c = mysqli_fetch_assoc($courses)): ?>
                <option value="<?= $c['id'] ?>" <?= $filter==$c['id']?'selected':'' ?>><?= $c['name'] ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Interests</th><th>Date</th></tr>
        </thead>
        <tbody>
        <?php while($e = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= htmlspecialchars($e['full_name']) ?></td>
                <td><?= htmlspecialchars($e['email']) ?></td>
                <td><?= htmlspecialchars($e['course_name']) ?></td>
                <td><?= htmlspecialchars($e['interests']) ?></td>
                <td><?= date('d M Y', strtotime($e['enrolled_at'])) ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>