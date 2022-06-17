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
            echo "<script>alert('Wrong Username or Password')</script>";
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

        .link{
            text-decoration: none;  
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
        } footer {
            width: 100%;
            bottom: 0;
            background: linear-gradient(to right, #d3a35d, #ffcbb5);
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
            font-size: 13px;
            line-height: 5px;
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
            .btn{
                overflow: hidden;
                background-color: beige;
                color: #d3a35d;
                border: 1px solid #d3a35d;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-decoration: none;
                font-family: monospace;
                font-weight: bold;
                font-size: 16px;
                padding: 20px 50px;
                position: relative;
                border-radius: 30px;
                box-shadow: 0 0 0 0  rgba(143, 64, 248, 0.5), 0 0 0 0 rgba(39, 200, 255, 0.5);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .btn:hover{
                transform: translate(0, -6px);
                box-shadow: 10px -10px 25px 0  rgba(143, 64, 248, 0.5), -10px 10px 25px 0  rgba(39, 200, 255, 0.5);
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
                <p>Don't have an account yet? <a class ="link" href = "registration.php">Register Here</a></p>
                <p><a class ="link" href = "userHomePage.php">Continue as Guest</a></p>
                <center><input type = "submit" name = "login" class = "btn"><center>
                <a class ="link" href="adminlogin.php"><p>Login as Admin</p></a>
            </form>
            </fieldset>
            <br>
        </div>
        <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
        <footer>
            <div class = "row">
                <div class = "col">
                    <!--logo-->
                    <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo"  class = "logo">
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                    <ul>
                         <a href = "https://www.facebook.com/?stype=lo&jlou=Afdo9_8IzKjd-98S53hgWcs_YTL09G0gr2QFRljr_iv46_YAcls5iVZeqmHpGZC539as2z3YZrVmDMN4Fa7qZwlkDHYfPePzF_auNbBsMVT-8g&smuh=35351&lh=Ac-aDteK0xAi75BCmxY"><img src = "https://i.imgur.com/juyHCD8.png" alt = "fb" width = "70" height = "70"></a> 
                         <a href = "https://www.instagram.com/accounts/login/"><img src = "https://i.imgur.com/VoN7z9i.png" alt = "ig" width = "70" height = "70"></a> 
                         <a href = "https://twitter.com/"><img src = "https://i.imgur.com/yWnTdsy.png" alt = "twt" width = "70" height = "70"></a>

                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "email" width = "25" height = "25"></a> thepaperbag_mnl@gmail.com <a href = "#"> </p>
                         <p><img src = "https://i.imgur.com/QacTXH9.png" alt = "phone" width = "25" height = "25"></a> (+63) 930 7329 433</p>
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