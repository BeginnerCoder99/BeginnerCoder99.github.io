<?php 
require 'auth_check.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Frontier Crisis Series Page</title>

<body>
    <div class="banner">
        <a href="/homepage.php" class="banner-link">Home</a>
        <a href="/Authorpages/authors.php" class="banner-link">Author Index</a>
        <a href="/seriespages/series.php" class="banner-link">Series Index</a>
        <a href="/novels/novels.php" class="banner-link">Novel Index</a>
        
    </div>
<div class = "content">
<img src="/images/FrontierCrisisCover.jpg">
<div class = "panel">
<p>Two veterans of the most recent galactic war have struck it rich. 
    A whole asteroid richer that is. 
    In a time where metal is in short supply from the war, their discovery could mean the downfall of the Federation 
    they fought to protect. What will these hardened men of war do with their find? How will this discovery affect the 
    balance of power in their corner of the universe? Join Tony Delgado and Sam Forzet on their cargo hauler 
    Lone Wolf as they discover the answers.
</p>
</div>
<a href="https://www.amazon.com/Frontier-Crisis-Anthony-Ellison-ebook/dp/B07FCKWPRX?ref_=ast_author_dp"> Amazon link for Frontier Crisis</a>
<p>List of series Novels</p>
<a href="/novels/frontiercrisis.php">Frontier Crisis</a>


</div>

<a href="/homepage.php">Go to Homepage?</a>
<div class ="center-object">
    <button onclick="logout()"> Logout?</button>
</div>

</body>
<script>  
function logout() {
    if (confirm("Are you sure you want to log out?")) {
        window.location.href = "/logout.php";
    }
}
</script>
<style>
    .panel {
    border: 3px solid #ffcc00;
    border-radius: 10px;
    padding: 20px; 
    color: white;
    }
        .banner {
    background-color: #333;
    padding: 10px 20px; 
    text-align: center; 
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%; 
    z-index: 1000; 
}
.banner a {
    color: white;
    text-decoration: none; 
    margin: 0 15px;
    font-size: 16px; 
    font-weight: bold; 
}

.banner a:hover {
    color: #ffcc00;
    text-decoration: underline;
}
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
    
    .chapter-title {
            text-align: center;
            font-weight: bold;
        }
    .content {
        white-space: pre-line;
        text-align: center;
        background-image: url("/images/black.jpg");
        background-size: cover;
        background-position: center;
        color: white;
        min-height: 75vh;
        padding: 20px;
        max-width: 1100px;
        overflow:auto;
    }
    .content img {
    max-width: 100%; 
    height: auto; 
    display: block; 
    margin: 20px auto; 
    border-radius: 5px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
</style>
</html>