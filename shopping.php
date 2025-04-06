 <section class="shopping_section">
     <div class="mainContainer">
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
$query = "SELECT id, title, image,price FROM allproducts LIMIT 4";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='productItemContainer'>
                <h6 class='productName'>{$row['title']}</h6>
                <img class='productImage' src='{$row['image']}' />
                <p class='price'>{$row['price']}.99 USD</p>
                <button class='linkForSliderSection'>Buy Flower</button>
                <button class='addToCart'>Add To Cart</button>
              </div>";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
    ?>
     </div>
     <a  class="viewAll" href="allItems.php">View All Items</a>
 </section>