<?php
session_start();

include 'connection.php';
// redirect if user not logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit;
}

// get session data
$username = $_SESSION['username'];
$user_id = $_SESSION['id'];  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ACCOUNT DATA SETTING</title>
    <link rel="stylesheet" href="styleshome.css">
</head>
<body>
<header>
    <h1>ACCOUNT DATA SETTING</h1><br>
    <nav>
        <a href="home.php">Home</a>
        <a href="accountsetpage.php?id=<?php echo $user_id; ?>">Account</a>
        <a href="loginpage.php">Logout</a>
    </nav>
</header>

<div class="welcome-box">
    Selamat datang, <strong><?php echo $username; ?></strong>
</div>

<?php
$id = $_GET['id']; 

$data = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");

while ($d = mysqli_fetch_array($data)) {
?>

<form method="post" action="change.php">
    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <input type="text" name="username" value="<?php echo $d['username']; ?>">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $d['email']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="New Password" autocomplete="new-password" value=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="SAVE"></td>
        </tr>
    </table>
</form>

<?php } ?>

<footer>
    Contac
