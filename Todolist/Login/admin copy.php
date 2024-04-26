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

// Jika form ditambahkan, simpan tugas baru ke database
if (isset($_POST["add"])) {
    $task = $_POST["task"];
    $query = "INSERT INTO todolist (task, mahasiswa_id) VALUES ('$task', '$mahasiswa_id')";
    mysqli_query($db, $query);
}

// Jika form selesai disubmit, ubah status tugas
if (isset($_POST["done"])) {
    $id = $_POST["id"];
    $query = "UPDATE todolist SET status = '1' WHERE id = '$id'";
    mysqli_query($db, $query);
}

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
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <h1>Selamat Datang <?php echo $nama; ?>!</h1>
        <h2>Daftar Tugas:</h2>
        <form action="" method="post">
            <input type="text" name="task" placeholder="Tambahkan tugas baru...">
            <button type="submit" name="add">Tambah</button>
        </form>
        <ul id="todolist">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li>
                    <?php echo $row['task']; ?>
                    <?php if ($row['status'] == '0') : ?>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="done">Selesai</button>
                        </form>
                    <?php else : ?>
                        <span>Selesai</span>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <a href="login.php" class="logout-button">Logout</a>
    </div>
    <script src="script.js"></script>
</body>

</html>
