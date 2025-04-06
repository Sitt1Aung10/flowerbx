<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Flower BX | All Items</title>
     <style>
        body {
            margin: 0;
            padding: 0;
        }
        * {
            font-family: 'Franklin Gothic Medium';
            font-weight: 100;
        }
        header {
            width: 100%;
            position: fixed;
            top: 0;
            background-color: #fff;
            box-shadow: 1px 3px 3px #00000033;
            padding-top: 20px;
            padding-bottom: 20px;
            z-index: 10;
        }
        nav {
            position: absolute;
            right: 0;
            top: 0;
        }
        nav > ul >li {
            list-style-type: none;
        }
        #peony_flower {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 0 40px 0 40px;
            box-sizing: border-box;
            margin-top: 200px;
            position: relative;
        }
        #peony_flower::before {
            content: 'Peony Flower Collection';
            text-transform: uppercase;
            position: absolute;
            left: 50%;top: -40px;
            transform: translateX(-50%);
            border-bottom: 5px solid #3B1500;    
        }
        .post {
            position: relative;
        }
        .post img {
            width: 350px;
        }
        #christmas {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 0 40px 0 40px;
            box-sizing: border-box;
            margin-top: 100px;
            position: relative;
        }
        #christmas::before {
            content: 'Christmas Collection';
            position: absolute;
            left: 50%;top: -50px;
            transform: translateX(-50%);
            text-transform: uppercase;
            border-bottom: 5px solid #3B1500;
        }
        #rose {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 0 40px 0 40px;
            box-sizing: border-box;
            margin-top: 100px;
            position: relative;
        }
        #rose::before {
            content: 'Rose Collection';
            position: absolute;
            left: 50%;top: -50px;
            transform: translateX(-50%);
            text-transform: uppercase;
            border-bottom: 5px solid #3B1500;
        }
        .post > h6, .post > p {
            margin: 0;
            padding: 0;
            position: absolute;
        }
        .post > h6 {
            top: 20px;
            left: 20px;
        }
        .post > p {
            font-size: 14px;
            top: 20px;
            right: 20px;
        }
        .post > button {
            position: absolute;
            bottom: 20px;
            z-index: 9;
            font-size: 14px;
            width: max-content;
        }
        .linkForSliderSection {
            left: 20px;
        }
        .post>button:last-child {
            right: 20px;
        }
     </style>
 
</head>

<body>
<script src="itemBuySystem.js"></script>
 <header style="text-align: center;">
    <img src="img/logo.svg" width="300px" style="margin:0 auto;">
    <nav>
        <ul>
            <li>
                <a href="index.php">Go To HomePage</a>
            </li>
        </ul>
    </nav>
</header>
<div class="popupContainer">
    <h6 class="productName"></h6>
    <img src="" class="productImage">
    <p class="price"></p>
</div>
<section id="peony_flower">

<?php 

// Database connection details
$host = "localhost";
$dbname = "flowerbx";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from allproducts table
// Fetch products for a specific category
$category = 'Peony Collection'; // You can dynamically set this value
$query = "SELECT id, title, image, price FROM allproducts WHERE category = '$category'";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='post'>
                <h6>{$row['title']}</h6>
                <img src='{$row['image']}' />
                <p>{$row['price']}.99 USD</p>
                 <button class='linkForSliderSection'>Buy Flower</button>
                <button class='addToCart'>Add To Cart</button>
              </div>";
    }
} else {
    echo "Error executing query: " . $conn->error;
}


?>
</section>

<section id="christmas">

<?php 

// Fetch data from allproducts table
// Fetch products for a specific category
$category = 'Christmas Collection'; // You can dynamically set this value
$query = "SELECT id, title, image, price FROM allproducts WHERE category = '$category'";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='post'>
                <h6>{$row['title']}</h6>
                <img src='{$row['image']}' />
                <p>{$row['price']}.99 USD</p>
                 <button class='linkForSliderSection'>Buy Flower</button>
                <button class='addToCart'>Add To Cart</button>
              </div>";
    }
} else {
    echo "Error executing query: " . $conn->error;
}


?>
</section>

<section id="rose">
<?php 

// Fetch data from allproducts table
// Fetch products for a specific category
$category = 'Rose Collection'; // You can dynamically set this value
$query = "SELECT id, title, image, price FROM allproducts WHERE category = '$category'";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='post'>
                <h6>{$row['title']}</h6>
                <img src='{$row['image']}' />
                <p>{$row['price']}.99 USD</p>
                 <button class='linkForSliderSection'>Buy Flower</button>
                <button class='addToCart'>Add To Cart</button>
              </div>";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
?>
</section>
</body>

</html>