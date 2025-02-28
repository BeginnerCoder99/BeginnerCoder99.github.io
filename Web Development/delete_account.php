<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    echo "<p>You must be logged in to delete your account.</p>";
    echo "<p><a href='login.php'>Login</a></p>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    $username = $_SESSION['username'];

    try {
        
        $mysqli = new mysqli("localhost", "root", "root", "project"); //database
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        
        $sql = "DELETE FROM registration WHERE username = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $username);

        
        if ($stmt->execute()) {
            
            session_destroy();
            echo "<p>Your account has been deleted.</p>";
            echo "<p><a href='create_account.php'>Create a new account</a></p>";
        } else {
            echo "<p>An error occurred while trying to delete your account.</p>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<p>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Account</title>
    </head>
    <body>
    <div class="center-object">
        <h2>Delete Account</h2>
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
        <form method="post" action="delete_account.php">
            <input type="submit" name="confirm_delete" value="Yes, Delete My Account">
        </form>
        <a href = "/homepage.php">Actually, I have second thoughts...</a>
</div>
    </body>
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
</style>
    </html>
    <?php
}
?>
