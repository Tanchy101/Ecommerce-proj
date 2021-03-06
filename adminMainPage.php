<?php 
include 'Config.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Welcome to Admin Main Page! </title>
        <img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left" >
        <br>
        <h1> Admin </h1>
        <h2>Welcome to the Admin Main Page!</h2>
    </head>
        <style>
            .error {
                color:red;
            }
            .success {
                color:green;
            }
            body {
                font-family: monospace;
                margin: 25px;
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
            @media screen and (min-width:430px){
                
            }fieldset {
                 background-color: beige;
                 border-radius: 12px;
                 border-color: #d3a35d;
                 min-width: 200;
                 padding: 5px, 5px;
                 font-size: 15px;
            }
            fieldset{
                width: 8%;
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
            .logout{
                position: absolute;
                top: 108px;
                right: 30px;
            }
            .logout:hover{
                -webkit-filter: drop-shadow(3px 3px 3px #926524);
                filter: drop-shadow(3px 3px 3px #926524); 
            }
            .lnk {
                text-decoration: none;
            }
   
        </style>

    <body style = "background-color: #ffedc0">
        <a href = "adminChangePass.php" class = "lnk"><h3>Change password</h3></a>
        <hr style = "color:#d3a35d">
        <div class="logout">
        <a href="adminlogin.php"><img src="https://i.imgur.com/Ua6SIs7.png" alt="Logout"width="35" height="30"></a>
        </div>
        <br>
        <center> <h1> Manage Products </h1> </center>
        <fieldset>
            <center>
        <a href = "adminProducts.php"  class = "lnk">See All Products </a>
        <br>
        <a href = "adminCreateProducts.php"  class = "lnk">Insert a Product</a>
        <br>
        <a href = "adminDeleteProducts.php"  class = "lnk">Delete Products </a>
        <br>
        <a href= "adminEditProducts.php"  class = "lnk">Edit Products </a>
            </center>
        </fieldset>

        <center> <h1> Sales </h1> </center>
        <fieldset>
            <center>
        <a href = "adminViewSales.php" class = "lnk">View Sales and Reports</a>
        <br>
        <a href = "adminSalesStats.php" class = "lnk">Product Stats</a>
        <br>
            </center>
        </fieldset>

        <center> <h1> Shipping </h1> </center>
        <fieldset>
            <center>
        <a href = "adminUpdateShipping.php" class = "lnk">Update Shipping Status</a>
        <br>
            </center>
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