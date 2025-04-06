<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: calc(100% - 70%);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 10%);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .sign-in-btn {
            color: #3B1500;
            background-color: #EBEBEB;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        .sign-in-btn:hover {
            color: #000;
            background-color: #EBEBEB;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Log In An Account</h2>
        <label for="name">UserName</label><br>
        <input type="text" id="name" name="username" required><br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>

        <a href="#" class="forgot-password">Forgot Your Password?</a>

        <div>
        <input type="checkbox" name="checkbox"><label for="checkbox">Remember Me</label>
        </div>
        <br>

        <button class="sign-in-btn" type="submit" name="signinBtn">Log In</button>
        <a href="index.php">Go To Home Page</a>
        <?php
    error_reporting(1);
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
    include 'accountTable.php';

    if (isset($_POST['signinBtn'])) {
        // Sanitize input
        $name = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        // Check if user exists
        $sql = "SELECT * FROM users WHERE name='$name' AND email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found
            // Check if 'Remember Me' checkbox is checked
        if (isset($_POST['checkbox'])) {
            // Set cookies for 30 days
            setcookie('username', $name, time() + (30 * 24 * 60 * 60), "/");
            setcookie('email', $email, time() + (30 * 24 * 60 * 60), "/");
        }
            echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
        } else {
            // User not found
            echo "<script>alert('User not found!'); window.location.href='accountCreate.php';</script>";
        }
        $conn->close();
    }
    // Include the username display code
include 'username_display.php';
    ?>
    </form>
   

</body>

</html>