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
            button{
                background-color: beige;
                color: #d3a35d;
            }
            .btn{
                overflow: hidden;
                border: 1px solid #d3a35d;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-decoration: none;
                padding: 20px 50px;
                position: relative;
                border-radius: 30px;
                box-shadow: 0 0 0 0  rgba(143, 64, 248, 0.5), 0 0 0 0 rgba(39, 200, 255, 0.5);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .btn::after{
                content: "";
                width: 700px;
                height: 400px;
                position: absolute;
                top: -50px;
                left: -100px;
                background-color: #ff3cac;
                background-image: linear-gradient(225deg, #ffb2a0 0%, #ffcbb5 50%, #d3a35d 100%);
                z-index: -1;
                transition: transform 0.5s ease;
            }
            .btn:hover{
                transform: translate(0, -6px);
                box-shadow: 10px -10px 25px 0  rgba(143, 64, 248, 0.5), -10px 10px 25px 0  rgba(39, 200, 255, 0.5);
                color: white;
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
                <center> <button name = "submit" class = "btn">SUBMIT</button> </center>
                <br>
                <br>
                <p>Already have an account? &nbsp;<a href = "loginUser.php">Log in here</a></p>
            </form>
    </fieldset>
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