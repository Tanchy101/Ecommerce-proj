<?php
// Database
$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$databaseName = "admin";
$port = 3306;

$conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

$sql = "SELECT username, password FROM admin";
$result = $conn->query($sql);

$name = $password = $adminName = $adminPass = "";
$nameErr = $passwordErr = $loginErr = "";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $adminName = $row["username"];
      $adminPass = $row["password"];
    }
  } else {
    echo "0 results";
  }
  $conn->close();

  
// Form Input Process

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);

    if (empty($_POST["name"])){
        $nameErr = "Please input Username";
    }
    if (empty($_POST["password"])){
        $passwordErr = "Please input Password";
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"]))
    {
        if (($name == $adminName) && ($password == $adminPass)){
            header("Location: adminpage.php");
        }
        else{
            $loginErr = "Invalid Username or Password!";
        }
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .error{
                color:red;
            }
        </style>
    </head>

    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="name" value="<?php echo $name ?>"> <span class="error"><?php echo $nameErr?> </span>
        <br>
        Password: <input type="password" name="password" value="<?php echo $password ?>"> <span class="error"><?php echo $passwordErr?> </span>
        <br>
        <p class="error"><?php echo $loginErr ?></p>
        <br>
        <input type="submit">
        </form>
        
    </body>

</html>

<?php

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $password;
?>