<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <style>
        .container {
            width: calc(100% - 70%);
            height: max-content;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;left: 50%;
            transform: translate(-50% , -50%);
        }
    
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: calc(100% - 10%);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #3B1500;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
           color: #000;
            background-color: #EBEBEB;
        } 
        a {
          color: #3B1500;
        }
    </style>
</head>
<body>
     <?php include 'accountTable.php' ?>
    <div class="container">
        <h2>Create an Account</h2>
        <form method="post">
          <label for="username">UserName:</label>
          <input type="text" id="name" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
            <button type="submit" name="submit">Create Account</button>
        </form>
        <a href="index.php">Go To Home Page</a>
    </div>
</body>
</html>
