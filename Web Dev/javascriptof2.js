document.addEventListener('DOMContentLoaded', function () {
    var tabTriggerList = [].slice.call(document.querySelectorAll('button[data-bs-toggle="tab"]'))
    tabTriggerList.map(function (tabTriggerEl) {
        var tabTrigger = new bootstrap.Tab(tabTriggerEl)
        tabTriggerEl.addEventListener('click', function () {
            console.log('Tab changed!');
        })
    })
})
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Database connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "users";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


// $sname = $conn->real_escape_string(trim($_POST['sname']));

// $college_name = $conn->real_escape_string(trim($_POST['college_name']));

// $sql = "INSERT INTO users (username, college_name) VALUES ('$sname', '$college_name')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
// 