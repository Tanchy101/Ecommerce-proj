<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $databaseName = "loginpage";
    $port = 3306;

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Selecting / Reading Queery
$sql = "SELECT * FROM `login`";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
    </head>
    <body>
        <?php if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h1>Welcome " . $row["email"] . "</h1>"; 
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <a href="logout.php">Logout</a>
        <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->
    </body>
    </html>