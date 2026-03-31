<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';

// Validate required fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['course'])) {
    http_response_code(400);
    echo "Missing required fields.";
    exit();
}

// Sanitize inputs
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$course = strip_tags(htmlspecialchars($_POST['course']));

// Optional fields (if your form had them, but they're not present in your index.html)
$phone = isset($_POST['phone']) ? strip_tags(htmlspecialchars($_POST['phone'])) : null;
$message = isset($_POST['message']) ? strip_tags(htmlspecialchars($_POST['message'])) : null;

// Connect and insert
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed.";
    exit();
}

$stmt = $conn->prepare("INSERT INTO registrations (name, email, course, phone, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $course, $phone, $message);

if ($stmt->execute()) {
    http_response_code(200);
    echo "Registration successful!";
} else {
    http_response_code(500);
    echo "Failed to register. Please try again.";
}

$stmt->close();
$conn->close();
?>