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
            }footer {
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
    }
    
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
        <a href = "adminChangePass.php">Forgot Password?</a>
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
