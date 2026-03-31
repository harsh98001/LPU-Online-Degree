<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch contacts
$contacts = [];
$result = $conn->query("SELECT * FROM contacts ORDER BY submitted_at DESC");
if ($result) $contacts = $result->fetch_all(MYSQLI_ASSOC);

// Fetch registrations
$registrations = [];
$result = $conn->query("SELECT * FROM registrations ORDER BY submitted_at DESC");
if ($result) $registrations = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .tab-content { margin-top: 20px; }
        table th, table td { vertical-align: middle; }
        .preview { max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Admin Dashboard</h2>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="registrations-tab" data-toggle="tab" href="#registrations" role="tab">Registrations</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Contacts Tab -->
            <div class="tab-pane fade show active" id="contacts" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($contacts)): ?>
                                <tr><td colspan="6">No contact messages yet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($contacts as $c): ?>
                                <tr>
                                    <td><?php echo $c['id']; ?></td>
                                    <td><?php echo htmlspecialchars($c['name']); ?></td>
                                    <td><?php echo htmlspecialchars($c['email']); ?></td>
                                    <td><?php echo htmlspecialchars($c['subject']); ?></td>
                                    <td class="preview" title="<?php echo htmlspecialchars($c['message']); ?>">
                                        <?php echo htmlspecialchars(substr($c['message'], 0, 80)) . (strlen($c['message']) > 80 ? '...' : ''); ?>
                                    </td>
                                    <td><?php echo $c['submitted_at']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Registrations Tab -->
            <div class="tab-pane fade" id="registrations" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Phone</th><th>Message</th><th>Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($registrations)): ?>
                                <tr><td colspan="7">No registrations yet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($registrations as $r): ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo htmlspecialchars($r['name']); ?></td>
                                    <td><?php echo htmlspecialchars($r['email']); ?></td>
                                    <td><?php echo htmlspecialchars($r['course']); ?></td>
                                    <td><?php echo htmlspecialchars($r['phone']); ?></td>
                                    <td class="preview" title="<?php echo htmlspecialchars($r['message']); ?>">
                                        <?php echo htmlspecialchars(substr($r['message'], 0, 80)) . (strlen($r['message']) > 80 ? '...' : ''); ?>
                                    </td>
                                    <td><?php echo $r['submitted_at']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>