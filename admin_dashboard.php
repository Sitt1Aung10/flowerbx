<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Dashboard</title>
</head>

<body>
     <h1>Orders Management</h1>
     <table> </table>
     <h1>Product Uploading</h1>
     <div>
     <form method="POST" action="admin_dashboard.php" enctype="multipart/form-data">
        <input type="text" id="title" name="title" placeholder="Product Name" required>
        <input type="number" id="price" name="price" placeholder="Price" required>
        <input type="file" id="image" name="image" required>
        <input type="text" id="category" name="category" required placeholder="category">
        <button type="submit">Submit</button>
     </div>
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

// Create the table with a `category` column and a primary key
$sql = "CREATE TABLE IF NOT EXISTS allProducts (
     id INT AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(255),
     image VARCHAR(255),
     price INT,
     category ENUM('Peony Collection', 'Christmas Collection') NOT NULL DEFAULT 'Peony Collection'
 )";
 if ($conn->query($sql) === TRUE) {
     // echo "Table allProducts created successfully!<br>";
 } else {
     // echo "Error creating table: " . $conn->error . "<br>";
 }
 
 // Handle form submission
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = $_POST['title'];
     $price = $_POST['price'];
     $category = $_POST['category']; // Capture the selected category from the form
 
     // Handle file upload
     $image = $_FILES['image']['name'];
     $target_dir = "img/";
     $target_file = $target_dir . basename($image);
 
     // Ensure the uploads directory exists
     if (!is_dir($target_dir)) {
         mkdir($target_dir, 0777, true);
     }
 
     // Move the uploaded file to the target directory
     if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
         // Insert data into the database, including the `category` field
         $sql = "INSERT INTO allProducts (title, image, price, category) VALUES ('$title', '$target_file', '$price', '$category')";
         if ($conn->query($sql) === TRUE) {
           // After successfully uploading the product
echo "<script>
alert('Product uploaded successfully!');
window.location.href = 'admin_dashboard.php';
</script>";
         } else {
             echo "Error: " . $conn->error;
         }
     } else {
         echo "Failed to upload image.";
     }
 }
 
 $conn->close();
     ?>
</body>

</html>