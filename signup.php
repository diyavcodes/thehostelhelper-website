<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_POST); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['email_id']) && isset($_POST['college_name'])) {
        $username = $_POST['username'];
        $email_id = $_POST['email_id'];
        $college_name = $_POST['college_name'];

        $conn = new mysqli('localhost', 'root', '', 'mydatabase');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email_id, college_name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email_id, $college_name);
            $stmt->execute();
            echo "Registration successful";
            $stmt->close();
            $conn->close();
        }
    } else {
        die("Form data missing");
    }
} else {
    die("Invalid request method");
}
?>

