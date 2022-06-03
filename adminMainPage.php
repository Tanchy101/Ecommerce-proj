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
            body {
            margin: 25px;
            }
        </style>

    <body style = "background-color: #ffedc0">
   
        <a href = "adminChangePass.php">Change password</a>
        
        <br>
        <h2> Manage Products </h2>
        <a href = "adminProducts.php">See All Products </a>
        <br>
        <a href = "adminCreateProducts.php">Insert a Product</a>
        <br>
        <a href = "adminDeleteProducts.php">Delete Products </a>
    </body>
</html>