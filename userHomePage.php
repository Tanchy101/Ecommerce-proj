<?php

//     $host = "localhost";
//     $dbusername = "root";
//     $dbpassword = "";
//     $databaseName = "loginpage";
//     $port = 3306;

//     // Create connection
//     $conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Selecting / Reading Queery
// $sql = "SELECT * FROM `login`";
// $result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome User</title>
    </head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
.topnav a {
    float: right;
    text-align: center;
    padding: 14px 16px;
}

.topnav .search-container  {
  float: right;
  padding: 10px 10px;
}

.category li {
    float: left;
    display: inline;
    text-align: center;
    padding: 14px 16px;
    margin-left : 30px;
    
}
</style>


    <body>
        <?php //if ($result->num_rows > 0) {
            // output data of each row
            // while($row = $result->fetch_assoc()) {
            //     echo "<h1>Welcome " . $row["email"] . "</h1>"; 
        //     }
        // } else {
        //     echo "<center><h1>You did not Enter Username or Password</h1></center>";
        // }
        // $conn->close();
        // ?>
          <a href="logout.php">Logout</a> 
       
          <!-- pwede ka na mag lagay dito sa ilalim ng comment ko na to na mga need
        na ilagay sa home page-->



    <!-- yung Cart and Profile replace with icons or picture kapag i eedit na sa css , 
    for the mean time yan muna as placeholder since skeletal naman -->


        <div class="topnav">
             <a class="active" href="#">Cart</a>
             <a href="#">Profile</a>
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

  <div class="category">
    <li><a href="#">Category 1</a></li>
    <li><a href="#">Category 2</a></li>
    <li><a href="#">Category 3</a></li>
    <li><a href="#">Category 4</a></li>
    <li><a href="#">Category 5</a></li>
    <li><a href="#">Category 6</a></li>
    <li><a href="#">Category 7</a></li>
    <li><a href="#">Category 8</a></li>
    <li><a href="#">Category 9</a></li>
    <li><a href="#">Category 10</a></li>
    <li><a href="#">Category 11</a></li>
</div>

  
    </body>
    </html>