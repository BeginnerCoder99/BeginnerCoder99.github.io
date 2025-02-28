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
<title>Martial Void King Series Page</title>

<body>
    <div class="banner">
        <a href="/homepage.php" class="banner-link">Home</a>
        <a href="/Authorpages/authors.php" class="banner-link">Author Index</a>
        <a href="/seriespages/series.php" class="banner-link">Series Index</a>
        <a href="/novels/novels.php" class="banner-link">Novel Index</a>
        
    </div>
<div class = "content">
<img src="/images/MVKCover.jpg">
<div class="panel">
<p>
Cultivation is a journey. A journey to the peak! 
Can someone born destined to be left behind surpass all others? 
A young artificer is offered the chance to become someone at that peak. 
He journeys to new lands filled with wondrous things. Saints! Ruffians! 
Spaceships! Swords! Just what can all these things have in common? A young boys journey will reveal it all…
</p>
</div>
<a href="https://www.amazon.com/Martial-Void-King-Complete-BeginnersXianxia-ebook/dp/B079CBS944?ref_=ast_author_mpb"> Amazon link for MVK Series</a>
<p>List of series Novels</p>
<a href="/novels/MVK1.php">Martial Void King 1</a>
<a href="/novels/MVK2.php">Martial Void King 2</a>
<a href="/novels/MVK3.php">Martial Void King 3</a>
<a href="/novels/MVK4.php">Martial Void King 4</a>
<a href="/novels/MVK5.php">Martial Void King 5</a>
<a href="/novels/MVK6.php">Martial Void King 6</a>


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