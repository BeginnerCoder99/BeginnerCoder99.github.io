<?php require 'admin_check.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Dashboard</title>
<body>
<h1>Welcome Admins</h1>
<div class ="center-object">
<a href = "/admins/admin_tools/add.php">Add to database</a>
<br>
<a href = "/admins/admin_tools/edit.php">Edit database</a>
<br>
<a href = "/admins/admin_tools/remove.php">Remove from database</a>
<br>
<a href = "/admins/admin_tools/display.php">Display database</a>
<br>
<a href = "/homepage.php">Go to Homepage</a>
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
        padding: 0 500px;
    }
</style>
</html>