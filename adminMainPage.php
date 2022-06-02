<?php 
include 'Config.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .error{
                color:red;
            }
            .success{
                color:green;
            }
        </style>
    </head>

    <body>
        <h1>Admin</h1>
        <a href = "adminChangePass.php">Change password</a>
        <h3>Welcome to the admin main page!</h3>
        <br>
        <h2> Manage Products </h2>
        <a href = "adminProducts.php">See All Products </a>
        <br>
        <a href = "adminCreateProducts.php">Insert a Product</a>
        <br>
        <a href = "adminDeleteProducts.php">Delete Products </a>
    </body>
</html>