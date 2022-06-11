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
        <title>Edit Info</title>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
    
        .topnav a {
            float: right;
            text-align: center;
            padding: 14px 16px;
        }

        .topnav .search-container   {
        float: right;
        padding: 10px 10px;
        }

      
        
        .category li {
            float: left;
            display: inline;
            text-align: center;
            padding: 14px 16px;
            margin-left : 15px;
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
        width: 100%;
        height: auto;
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
        } fieldset {
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
            }
    </style>
    <body style = "background-color: #ffedc0">
        
        <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->

        <!-- cart and profile under nito-->
        <div class="topnav">
            <br>
            <h2>The Paper Bag.</h2>
            <a href="logoutFileForUsers.php">Logout</a>
            <a class="active" href="#">Cart</a>
            <a href="profile.php"><?= $user['username']; ?>'s Profile</a>
            <a href="userHomePage.php">Home</a>
           
                <div class="search-container">
                    <form action="search.php ">
                        <input type="text" placeholder="Search " size="50" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-- PARA SA CATEGORY , PAKI EDIT NALANG NG NAMES NG CATEGORY 
AND KAPAG MAY NAGAWA NG LINK FOR ANOTHER PAGE PAKI EDIT SA href -->
<hr style = "color:#d3a35d">
    <div class="category">
        <li><a href="Paper_subfolder/PaperCategoryPage.php">Papers</a></li>
        <li><a href="Pencil_subfolder/PencilCategoryPage.php">Pencils</a></li>
        <li><a href="Ballpens_subfolder/BallpensCategoryPage.php">Ballpens</a></li>
        <li><a href="Markers_subfolder/MarkersCategoryPage.php">Markers</a></li>
        <li><a href="Arts&Crafts_subfolder/Arts&CraftsCategoryPage.php">Arts & Crafts</a></li>
        <li><a href="Erasers_subfolder/ErasersCategoryPage.php">Erasers</a></li>
        <li><a href="Notebooks_subfolder/NotebooksCategoryPage.php">Notebooks</a></li>
        <li><a href="Journals_subfolder/JournalsCategoryPage.php">Journals</a></li>
        <li><a href="Planners_subfolder/PlannersCategoryPage.php">Planners</a></li>
        <li><a href="OfficeSupplies_subfolder/OfficeSuppliesCategoryPage.php">Office Supplies</a></li>
    </div>
    <br><br><br><br><br><br><br>
    <!--Line lang to pang layout tas name ng section -->
    <div class="row"> 
        <h3 class="drawLine"><span >Your Profile</span></h3>        
    </div>


    <div align = "center">
        <fieldset>
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Personal Information </h2>
            <br><br><br>
        <form method= "post" action = "">
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

            <center> <button name = "edituser">Submit</button> </center>

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