<?php
include 'connection.php';

// Get values from form
$id       = $_POST['id'];
$Username     = $_POST['username'];
$Email    = $_POST['email'];
$Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Update query
mysqli_query($conn, "
    UPDATE users 
    SET username='$Username', email='$Email', password='$Password'
    WHERE id = '$id'
");

// Redirect back to account settings page
header("Location: accountsetpage.php?id=$id");
exit;
?>
