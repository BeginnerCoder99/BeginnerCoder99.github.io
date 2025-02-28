<?php 
require 'admin_check.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$submittedvalues = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $author = isset($_POST['add_author']) ? trim($_POST['add_author']) : null;
    $series = isset($_POST['add_series']) ? trim($_POST['add_series']) : null;
    $title = isset($_POST['add_title']) ? trim($_POST['add_title']) : null;

    $submittedvalues = "<p>Submitted Values:</p> <p>Title: " . htmlspecialchars($title) . "</p> 
    <p>Author: " . htmlspecialchars($author) . "</p> <p>Series: " . htmlspecialchars($series) . "</p>";

    $mysqli = new mysqli("localhost", "root", "root", "library");

    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $series_id = null;
    

    if ($author) {
        $sql = "INSERT INTO authors (author_name) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for authors: " . $mysqli->error);
        }
        $stmt->bind_param("s", $author);
        if($stmt->execute()) {
            $author_id = $stmt->insert_id;
        }
        else {
            die("Error inserting author: " . $stmt->error);
        }
        $stmt->close();
    }

    if($series) {
        $sql = "INSERT INTO series (series_name) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $mysqli->error);
        }
        $stmt->bind_param("s", $series);
        if($stmt->execute()) {
            $series_id = $stmt->insert_id;
        }
        else {
            die("Error inserting series: " . $stmt->error);
        }
        $stmt->close();
    }
    if($title && isset($author_id)) {
        $sql = "INSERT INTO books (book_title, author_id, series_id) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        
        if (!$stmt) {
            die("Prepare failed: " . $mysqli->error);
        }
        $stmt->bind_param("sii", $title, $author_id, $series_id);
        if(!$stmt->execute()) {
            die("Error inserting book: " . $stmt->error);
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
    <script>
        function validateFields() {
            const titleInput = document.getElementById("add_title");
            const authorInput = document.getElementById("add_author");
            const seriesInput = document.getElementById("add_series");

            if (titleInput.value.trim() !== "") {
                authorInput.setAttribute("required", "required");
            } else {
                authorInput.removeAttribute("required");
            }
        }
    </script>
</head>
<title>Add to Database</title>
<body>
<h1>Welcome Admins</h1>
<div class ="center-object">
<form method="POST" action="">
    <p>
        <label for="add_author">Add Author:</label>
        <input type="text" name="add_author" id="add_author" autofocus>
    </p>
    <p>
        <label for="add_series">Add Series:</label> 
        <input type="text" name="add_series" id="add_series">
    </p>
    <p>
        <label for="add_title">Add Title:</label>
        <input type="text" name="add_title" id="add_title" oninput="validateFields()">
    </p>
      <input type="submit" value="Submit?">
    <?php echo $submittedvalues; ?>
<br>
    <a href = "/admins/admin_dashboard.php">Dashboard</a>
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
        padding: 0 400px;
    }
</style>
</html>