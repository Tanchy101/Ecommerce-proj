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
    <title> Admin Login </title>
    <center>
           <br>
           <br>
           <br>
           <br>
           <br>
           <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "400" height = "380" style = "float: right" >
           <br>
        </center>
        <style>
            .error{
                color:red;
            }
            body {
                font-family: monospace;
                font-weight: bold;
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
            }fieldset {
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
            }   }
        </style>
    </head>

    <body style = "background-color: #ffedc0">
        <fieldset>
        <center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label name = "name"><h2>Admin:</h2></label> <input type="text" name="name" value="<?php echo $name ?>"> <span class="error"><?php echo $nameErr?> </span>
        <br>
        <br>
        <label name = "password"><h2>Password:</h2></label> <input type="password" name="password" value="<?php echo $password ?>"> <span class="error"><?php echo $passwordErr?> </span>
        <br>
        <br>
        <a href = "adminChangePass.php" style = "text-decoration:none">Forgot Password?</a>
        <p class="error"><?php echo $loginErr ?></p>
        </center>
        <br>
            <center> <input type="submit"> </center>
        </form>
        </fieldset>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
