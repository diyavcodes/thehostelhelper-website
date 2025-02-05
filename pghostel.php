<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['area'])) {
    $selectedArea = $_POST['area'];
    error_log("Selected area: " . $selectedArea); 

    if (!empty($selectedArea) && $selectedArea !== 'Select') {
        
        $sql = "SELECT name, address, price, photo FROM hostels WHERE area = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $selectedArea);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            error_log("Query execution failed: " . $stmt->error);
            die("Query execution failed: " . $stmt->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3' style='max-width: 600px; max-height:200px'>
                         <div class='row g-0'>
                              <div class='col-md-4'>
                        <img src='" . htmlspecialchars($row['photo']) . "' class='img-fluid rounded-start' alt='Photo of " . htmlspecialchars($row['name']) . "'>
                        </div>
                        <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>
                            <p class='card-text'>" . htmlspecialchars($row['address']) . "</p>
                            <p class='card-text'>Rent: Rs." . htmlspecialchars($row['price']) . "</p>
                        </div>
                     </div>
                    </div>
                     </div>
                      ";
            }
        } else {
            echo "<p>No hostels found in this area.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Please select a valid area.</p>";
    }
} else {
    echo "<p>No area selected.</p>";
}

$conn->close();
?>
