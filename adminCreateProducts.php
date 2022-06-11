<?php

include "Config.php";

// Insert

if (isset($_POST["postCheck"]))
{
    
    // Add Product Table Values on Variables
    $addCategories = $_POST["categories"];
    $addProducts = $_POST["products"];
    $addDescription = $_POST["description"];
    $addPicture = $_POST["picture"];

    // Find and Check if product names are the same para variation nalang ilalagay
    $sql = "SELECT * FROM `adminstock`";
    $result = $conn->query($sql);

    $id = [];
    $categories = [];
    $products = [];
    $description = [];
    $picture = [];

    $idx = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id[$idx] = $row["id"];
            $categories [$idx] = $row["categories"]; 
            $products[$idx] = $row["products"];
            $description[$idx] = $row["description"];
            $picture[$idx] = $row["picture"];
            $idx++;
        }
    }

    $notUnique = 0;
    for ($i = 0; $i < count($id); $i++){
        if ($addProducts == $products[$i]){
            // Old product, added new variation
            $addVariation = $_POST["variations"];
            $addPrice = $_POST["price"];
            $addStock = $_POST["stock"];
        
            $sql = "INSERT INTO adminstockvariant (product_id, variation, price, stock)
            VALUES ('" . $id[$i] . "', '" . $addVariation . "', '" . $addPrice . "', '" . $addStock . "');";
        
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $notUnique++;
            echo '<script>alert("New Variation Succesfully Created!")</script>';
        }

    }

    // New product and new variation added
    $idAdd = count($id) + 1;
    if($notUnique == 0){
        $sql = "INSERT INTO adminstock (categories, products, description, picture)
        VALUES ('" . $addCategories . "', '" . $addProducts . "', '" . $addDescription . "', '" . $addPicture . "');";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $addVariation = $_POST["variations"];
        $addPrice = $_POST["price"];
        $addStock = $_POST["stock"];
        $sql = "INSERT INTO adminstockvariant (product_id, variation, price, stock)
        VALUES ('" . $idAdd . "', '" . $addVariation . "', '" . $addPrice . "', '" . $addStock . "');";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo '<script>alert("New Product Succesfully Created!")</script>';
    }

}


?>

<!DOCTYPE html>
<html>

<head>
<title> Admin Create Products </title>
<style>
    head, body {
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
                width: 40%;
                min-width: 320px;
                margin: auto;
            }

                        /* navigaton bar */
                        ul {
            list-style-type: none;

            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: -webkit-sticky; /* Safari */
            position: sticky;
            top: 0;
            }

            li {
            float: left;
            }

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

            li a:hover {
            background-color: #111;
            }

            .active {
            background-color: #4CAF50;
            }

            table{
                border: 1px solid black;
                font-family: Arial, Helvetica, sans-serif;
                width:50%;
            }

            tr:nth-child(even){background-color: #f2f2f2;}
            tr:nth-child(odd){background-color: #fff;}

            td{
                border: 1px solid #ddd;
                text-align: center;
            }
            #product{
                padding-top: 12px;
                padding-bottom: 12px;
                background-color: #d3a35d;
                color: white;
                text-align: center;
            }
            #category{
                padding: 12px;
                text-align: center;
                font-weight: bold;
            }
            #variation{
                background-color: #d3a35d;
                color: white;
                text-align: center;
            }
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
</head>


<body style = "background-color: #ffedc0">
<a href="adminMainPage.php"><img src = "https://i.imgur.com/EKjxLuY.png" alt = "the paper bag logo " width = "150" height = "130" style = "float: left"></a>
    <br>
    <h1> The Paper Bag. </h1>
    <h2> Welcome to the Admin Page: Create Products! </h2>
    <br>
    <br>
    <ul>
    <li><a class="active" href="adminMainPage.php">Home</a></li>
    <li><a href="adminProducts.php">View Products</a></li>
    <li><a href="adminCreateProducts.php">Create Products</a></li>
    <li><a href="adminEditProducts.php">Edit Products</a></li>
    <li><a href="adminDeleteProducts.php">Delete Products</a></li>
    </ul>

    
    <br>
    <h1 style="text-align: center">Add a New Product</h1>
<fieldset style = "margin-left: auto; margin-right: auto">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>
<br>
    <label for="categories">Category: </label>
    <select name="categories" required>
        <option value="Papers">Papers</option>
        <option value="Pencils">Pencils</option>
        <option value="Ballpens">Ballpens</option>
        <option value="Markers">Markers</option>
        <option value="Arts/Crafts">Arts and Crafts</option>
        <option value="Erasers">Erasers</option>
        <option value="Notebooks">Notebooks</option>
        <option value="Journals">Journals</option>
        <option value="Planners">Planners</option>
        <option value="Office Supplies">Office Supplies</option>
        <option value="Books">Books</option>
        <option value="Measuring Tools">Measuring Tools</option>
        <option value="Pouches">Pouches</option>
        <option value="Bags">Bags</option>
    </select>
    <br>
    <br>
    <label for="products">Product:</label>
    <input type="text" name="products" required>
    <br>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" rows="10" cols="30" required></textarea>
    <br>
    <br>
    <label for="picture">Picture URL:</label>
    <input type="text" name="picture" required>
    <br>
    <br>
    <center> <h2>Variation</h2> </center>
    <label for="variations">Variation:</label>
    <input type="text" name="variations" required>
    <br>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <br>
    <br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>
    <br>
    <br>
    <input type='hidden' name='postCheck' value='1'>
    <center> <input  type="submit" value="CREATE"> </center>
</form>
</fieldset>
<br>
<br>
<br>
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
