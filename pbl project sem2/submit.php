<?php
// Database connection parameters
$host = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$database = "feedback-skincare"; // Ensure this matches the actual database name

try {
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        throw new Exception("Error: " . $stmt->error);
    }

    // Close connections
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
