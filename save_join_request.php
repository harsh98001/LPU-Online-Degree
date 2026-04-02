<?php
// save_join_request.php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lpu_online";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed"]);
    exit();
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$state = $_POST['state'] ?? '';
$course = $_POST['course'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($state) || empty($course)) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO join_requests (name, email, phone, state, course) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $state, $course);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Thank you! We will contact you soon."]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>