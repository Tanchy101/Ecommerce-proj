<?php 
        $conn = mysqli_connect("localhost", "root", "", "loginpage");
        


        $email = $password = $username = $passnomatch = ""; 
        
        if(isset($_POST['submit'])){

            $username = $_POST['usname'];
            $password = $_POST['pass'];
            $email = $_POST['usemail'];
            $errors = array();
         

            $e = "SELECT email FROM login WHERE email = '$email'";
            $ee = mysqli_query($conn, $e);

            $u = "SELECT username FROM login WHERE username = '$username'";
            $uu = mysqli_query($conn, $u);


            if(empty($username)){
                $errors['usernames'] = "Username is empty !";
            }else if(mysqli_num_rows($uu) > 0){
                $errors['usernames'] = "This username already exists!!";
            }

            if(empty($email)){
                $errors['email'] = "Email is empty !";
            }elseif(mysqli_num_rows($ee) > 0){
                $errors['email'] =  "email already exists!!";
            }
            

            if(empty($password)){
                $errors['passwords'] = "password is empty !";
            }

            if($_POST["pass"] !== $_POST["cpassword"]){
                $passnomatch = "password does not match!!";
            }
            
            if(count($errors) == 0){
                $sql = "INSERT INTO login(username, email, password) VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "<script>alert('Account Created!')</script>";
                }
            }
        }  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <style>
        .warning{
            color: red;
        }
    </style>

    <body>
        <h3>Register here</h3>

        <div class = "register">
            <form method = "post" action = "login.php">
                <label for = "usemail" >Email</label> <br>
                <input type = "text" name = "usemail" id = "usemail" placeholder = "Enter email">
                <br>
                <p class = "warning"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>

                <label for = "usname">Username</label> <br>
                <input type = "text" name = "usname" id  = "usname"  placeholder = "Enter username">  
                <br>
                <p class = "warning"> <?php if(isset($errors['usernames'])) echo $errors['usernames'];?></p>

                <label for = "pass" >Password</label> <br>
                <input type = "password" name = "pass" id  = "pass" placeholder = "Enter password">  
                <br>
                <p class = "warning"><?php if(isset($errors['passwords'])) echo $errors['passwords']; ?></p>

                <label for = "cpassword" >Confirm Password</label> <br>
                <input type = "password" name = "cpassword" id  = "cpassword" placeholder = "Confirm password">  
                <br>
                <p><?php echo $passnomatch?></p>
                <br>
                <button name = "submit">SUBMIT</button>
                <br>
                <br>
                <p>Already have an account?<a href = "login.php">Log in here</a></p>

            </form>
        </div>
    </body>
</html>