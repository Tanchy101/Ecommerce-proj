<?php
session_start();
include 'Config.php';

if (!empty($_SESSION['user'])) {
    // Get ALL user details from database using user id
    $sql = "SELECT * FROM userlogin WHERE id ='{$_SESSION["user"]["id"]}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
    
       while($row = $result->fetch_assoc()) {
           $user = $row;
      }
    } else {
        session_destroy();
        header("Location: loginUser.php");
    }
} else {
    session_destroy();
    header("Location: loginUser.php");
}

if(isset($_POST['edituser'])){
    $idemail = $_POST['email'];
    $changeusername = $_POST['username'];
    $changefirstname = $_POST['firstname'];
    $changelastname = $_POST['lastname'];
    $changeaddress = $_POST['address'];
    $changecontact = $_POST['contact'];

    $sql = "UPDATE userlogin SET username = '$changeusername', firstname = '$changefirstname', lastname = '$changelastname',
    address = '$changeaddress', contact = '$changecontact' WHERE email = '$idemail'";
    $result = $conn->query($sql); 
    if($result == TRUE){
        $_SESSION['succ'] = "Profile Succesfully Updated!";
        header("Location: profile.php");
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    
        .search {
  width: 100%;
  position: relative;
  display: flex;
  
}

.searchTerm {
  width: 100%;
  border: 3px solid #d3a35d;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color:#d3a35d;
}

.searchTerm:focus{
  color: #d3a35d;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #d3a35d;
  background:#d3a35d;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
    float: right;
    text-align: center;
    padding: 10px 10px;
    width: 35%;
}
        .topnav a {
            float: right;
            text-align: center;
            padding: 14px 15px;
        }

       

      
        
        .category li {
            float: left;
            display: inline;
            text-align: center;
            padding: 14px 15px;
            
        }

        h2 {
            padding: 0;
            float: left;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .featured {
        border: 2px solid #ccc;
        float: left;
        width: 220px;
        margin-left: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 20px;
        }

        div.feature:hover {
        border: 1px solid #777;
        }

        .featimg {
        width: 220px;
        height: 200px;
        }

        .desc {
        padding: 15px;
        text-align: center;
        }

        .drawLine {
        position: relative;
        }

        .drawLine:before {
        content: "";
        position: absolute;
        top: 50%; 
        left: 0;
        width: 100%;
        height: 1px;
        background: gray;
        }

        .drawLine span {
        display:inline-block;
        background: white;
        position: relative;
        padding-right: 5px; 
        }
        body {
            font-family: monospace;
            margin:25px;
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

        .tabs ul{
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        background-color: #d3a35d;
        position: -webkit-sticky; /* Safari */
        position: sticky;
        top: 0;
        
        }

        .tabs li {
        float: left;
        margin-left: 30px;
        
        }

        .tabs li input {
        display: block;
        border: 1px #d3a35d;   
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        background-color: #d3a35d;
        }

        .tabs li input:hover {
        background-color: #f9c389;
        }
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
            left: 0;
           

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
            flex-basis: 20%; 
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
             .col  li {
            list-style: none;
            margin-bottom: 12px;
            
             }
             .col  li a {
            text-decoration: none;
            color: #000000;
            }
            .btn{
                font-family: monospace;
                overflow: hidden;
                background-color: beige;
                color: #d3a35d;
                border: 1px solid #d3a35d;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-decoration: none;
                padding: 15px 30px;
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
        
        <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->

        <!-- cart and profile under nito-->
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="logoutFileForUsers.php"><img src="https://i.imgur.com/Ua6SIs7.png" alt="Cart"width="35" height="30"></a>
            <a href="addtoCart.php"><img src="https://i.imgur.com/izpY4HG.png" alt="Cart"width="30" height="30"></a>
            <a href="profile.php"><img src="https://i.imgur.com/9Sd1au3.png" alt="Cart"width="35" height="30"></a>
            <a href="userHomePage.php"><img src="https://i.imgur.com/hVZsoCl.png" alt="Cart"width="35" height="30"></a>
           
            <div class="wrap">
                <div class="search">
                <input type="text" class="searchTerm" placeholder="Search">
                <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
             </button>
            </div>
        </div>
        
    <br><br><br><br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    
    
    <h2> Your Profile</h2>
    <br><br><br>
    <hr>
    <div class="row"> 
        <h3 class="drawLine"></h3>        
    </div>
    <br><br>


    <div align = "center">
        <fieldset>
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Personal Information </h2>
            <br><br><br>
        <form method= "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for = "email">Enter email</label><br><br>
            <input type = "text" name = "email" required><br><br>

            <label for = "username">New Username:</label><br><br>
            <input type = "text" name = "username"><br><br>

            <label for = "firstname">New First Name:</label><br><br>
            <input type = "text" name = "firstname"><br><br>

            <label for = "lastname">New Last Name:</label><br><br>
            <input type = "text" name = "lastname"><br><br>

            <label for = "address">New Address:</label><br><br>
            <input type = "text" name = "address"><br><br>

            <label for = "contact">New Contact:</label><br><br>
            <input type = "text" name = "contact"><br><br>

            <center><input type = "submit" name = "edituser" class = "btn"><center>
        </form>
        </fieldset>
        <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
    </div>
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