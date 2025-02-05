<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$area = isset($_GET['area']) ? $_GET['area'] : '';
$sql = "SELECT * FROM hostels WHERE area LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$area%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<div class="hostel-item">';
    echo '<h5>' . htmlspecialchars($row['name']) . '</h5>';
    echo '<p><strong>Address:</strong> ' . htmlspecialchars($row['address']) . '</p>';
    echo '<p><strong>Price:</strong> ₹' . htmlspecialchars($row['price']) . '</p>';
    if (!empty($row['photo'])) {
        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Hostel Photo">';
    }
    echo '</div>';
}

$stmt->close();
$conn->close();
?>
