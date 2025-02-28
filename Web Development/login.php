<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    }
    
    $error = '';
   
    $mysqli = new mysqli("localhost", "root", "root", "project"); //database
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT username, password, role FROM registration WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            header("Location: /homepage.php");
            exit();
        }
        
        else {
            $error = "Invalid username or password.";
        }
    
    } 
    else {
        $error = "Invalid username or password.";
    }
    

  

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <title>Login</title>
</head>
<style>
    body {
        background-image: url("/images/papter2.2.jpg");
        background-repeat: repeat;
        background-size: auto;
        background-position: top left;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        height: 100vh; 
        margin: 0;
        padding-top: 50px;
        color: blue;
    }
    
    .center-object {
        text-align: center;
        background-image: url("/images/black.jpg");
        background-size: cover;
        background-position: center;
        color: white;
        min-height: 75vh;
        padding: 0 300px;
    }
    
    .submit-button {
        text-align: center;
        margin-top: 15px;
    }
</style>
    <body>
    <div class="center-object">
    <form method="POST" action="login.php">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" autofocus required>
        </p>
        <p>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>
        </p>
        <div class = "submit-button">
            <input type="submit" value = "Login">
        </div>
        <br>
        <?php if (!empty($error)) {
            echo htmlspecialchars($error);
            echo '<br>';
        } 
        ?>
        Click 
        <a href = "/create_account.php">here</a>
        to create an account.
    </form>
    </div>
    </body>
</html>
