<?php 
        session_start();
        $conn = mysqli_connect("localhost", "root", "", "thepaperbag");
        


        $email = $password = $username = $passnomatch = ""; 
        $address = $lastname = $firstname = $contact = "";
        if(isset($_POST['submit'])){


            $address = $_POST['address'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $contact = $_POST['contactnum'];

            $username = $_POST['usname'];
            $password = $_POST['pass'];
            $email = $_POST['usemail'];
            $errors = array();
         
            


            $e = "SELECT email FROM userlogin WHERE email = '$email'";
            $ee = mysqli_query($conn, $e);

            $u = "SELECT username FROM userlogin WHERE username = '$username'";
            $uu = mysqli_query($conn, $u);

            if(empty($firstname)){
                $errors['firstname'] = "First Name is empty !";
            }

            if(empty($lastname)){
                $errors['lastname'] = "Last Name is empty !";
            }

            if(empty($address)){
                $errors['address'] = "Address is empty !";
            }

            if(empty($contact)){
                $errors['contactnum'] = "Contact Number is empty !";
            }

        
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
                // $contact = (int)$contact;
                $sql = "INSERT INTO userlogin 
                    (username, email, password, firstname, lastname, address, contact) 
                    VALUES ('$username', '$email', '$password', '$firstname', '$lastname', '$address', '$contact')";
                  
                $result = mysqli_query($conn, $sql);

                if($result){
                    //basta kinukuha nya data galing database
                    $select = mysqli_query($conn, "SELECT * FROM userlogin WHERE username = '$username' AND password = '$password'");
                    $fetch = mysqli_num_rows($select);
                    if($fetch > 0){
                        $row = mysqli_fetch_assoc($select);
                        $_SESSION['user_name'] = $row['username'];
                        header("Location:loginUser.php");
                    }
                    echo "<script>alert('Account Created!')</script>";
                    header("Location:loginUser.php");
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
        body {
            font-family: monospace;
            font-weight: bold;
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
            }
            fieldset{
                width: 8%;
                min-width: 320px;
                margin: auto;
                font-size: 15px;
            }
            }
            .footer {
                padding: 45px 0 20px;
                margin-top: 25px;
                line-height: 10px;
                background-color: #ffcbb5;
                font-size: 15px;
            }
            .footer hr
            {
                border-top-color:#bbb;
                opacity:0.5
            }
            .footer hr.small
            {
                 margin:20px 0
            }
            .footer h6
            {
                color:#000000;
                font-size:16px;
                text-transform:uppercase;
                margin-top:5px;
                letter-spacing:2px;
            }
    </style>

<body style = "background-color: #ffedc0">
        

        <div class = "register">
            <center>
           <br>
           <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "400" height = "380" align: "center" >
           <br>
        </center>
            <fieldset>
                <center> <h2>Registration Form</h2> </center>
            <form method = "post" action = "">
                <label for = "usemail" >Email</label> <br>
                <input type = "text" name = "usemail" id = "usemail" placeholder = "Enter email">
                <br>
                <p class = "warning"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>

                <label for = "usname">Username</label> <br>
                <input type = "text" name = "usname" id  = "usname"  placeholder = "Enter username">  
                <br>
                <p class = "warning"> <?php if(isset($errors['usernames'])) echo $errors['usernames'];?></p>

                <label for = "usname">First Name</label> <br>
                <input type = "text" name = "firstname"   placeholder = "Enter First Name">  
                <br>
                <p class = "warning"> <?php if(isset($errors['firstname'])) echo $errors['firstname'];?></p>

                <label for = "usname">Last Name</label> <br>
                <input type = "text" name = "lastname"   placeholder = "Enter Last Name">  
                <br>
                <p class = "warning"> <?php if(isset($errors['lastname'])) echo $errors['lastname'];?></p>

                <label for = "usname">Contact Number</label> <br>
                <input type = "number" name = "contactnum"   placeholder = "e.g 09226818369">  
                <br>
                <p class = "warning"> <?php if(isset($errors['contactnum'])) echo $errors['contactnum'];?></p>

                <label for = "usname">Address</label> <br>
                <input type = "text" name = "address"   placeholder = "Enter Adress">  
                <br>
                <p class = "warning"> <?php if(isset($errors['address'])) echo $errors['address'];?></p>

                <label for = "pass" >Password</label> <br>
                <input type = "password" name = "pass" id  = "pass" placeholder = "Enter password">  
                <br>
                <p class = "warning"><?php if(isset($errors['passwords'])) echo $errors['passwords']; ?></p>

                <label for = "cpassword" >Confirm Password</label> <br>
                <input type = "password" name = "cpassword" id  = "cpassword" placeholder = "Confirm password">  
                <br>
                <p><?php echo $passnomatch?></p>
                <br>
                <center> <button name = "submit">SUBMIT</button> </center>
                <br>
                <p>Already have an account?<a href = "loginUser.php">Log in here</a></p>

            </form>
    </fieldset>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
              <center> <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "120" height = "110"> </center>
          </div>

          <div class="col-xs-6 col-md-3">
            <!-- <h6>Follow us on</h6>
            <a href= #><img src = "https://i.imgur.com/TbcePZW.png"  height = 100px weight = 100px></a>  
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Working Hours</h6> -->
              
        <hr style = "color:#d3a35d">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <center> <p class="copyright-text">
                Copyright &copy; 2022 All Rights Reserved by The Paper Bag.
            </p> </center>  
        </div>
    </body>
</html>