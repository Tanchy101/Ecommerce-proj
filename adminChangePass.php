<?php 

include "Config.php";

// Change Password Form

$changename = $changepass = $confirmpass = "";
$changenameErr = $changepassErr = $confirmpassErr = $notthesameErr ="";
$changeAdminSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $emptyChecker = 0;

    if (empty($_POST["changename"])){
        $changenameErr = "Please Input a New Name";
    }
    else{
        $emptyChecker++;
        $changename = ($_POST["changename"]);
    }
    if (empty($_POST["changepass"])){
        $changepassErr = "Please Input a New Password";
    }
    else{
        $emptyChecker++;
        $changepass = ($_POST["changepass"]);
    }
    if (empty($_POST["confirmpass"])){
        $confirmpassErr = "Required";
    }
    else{
        $emptyChecker++;
        $confirmpass = ($_POST["confirmpass"]);
    }

    if ($emptyChecker == 3){
        if($changepass == $confirmpass){
            $notthesameErr = "";
            $sqlname = "UPDATE adminlogin SET adminName='$changename' WHERE id=1";
            $sqlpass = "UPDATE adminlogin SET adminPass='$changepass' WHERE id=1";
            if (($conn->query($sqlname) === TRUE) && ($conn->query($sqlpass) === TRUE)) {
                $changeAdminSuccess = "Name and Password changed succesfully";
              } else {
                $changeAdminSuccess = "Error updating record: " . $conn->error;
              }
          
        }
        else{
            $notthesameErr = "Password and Confirm Password are not the same";
        }
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Change Pass </title>
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
            .success{
                color:green;
            }
            head, body {
                font-family: monospace;
                margin: 25px;
                font-weight: bold;
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
            footer {
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

    }
        </style>
    </head>

    <body style = "background-color: #ffedc0">
        <center> <h1>Admin</h1> </center>
        <fieldset>
        <h2>Change Username or Password</h2>
        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        New Name:<input type = "text" name = "changename" value = "<?php echo $changename ?>"><span class="error"><?php echo $changenameErr ?> </span>
        <br>
        <br>
        New Password:<input type = "text" name = "changepass" value = "<?php echo $changepass ?>"><span class="error"><?php echo $changepassErr ?></span>
        <br>
        <br>
        Confirm New Password:<input type = "text" name = "confirmpass"> <span class="error"> <?php echo $confirmpassErr ?> </span>
        <br>
        <br>
        <p class="error"><?php echo $notthesameErr;?> </p> <span class="success"> <?php echo $changeAdminSuccess ?> </span>
        <br>
        <center> <input type = "submit"> </center>
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