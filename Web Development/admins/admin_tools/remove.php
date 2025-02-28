<?php 

require 'admin_check.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$submittedvalues = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $author = isset($_POST['r_author']) ? trim($_POST['r_author']) : null;
    $series = isset($_POST['r_series']) ? trim($_POST['r_series']) : null;
    $title = isset($_POST['r_title']) ? trim($_POST['r_title']) : null;
  

    if (!empty($author) || !empty($series) || !empty($title)) {
        $submittedvalues = "<p>Submitted Values:</p> <p>Title: " . htmlspecialchars($title) . "</p>
        <p>Author: " . htmlspecialchars($author) . "</p> <p>Series: " . htmlspecialchars($series) . "</p>";
    } else {
        $submittedvalues = "<p>No values were submitted.</p>";
    }

    $mysqli = new mysqli("localhost", "root", "root", "library");
    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

     
     if (!empty($author)) {
        $sql = "SELECT author_id FROM authors WHERE author_name = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for fetching author_id: " . $mysqli->error);
        }
        $stmt->bind_param("s", $author);
        $stmt->execute();
        $stmt->bind_result($author_id);
        $stmt->fetch();
        $stmt->close();

        if ($author_id) {
            $sql = "DELETE FROM books WHERE author_id = ?";
            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                die("Prepare failed for deleting books: " . $mysqli->error);
            }
            $stmt->bind_param("i", $author_id);
            if ($stmt->execute()) {
                $sql = "DELETE FROM authors WHERE author_name = ?";
                $stmt = $mysqli->prepare($sql);
                if (!$stmt) {
                    die("Prepare failed for deleting author: " . $mysqli->error);
                }
                $stmt->bind_param("s", $author);
                if (!$stmt->execute()) {
                    die("Error deleting author: " . $stmt->error);
                }
            } else {
                die("Error deleting books: " . $stmt->error);
            }
            $stmt->close();
        }
    }

    if (!empty($series)) {
        $sql = "SELECT series_id FROM series WHERE series_name = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for fetching series_id: " . $mysqli->error);
        }
        $stmt->bind_param("s", $series);
        $stmt->execute();
        $stmt->bind_result($series_id);
        $stmt->fetch();
        $stmt->close();

        if ($series_id) {
            
            $sql = "DELETE FROM books WHERE series_id = ?";
            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                die("Prepare failed for deleting books by series: " . $mysqli->error);
            }
            $stmt->bind_param("i", $series_id);
            if ($stmt->execute()) {
                $sql = "DELETE FROM series WHERE series_name = ?";
                $stmt = $mysqli->prepare($sql);
                if (!$stmt) {
                    die("Prepare failed for deleting series: " . $mysqli->error);
                }
                $stmt->bind_param("s", $series);
                if (!$stmt->execute()) {
                    die("Error deleting series: " . $stmt->error);
                }
            } else {
                die("Error deleting books by series: " . $stmt->error);
            }
            $stmt->close();
        }
    }
    if(!empty($title)) {
        $sql = "DELETE FROM books WHERE book_title = ?";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Prepare failed for title: " . $mysqli->error);
        }
        $stmt->bind_param("s", $title);
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
<title>Remove from Database</title>
<body>
<h1>Welcome Admins</h1>
<div class ="center-object">
<p>Warning! Removing an author or series will also remove all Titles related to them.</p>
<form method="POST" action="">
    <p>
        <label for="r_author">Remove Author:</label>
        <input type="text" name="r_author" id="r_author" autofocus>
    </p>
    <p>
        <label for="r_series">Remove Series:</label> 
        <input type="text" name="r_series" id="r_series">
    </p>
    <p>
        <label for="r_title">Remove Title:</label>
        <input type="text" name="r_title" id="r_title">
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