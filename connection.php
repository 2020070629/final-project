<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="owen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

    $servername = "localhost";
    $username = "root"; 
    $password = "mysql"; 
    $dbname = "galleryaccountdata";
    
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    echo "Koneksi database berhasil"."<br><br>";

    if(mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    ?>
</body>
</html>