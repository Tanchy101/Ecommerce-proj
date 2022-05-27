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
 
// echo "connected succesfully";

$Username = $Userpassword = $userName = $userPass = "";
$nameErr = $passwordErr = $loginErr = "";

// Selecting / Reading Queery
$sql = "SELECT * FROM `login`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $userEmail = $row["email"];
      $userPass = $row["password"];
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
    $Useremail = test_input($_POST["email"]);
    $Userpassword = test_input($_POST["password"]);

    if (empty($_POST["email"])){
        $nameErr = "Please input Username";
    }
    if (empty($_POST["password"])){
        $passwordErr = "Please input Password";
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"]))
    {
        if (($Useremail == $userEmail) && ($Userpassword == $userPass)){
            header("Location: usermainpage.php");
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
        <title>Ecommerce Title</title>
    </head>

    <style>
        h3{
            text-align: center;
        }
        .login{
            text-align: center;
        }
        .error{
                color:red;
            }
        
    </style>

    <body>
        <h3>ECOMMERCE TITLE</h3>

        <div class="login">
            <form method="post" action = "usermainpage.php">
                <label id="usr" name="user">Email</label><br>
                <input type="text" id="usr" name="user" placeholder="Enter Email" value = "<?php echo $Useremail ?>"><span class="error"><?php echo $nameErr?> </span>
                <br>
                <br>
                <label id="psw" name="password">Password</label><br>
                <input type="password" name="password" id="psw" placeholder="Enter Password" value = "<?php echo $Userpassword ?>"> <span class="error"><?php echo $passwordErr?> </span>
                <br><br><br>
                <input type = "submit">
                <br><br>
                <a href="AdminloginTo.php"><p>Login as Admin</p></a>
            </form>

        </div>
        <br><br>
    </body>

</html>