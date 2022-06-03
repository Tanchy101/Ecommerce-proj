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
        <style>
            .error{
                color:red;
            }
            .success{
                color:green;
            }
        </style>
    </head>

    <body>
        <h1>Admin</h1>



        <h3>Change Username or Password</h3>
        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        New Name:<input type = "text" name = "changename" value = "<?php echo $changename ?>"><span class="error"><?php echo $changenameErr ?> </span>
        <br>
        New Password:<input type = "text" name = "changepass" value = "<?php echo $changepass ?>"><span class="error"><?php echo $changepassErr ?></span>
        <br>
        Confirm New Password:<input type = "text" name = "confirmpass"> <span class="error"> <?php echo $confirmpassErr ?> </span>
        <br>
        <p class="error"><?php echo $notthesameErr;?> </p> <span class="success"> <?php echo $changeAdminSuccess ?> </span>
        <br>
        <input type = "submit">
        </form>


    </body>
</html>