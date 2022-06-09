<?php

session_start();

 $host = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $databaseName = "thepaperbag";
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

// // Selecting / Reading Queery
// $sql = "SELECT * FROM `userlogin`";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       $userEmail = $row["email"];
//       $userPass = $row["password"];
//     }
//   } else {
//     echo "0 results";
//   }
//   $conn->close();

  // Form Input Process

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $Useremail = test_input($_POST["email"]);
    $Userpassword = test_input($_POST["password"]);

    if (empty($_POST["email"])){
        $emailerror = "Please input email";
    }
    if (empty($_POST["password"])){
        $passworderror = "Please input Password";
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"]))
    {   // Selecting / Reading Query
        $sql = "SELECT * FROM `userlogin` WHERE email = '{$Useremail}' AND password = '{$Userpassword}'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //   $userEmail = $row["email"];
            //   $userPass = $row["password"];
                $_SESSION['user'] = [
                    'id' => $row['id'],
                    'name' => $row['username'],
                    'email' => $row['email']
                ];
                
                header("Location: userHomePage.php");
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        // if (($Useremail == $userEmail) && ($Userpassword == $userPass)){
        //     header("Location: userHomePage.php");
        // }
        // else{
        //     echo "$loginErr = 'Invalid Username or Password!'";
        // }
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
            color: #d3a35d;
            }
        a:hover {
            color: #ffb2a0; 
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
                 font-size: 15px;
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
        }
       footer {
            width: 100%;
            bottom: 0;
            background: linear-gradient(to right, #d3a35d, #ffcbb5);
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
            font-size: 13px;
            line-height: 20px;
        }
        .row {
            width: 85%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
        }
        .col {
            flex-basis: 25%; 
            padding: 10px;
        }
        .logo {
            height: 140px;
            width: 160px;
            margin-bottom: 30px;
        }
        .col h3 {
            width: fit-content;
            margin-bottom: 40px;
            position: relative;
        }
        ul li {
            list-style: none;
            margin-bottom: 12px;
        }
        ul li a {
            text-decoration: none;
            color: #000000;
        }
    </style>

    <body style = "background-color: #ffedc0">
     

        <div class="login">
            <fieldset>
            <form method="POST" action = "loginUser.php">
                <label for ="email"><h2> Email </h2> </label>
                <input type="text" id="email" name="email" placeholder="Enter Email" value = "<?php echo $Useremail ?>">
                <span class="error"><?php echo $emailerror?> </span>
                <label  for="password"><h2> Password </h2></label>
                <input type="password" name="password" id="password" placeholder="Enter Password" value = "<?php echo $Userpassword ?>"> 
                <span class="error"><?php echo $passworderror?> </span>
                <p class="error"><?php echo $loginErr ?></p>
                <p>Don't have an account yet? <a href = "registration.php">Register Here</a></p>
                <input type = "submit" name= "login">
                <a href="adminlogin.php"><p>Login as Admin</p></a>
            </form>
            </fieldset>
    
        </div>
        <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
        <footer>
            <div class = "row">
                <div class = "col">
                    <!--logo-->
                    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo"  class = "logo">
                    <p>A local stationery shop </p>
                    <p>Manila, Philippines.</P>
                    <p> thepaperbag_mnl@gmail.com</P>
                    <h4>(+63) 930 732 9433 </h4>
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                    <ul>
                        <a href = ""><img src = "https://i.imgur.com/TE6yEdE.png" alt = "fb" width = "70" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/TbcePZW.png" alt = "ig" width = "80" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/cuKSoZO.png" alt = "twt" width = "70" height = "60"></a>
                    </ul>
                </div>
                <div class = "col">
                    <h3> Working Hours </h3>
                    <p> Monday - Saturday</p>
                    <p> 8:00 AM - 10:00 PM</p>
                </div>
             </div>
           <hr>
             <center> <p><i> Copryright &copy; 2022 - The Paper Bag.All Right Reserved. </i></p> </center> 
        </footer>
    </body>

</html>