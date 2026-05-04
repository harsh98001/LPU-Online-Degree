<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h1>Database Connection Successful!</h1>";

// Check if courses table exists
$result = mysqli_query($conn, "SHOW TABLES LIKE 'courses'");
if (mysqli_num_rows($result) == 0) {
    echo "<p style='color:red'>❌ Courses table does not exist! Please run the SQL query above.</p>";
} else {
    echo "<p>✅ Courses table exists.</p>";
    
    // Get all courses
    $courses = mysqli_query($conn, "SELECT * FROM courses");
    if (mysqli_num_rows($courses) == 0) {
        echo "<p style='color:red'>❌ No courses found in database. Please insert the courses.</p>";
    } else {
        echo "<h2>Courses in Database:</h2>";
        echo "<ul>";
        while($course = mysqli_fetch_assoc($courses)) {
            echo "<li>ID: {$course['id']} | Slug: {$course['slug']} | Name: {$course['name']}</li>";
        }
        echo "</ul>";
    }
}

// Test the slug parameter
$slug = isset($_GET['slug']) ? $_GET['slug'] : 'none';
echo "<h2>Testing URL Parameter:</h2>";
echo "<p>Current slug from URL: <strong>" . htmlspecialchars($slug) . "</strong></p>";

// Try to fetch course with slug
if ($slug != 'none') {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE slug = '$slug'");
    if (mysqli_num_rows($result) > 0) {
        $course = mysqli_fetch_assoc($result);
        echo "<p style='color:green'>✅ Course found: " . $course['name'] . "</p>";
    } else {
        echo "<p style='color:red'>❌ No course found with slug: " . $slug . "</p>";
    }
}

echo "<br><a href='course.html'>← Back to Courses Page</a>";
?>