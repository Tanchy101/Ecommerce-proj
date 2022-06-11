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
        </style>

    <body style = "background-color: #ffedc0">
        <a href = "adminChangePass.php"><h3>Change password</h3></a>
        <hr style = "color:#d3a35d">
        
        <br>
        <center> <h1> Manage Products </h1> </center>
        <fieldset>
            <center>
        <a href = "adminProducts.php">See All Products </a>
        <br>
        <a href = "adminCreateProducts.php">Insert a Product</a>
        <br>
        <a href = "adminDeleteProducts.php">Delete Products </a>
        <br>
        <a href= "adminEditProducts.php">Edit Products </a>
            </center>
        </fieldset>

        <center> <h1> Manage Vouchers </h1> </center>
        <fieldset>
            <center>
        <a href = "adminVouchers.php">See All Vouchers </a>
        <br>
        <a href = "adminCreateVoucher.php">Create Vouchers</a>
        <br>
        <a href = "adminDeleteVoucher.php">Delete Vouchers </a>
        <br>
        <a href= "adminEditVoucher.php">Edit Vouchers </a>
            </center>
        </fieldset>

        <center> <h1> Sales </h1> </center>
        <fieldset>
            <center>
        <a href = "adminVouchers.php">View Sales</a>
        <br>
        <a href = "adminCreateVoucher.php">Create Vouchers</a>
        <br>
        <a href = "adminDeleteVoucher.php">Delete Vouchers </a>
        <br>
        <a href= "adminEditVoucher.php">Edit Vouchers </a>
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