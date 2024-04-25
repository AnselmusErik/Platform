<?php
// Mulai sesi
session_start();

// Sambungkan ke database Anda di sini
$db = mysqli_connect("localhost", "root", "", "platformdb");

if (!isset($_SESSION["username"])) {
    // Jika belum, alihkan ke halaman login
    header("Location: login.php");
    exit;
}

// Dapatkan nama dari sesi
$nama = $_SESSION["username"];

// Pertama, dapatkan id mahasiswa dari tabel mahasiswa
$query = "SELECT id FROM mahasiswa WHERE nama = '$nama'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$mahasiswa_id = $row['id'];

// Kemudian, gunakan id mahasiswa untuk mendapatkan semua tugas dari pengguna yang sedang login
$query = "SELECT * FROM todolist WHERE mahasiswa_id = '$mahasiswa_id'";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist <?php echo $nama; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Selamat Datang <?php echo $nama; ?>!</h1>
        <h2>Daftar Tugas:</h2>
        <ul id="todolist">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li><?php echo $row['task']; ?></li>
            <?php endwhile; ?>
        </ul>
        <a href="login.php" class="logout-button">Logout</a>
    </div>
    <script src="script.js"></script>
</body>

</html>
