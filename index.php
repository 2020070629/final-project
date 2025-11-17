<?php
session_start();
include 'connection.php';

// Optional: restrict access only to logged-in users
if(!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User Data</title>
    <link rel="stylesheet" href="styleshome.css">
</head>
<body>

<header>
    <h1>WENN COLLECTION</h1><br>
    <nav>
        <a href="home.php">Home</a>
        <a href="accountsetpage.php?id=<?php echo $_SESSION['id']; ?>">Account</a>
        <a href="index.php">Admin Panel</a>
        <a href="loginpage.php">Logout</a>
    </nav>
</header>

<div class="section-title">Admin User Database</div>

<div style="width:90%; margin:auto; background:white; padding:20px; border-radius:10px;">
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse; text-align:center;">
        <tr style="background:#f2f2f2;">
            <th>No</th>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password (Hash)</th>
            <th>Opsi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM users");
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id']; ?></td>
            <td><?php echo $d['username']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><?php echo $d['password']; ?></td>
            <td>
                <a href="accountsetpage.php?id=<?php echo $d['id']; ?>">UPDATE</a> |
                <a href="delete.php?id=<?php echo $d['id']; ?>">DELETE</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<br><br>

<footer>
    Contact us: 2020070629@student.pppkpetra.sch.id | +1 234 567 890
</footer>

</body>
</html>
