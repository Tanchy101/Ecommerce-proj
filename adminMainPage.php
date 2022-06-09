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
    </body>
</html>