<!DOCTYPE html>
<?php
session_start();

// redirect if user not logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit;
}

$username = $_SESSION['username'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WENN COLLECTION - Home</title>
    <link rel="stylesheet" href="styleshome.css">
</head>
<body>
    <header>
        <h1>WENN COLLECTION</h1><br>
        <nav>
            <a href="#">Home</a>
            <a href="#">Artists</a>
            <a href="loginpage.php">Logout</a>
        </nav>
    </header>

    <div class="welcome-box">
    Selamat datang, <strong><?php echo $username; ?></strong>
    </div>


    <div class="hero"><img src="starrynight.jpg"></div>

    <div class="section-title">Gallery</div>
    <div class="gallery">
        <div class="painting-box"><img src="starrynight.jpg"></div>
        <div class="painting-box"><img src="napoleon.png"></div>
        <div class="painting-box"><img src="moma dali.jpeg"></div>
        <div class="painting-box"><img src="Giverny-Morning-Hues-36s48-GW-OAC-2018-1365x1024.jpg"></div>
        <div class="painting-box"><img src="starrynight.jpg"></div>
        <div class="painting-box"><img src="starrynight.jpg"></div>
    </div><br><br>

    <footer>
        Contact us: 2020070629@student.pppkpetra.sch.id | +1 234 567 890
    </footer>
</body>
</html>