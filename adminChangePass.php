<?php 
//Database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "admin";
$port = 3306;

$conn = new mysqli($servername, $dbusername, $dbpassword, $database, $port);

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
            }
            fieldset{
                width: 40%;
                min-width: 320px;
                margin: auto;
            }
    }
        </style>
    </head>

    <body style = "background-color: #ffedc0">
        <center> <h1>Admin</h1> </center>
        <fieldset>
        <h3>Change Username or Password</h3>
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
        <input type = "submit">
        </form>
        </fiedset

    </body>
</html>