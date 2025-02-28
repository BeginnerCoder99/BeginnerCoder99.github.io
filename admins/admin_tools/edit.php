<?php 

require 'admin_check.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$submittedvalues = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $currauthor = isset($_POST['current_author']) ? trim($_POST['current_author']) : null;
    $currseries = isset($_POST['current_series']) ? trim($_POST['current_series']) : null;
    $currtitle = isset($_POST['current_title']) ? trim($_POST['current_title']) : null;
    $newauthor = isset($_POST['update_author']) ? trim($_POST['update_author']) : null;
    $newseries = isset($_POST['update_series']) ? trim($_POST['update_series']) : null;
    $newtitle = isset($_POST['update_title']) ? trim($_POST['update_title']) : null;

    if (!empty($newauthor) || !empty($newseries) || !empty($newtitle)) {
        $submittedvalues = "<p>Submitted Values:</p> <p>Title: " . htmlspecialchars($newtitle) . "</p>
        <p>Author: " . htmlspecialchars($newauthor) . "</p> <p>Series: " . htmlspecialchars($newseries) . "</p>";
    } else {
        $submittedvalues = "<p>No values were submitted.</p>";
    }

    $mysqli = new mysqli("localhost", "root", "root", "library");
    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    if(!empty($currauthor)) {
        $sql = "UPDATE authors SET author_name = ? WHERE author_name = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for authors: " . $mysqli->error);
        }
        $stmt->bind_param("ss", $newauthor, $currauthor);
        if($stmt->execute()) {
        }
        else {
            die("Error updating author: " . $stmt->error);
        }
        $stmt->close();
    }
    if(!empty($currseries)) {
        $sql = "UPDATE series SET series_name = ? WHERE series_name = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for series: " . $mysqli->error);
        }
        $stmt->bind_param("ss", $newseries, $currseries);
        if($stmt->execute()) {
        }
        else {
            die("Error updating series: " . $stmt->error);
        }
        $stmt->close();
    }
    if(!empty($currtitle)) {
        $sql = "UPDATE books
                SET book_title = ?
                WHERE book_title = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for title: " . $mysqli->error);
        }
        $stmt->bind_param("ss", $newtitle, $currtitle);
        if($stmt->execute()) {
        }
        else {
            die("Error inserting title: " . $stmt->error);
        }
        $stmt->close();
    }
    $mysqli->close();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<title>Edit Database</title>
<body>
<h1>Welcome Admins</h1>
<div class ="center-object">
<form method="POST" action="">
    <p>
        <label for="current_author">Current Author:</label>
        <input type="text" name="current_author" id="current_author" autofocus>
        <label for="update_author">Updated Author:</label>
        <input type="text" name="update_author" id="update_author" autofocus>
    </p>
    <p>
        <label for="current_series">Edit Series:</label> 
        <input type="text" name="current_series" id="current_series">
        <label for="update_series">Updated Series:</label> 
        <input type="text" name="update_series" id="update_series">
    </p>
    <p>
        <label for="current_title">Edit Title:</label>
        <input type="text" name="current_title" id="current_title">
        <label for="update_title">Updated Title:</label>
        <input type="text" name="update_title" id="update_title">
    </p>
      <input type="submit" value="Submit?">
<br>
<?php echo $submittedvalues; ?>
<br>
    <a href = "/admins/admin_dashboard.php">Dashboard</a>
<br>
    <a href = "/admins/admin_tools/display.php">Display</a>
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
        color: blue;
    }
    
    .center-object {
        text-align: center;
        background-image: url("/images/black.jpg");
        background-size: cover;
        background-position: center;
        color: white;
        min-height: 75vh;
        padding: 0 200px;
    }
</style>
</html>