<?php
// Mulai sesi
session_start();

// Sambungkan ke database Anda di sini
$db = mysqli_connect("localhost", "root", "", "platformdb");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST['password'];

    // Query untuk mencari mahasiswa dengan nama dan NIM yang sesuai
    $query = "SELECT * FROM mahasiswa WHERE nama = '$username' AND nim = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika mahasiswa ditemukan, simpan username ke dalam sesi
        $_SESSION["username"] = $username;

        // Alihkan ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa</title>
    <link rel="stylesheet" href="login.css">

</head>

<body>
    <form action="" method="post">
        <h1>Login Mahasiswa</h1>

        <?php if (isset($error)) : ?>
            <p>username / password salah !</p>
        <?php endif; ?>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <button type="submit" name="submit">Login</button>

    </form>
</body>

</html>