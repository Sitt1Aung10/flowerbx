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
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$userAccounts = "CREATE TABLE IF NOT EXISTS users (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(20) NOT NULL,
     email VARCHAR(255) NOT NULL,
     password VARCHAR(255) NOT NULL,
     phone VARCHAR(20) NOT NULL,
     address VARCHAR(255) NOT NULL
)";

if ($conn->query($userAccounts) === TRUE) {
     //     echo "Table allProducts created successfully!<br>";
     } else {
     //     echo "Error creating table: " . $conn->error . "<br>";
     }

error_reporting(1);
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['username']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Sanitize user input
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize user input
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
     $query = "SELECT * FROM users WHERE name = '$name' AND email = '$email' AND password = '$password'";
     $result = mysqli_query($conn, $query);
 
     if ($result) {
         $numRows = mysqli_num_rows($result);
         if ($numRows == 1) {
             $err = "User Already Exists!"; 
            } else {
             mysqli_query($conn, "INSERT INTO users (name , email, password , phone , address)VALUES ('$name' , '$email', '$password' , '$phone' , '$address')");
             echo header("Location: accountLogin.php"); // Redirect to success page
             exit(); // Stop executing the current script
         }
     } else {
         // Handle query execution error (e.g., log or display an error message)
         $err = "Error executing query: " . mysqli_error($conn);
     }
 }
 