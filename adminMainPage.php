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
                width: 8%;
                min-width: 320px;
                margin: auto;
            }footer {
            width: 100%;
            bottom: 0;
            background: linear-gradient(to right, #d3a35d, #ffcbb5);
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
            font-size: 13px;
            line-height: 20px;
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
                    <p>A local stationery shop </p>
                    <p>Manila, Philippines.</P>
                    <p> thepaperbag_mnl@gmail.com</P>
                    <h4>(+63) 930 732 9433 </h4>
                 </div>
                 <div class = "col">
                    <center> <h3> Follow us on </h3> </center>
                    <ul>
                        <a href = ""><img src = "https://i.imgur.com/TE6yEdE.png" alt = "fb" width = "70" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/TbcePZW.png" alt = "ig" width = "80" height = "60"></a>
                        <a href = ""><img src = "https://i.imgur.com/cuKSoZO.png" alt = "twt" width = "70" height = "60"></a>
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