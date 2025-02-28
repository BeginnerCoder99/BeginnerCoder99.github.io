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
<title>Anthony's Author Page</title>

<body>
    <div class="banner">
        <a href="/homepage.php" class="banner-link">Home</a>
        <a href="/Authorpages/authors.php" class="banner-link">Author Index</a>
        <a href="/seriespages/series.php" class="banner-link">Series Index</a>
        <a href="/novels/novels.php" class="banner-link">Novel Index</a>
        
    </div>
<div class = "content">
    <div class = "panel">
    
    <h2><strong>About the Author</strong></h1>
    <p>Hello, my name is Anthony Ellison. I was born in Illinois but I was raised in North Carolina for most of my life. 
        Ever since I was young, around seven years old, I have loved to read. 
        Ask anyone that knows me, my head is always buried in a book. 
        That hasn't changed since I started writing two years ago, but it has helped me realize just how good the books I read really are. 
        I'm not a world-changing author, but I have a couple stories that I would like to share with the rest of the world. 
        I hope that you enjoy what I write and that you never give up on your dreams. 
        For a dream that is pursued makes the best story that was ever written, the story of your life.
    </p>
    <img src="/images/Anthony.jpg">
    </div>
<a href = "https://www.amazon.com/stores/Anthony-Ellison/author/B07FCS13QQ?ref=ap_rdr&isDramIntegrated=true&shoppingPortalEnabled=true">Amazon Author Page</a>
<p>Series written by Anthony Ellison</p>
<a href="/seriespages/theanimatorseries.php">The Animator</a>
<a href="/seriespages/FrontierCrisisSeries.php">Frontier Crisis</a>


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
</style>
</html>