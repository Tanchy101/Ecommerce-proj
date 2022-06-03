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

$Useremail = $Userpassword = $userName = $userPass = "";
$emailerror = $passworderror = $loginErr = "";

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
        $emailerror = "Please input email";
    }
    if (empty($_POST["password"])){
        $passworderror = "Please input Password";
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
        <title> User Login </title>
           <center>
           <br>
           <br>
           <br>
           <br>
           <br>
           <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "400" height = "380" style = "float: right" >
           <br>
           </center>
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
        head, body {
            font-family: monospace;
            margin: 25px;
        }
        a:link {
        color: #000000;
            }
        a:visited {
            color: #ffb2a0;
            }
        a:hover {
            color: #d3a35d; 
            }
        a.active {
            color: #ffcbb5;
            }    
            @media screen and (min-width:430px) 
            {
            fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
    }
    </style>

    <body style = "background-color: #ffedc0">
     

        <div class="login">
            <fieldset>
            <form method="post" action = "UserHomePage.php">
                <label for ="email"><h2> Email </h2> </label>
                <input type="text" id="email" name="email" placeholder="Enter Email" value = "<?php echo $Useremail ?>">
                <span class="error"><?php echo $emailerror?> </span>
                <label  for="password"><h2> Password </h2></label>
                <input type="password" name="password" id="password" placeholder="Enter Password" value = "<?php echo $Userpassword ?>"> 
                <span class="error"><?php echo $passworderror?> </span>
                <p class="error"><?php echo $loginErr ?></p>
                <p>Don't have an account yet? <a href = "registration.php">Register Here</a></p>
                <input type = "submit">
                <a href="AdminloginTo.php"><p>Login as Admin</p></a>
            </form>
            </fieldset>

        </div>
        <br><br>
    </body>

</html>