<?php

include "Config.php";


$name = $password = $adminName = $adminPass = "";
$nameErr = $passwordErr = $loginErr = "";

// Selecting / Reading Queery
$sql = "SELECT * FROM `adminlogin`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $adminName = $row["adminName"];
      $adminPass = $row["adminPass"];
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
            header("Location: adminMainPage.php");
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
        <label name = "name">Admin:</label> <input type="text" name="name" value="<?php echo $name ?>"> <span class="error"><?php echo $nameErr?> </span>
        <br>
        <label name = "password">Password:</label> <input type="password" name="password" value="<?php echo $password ?>"> <span class="error"><?php echo $passwordErr?> </span>
        <br>
        <a href = "adminChangePass.php">Forgot Password?</a>
        <p class="error"><?php echo $loginErr ?></p>
        <br>
        <input type="submit">
        </form>
        
    </body>

</html>
