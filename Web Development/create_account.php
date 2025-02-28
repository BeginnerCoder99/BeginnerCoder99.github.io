<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $username = $_POST["username"];
   $password = $_POST["password"];
   $role = $_POST["role"];
  
  if(empty($role) || $role !== 'secret') {
    $role = 'user';
  }
  else {
    $role = 'admin';
  }

  
   $passwordHash = password_hash($password, PASSWORD_BCRYPT);

 try {
   $mysqli = new mysqli("localhost", "root", "root", "project"); //database reference
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  
   $sql = "INSERT INTO registration (username, password, role) VALUES (?,?, ?)";
   $stmt = $mysqli->prepare($sql);
   $stmt->bind_param('sss', $username, $passwordHash, $role);
   $stmt->execute();
   echo "<p>Your account has been created.</p>";
         "<p><a href='login.php'>Login</a></p></html>";
   } 
 catch (mysqli_sql_exception $e) {
   if($e->getCode() == 1062) {
      echo "<p>The username <strong>$username</strong> already exists.",
         "Please choose another.</p>";
   }
   else {
      die("Database error: " . $e->getMessage());
   }
 }
      
}
           
?>

<!DOCTYPE html>  
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
      <title>Create Account</title>
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
    <form method="POST" action="create_account.php">
      <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autofocus required>
      </p>
      <p>
        <label for="password">Password:</label> 
        <input type="password" name="password" id="password" required>
      </p>
      <p>
        <label for="role">Role:</label> 
        <input type="text" name="role" id="role">
      </p>
      <div class="submit-button">
        <input type="submit" value="Create Account">
      </div>
      <br>
      Click 
        <a href = "/login.php">here</a>
        to login.
    </form>
  </div>
  </body>
</html>