<?php
$username= $_POST['username'];
$college_name= $_POST['college_name'];

$conn = new mysqli('localhost', 'root', '', 'mydatabase');

if ($conn->connect_error) {
        die("Connection failed: " .$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into users(username,college_name) values(?,?)");
        $stmt->bind_param("ss", $username, $college_name);
        $stmt->execute();
        echo "registration successful";
        $stmt->close();
        $conn->close();

    }
    ?>

