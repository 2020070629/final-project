<?php
include 'connection.php';
// Cek apakah form telah disubmit
if(isset($_POST['register'])){
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email']; // Menangkap nama lengkap dari form
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // name check
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    // check y/n
    if(mysqli_num_rows($check_result) > 0){
        $error = "Nama sudah terdaftar. Gunakan nama lain.";
        // Nama sudah digunakan
        echo "<script>alert('Nama sudah terdaftar. Gunakan nama lain.'); window.location='registrationform.php';</script>";
    } else {

    // Simpan data ke database
    $query = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$email')";
    // Eksekusi query
    $result = mysqli_query($conn, $query);
    }

    // Cek apakah query berhasil
    if($result){
        // Redirect ke halaman login setelah registrasi sukses
        echo "<script>alert('Registrasi berhasil! Silakan login.');
        window.location='loginpage  .php';</script>";
    } else {
        // Tampilkan pesan error jika registrasi gagal
        echo "<script>alert('Registrasi gagal! Silakan registrasi lagi.');
        window.location='registrationform.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="stylesregistrationpage.css">
    <style>
        .error-msg { color: red; }
    </style>
</head>
<body>
    <header>WENN COLLECTION - Register</header>

    <br><br><br><br><br><br><br><br>
    <div class="register-box">
        <h2>Form Registrasi</h2>
        <form method="POST">
            <table>
                <tr>
                    <td>
                        <label for="username">Masukkan Username </label>
                        <input type="text" name="username" placeholder="Username" required><br>
                        <?php if(!empty($error)) echo "<div class='error-msg'>$error</div>"; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Masukkan Email </label>
                        <input type="email" name="email" placeholder="Email" required><br>
                    </td>                
                </tr>
                <tr>
                    <td>
                        <label for="password">Masukkan Passowrd </label>
                        <input type="password" name="password" placeholder="Password" required><br>
                    </td>    
                </tr>
            </table><br>
            <button type="submit" name="register">REGISTER</button>
        </form>
        <h4>Create Account | <a href="loginpage.php">Login di sini</a></h4>
    </div>

    <footer>
        Contact us: 2020070629@student.pppkpetra.sch.id | +1 234 567 890
    </footer>
</body>
</html>