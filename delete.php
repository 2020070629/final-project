<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'connection.php';

    $id = $_GET['id'];

    mysqli_query($conn, "delete from users where id = '$id'");

    header('location:index.php');

    ?>
</body>
</html>