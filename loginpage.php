<?php

session_start();
include 'connection.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        // ★ ADD THIS: Save user ID into session
        $_SESSION['id'] = $user['id'];

        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="stylesloginpage.css">
</head>
<body>
    <header>WENN COLLECTION - 3D Gallery</header>

    <div class="gallery-section">
        <div class="painting" style="width:30%; height:40rem;"><img src="mona_lisa_cutout-ra076a415aac347bc8dff10625ecb3fd0_x7saz_8byvr_644.png"></div>
            <div class="login-box" style="width:300px;">
                <h2>Login</h2>
                <div>
                    <form method="POST">
                        <input type="text" name="username" placeholder="Username" required><br>
                        <input type="password" name="password" placeholder="Password" required><br>
                        <button type="submit" name="login">Login</button>
                    </form>
                    <h4>Belum punya akun? <a href="registrationpage.php">Daftar di sini</a></h4>
                    <a href="index.php">Admin Panel</a>(untuk tes praktik)
                </div>
            </div>
        <div class="painting" style="width:30%; height:40rem;"><img src="moma dali.jpeg"></div>
    </div>

    <footer>
    <p>Contact us: 2020070629@student.pppkpetra.sch.id | +1 234 567 890</p>
    </footer>
</body>
</html>