<?php
session_start();

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: course.html");
    exit;
}

$course_id   = (int)$_POST['course_id'];
$full_name   = mysqli_real_escape_string($conn, trim($_POST['full_name'] ?? ''));
$email       = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
$phone       = mysqli_real_escape_string($conn, trim($_POST['phone'] ?? ''));
$qual        = mysqli_real_escape_string($conn, trim($_POST['qualification'] ?? ''));
$interests   = mysqli_real_escape_string($conn, implode(', ', $_POST['interests'] ?? []));
$message     = mysqli_real_escape_string($conn, trim($_POST['message'] ?? ''));

// Validation
if (empty($full_name) || empty($email)) {
    $_SESSION['enrol_error'] = "Name and email are required.";
    header("Location: Enrolment.php?course_id=$course_id");
    exit;
}

// Check for duplicate enrolment
$check = mysqli_query($conn, "SELECT id FROM enrolments WHERE email='$email' AND course_id=$course_id");
if (mysqli_num_rows($check) > 0) {
    $_SESSION['enrol_error'] = "You have already enrolled in this course.";
    header("Location: Enrolment.php?course_id=$course_id");
    exit;
}

// Insert into database
$sql = "INSERT INTO enrolments (course_id, full_name, email, phone, qualification, interests, message)
        VALUES ($course_id, '$full_name', '$email', '$phone', '$qual', '$interests', '$message')";

if (mysqli_query($conn, $sql)) {
    header("Location: enrolment-success.php");
} else {
    $_SESSION['enrol_error'] = "Something went wrong: " . mysqli_error($conn);
    header("Location: Enrolment.php?course_id=$course_id");
}
exit;
?>
