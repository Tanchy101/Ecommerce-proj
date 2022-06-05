<?php
session_start();

  include "Config.php";

  $sql = "SELECT * FROM adminstock";
  $result = $conn->query($sql);

  $id = [];
  $categories = [];
  $products = [];
  $variants = [];
  $price = [];
  $stock = [];
  $description = [];
  $picture = [];

  $idx = 0;
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          $id[$idx] = $row["id"];
          $categories [$idx] = $row["categories"]; 
          $products[$idx] = $row["products"];
          $variations[$idx] = $row["variations"];
          $price[$idx] = $row["price"];
          $stock[$idx] = $row["stock"];
          $description[$idx] = $row["description"];
          $picture[$idx] = $row["picture"];
          $idx++;
      }
  }

if (!empty($_SESSION['user'])) {
    // Get ALL user details from database using user id
    $sql = "SELECT * FROM userlogin WHERE id ='{$_SESSION["user"]["id"]}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
    
       while($row = $result->fetch_assoc()) {
           $greet = $row["username"]; 
      }
    } else {
        session_destroy();
        header("Location: loginUser.php");
    }
} else {
    session_destroy();
    header("Location: loginUser.php");
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
            <a href="profile.php"><?= $greet ?>'s Profile</a>
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
        <h3 class="drawLine"><span >Featured Item</span></h3>        
    </div>
  <!--DITO IS YUNG MGA FEATURED ITEMS -->
        <!--1st image -->
        <?php
        for($idx = 0; $idx < count($id); $idx++)
        {
            if(isset($id[$idx])){
                echo "<div style = 'margin-left: 30px;' class = 'featured'>";
                echo "<a target = '_blank' href = '#'>";
                echo "<img class = 'featimg' src = '" . $picture[$idx] . "'></a>";          
                echo "<div class = 'desc'>";
                echo "<strong>" . $products[$idx] . "</strong> " . "(" . $variations[$idx] . ")"; 
                echo "<p><b>₱" . $price[$idx] . "</b></p>";
                echo "<p>" . $description[$idx] . "</p>";
                echo "<form>";
                echo "<input type='number' name='quantity'>";
                echo "<input type='submit' value='Add to Cart'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
       
</body>
</html>