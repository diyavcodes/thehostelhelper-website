<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "mydatabase"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$email_id = isset($_POST['email_id']) ? trim($_POST['email_id']) : '';

// Basic validation
if (empty($username) || empty($email_id)) {
    echo 'error'; // Notify client about the missing fields
    exit();
}

// Prepare and execute a query to check the credentials
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email_id = ?");
$stmt->bind_param("ss", $username, $email_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if a matching record was found
if ($result->num_rows > 0) {
    echo 'success'; // Authentication successful
} else {
    echo 'error'; // Authentication failed
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
