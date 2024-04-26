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

// Jika form batal disubmit, ubah status tugas
if (isset($_POST["cancel"])) {
    $id = $_POST["id"];
    $query = "UPDATE todolist SET status = '0' WHERE id = '$id'";
    mysqli_query($db, $query);
}

// Jika form hapus disubmit, hapus tugas dari database
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $query = "DELETE FROM todolist WHERE id = '$id'";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <h1>Selamat Datang <?php echo $nama; ?>!</h1>
        <h2>Daftar Tugas:</h2>
        <form action="" method="post">
            <input type="text" name="task" placeholder="Tambahkan tugas baru...">
            <button type="submit" name="add">Tambah <i class="fa-regular fa-square-plus"></i></button>
        </form>
        <ul id="todolist">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li>
                    <?php echo $row['task']; ?>
                    <small><?php echo $row['timestamp']; ?></small>
                    <?php if ($row['status'] == '0') : ?>
                        <!-- Selesai -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="done"><i class="fa-solid fa-check"></i></button>
                        </form>
                    <?php else : ?>
                        <!-- Batal -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="cancel"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                    <?php endif; ?>
                        <!-- Hapus -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
        <a href="login.php" class="logout-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
    </div>
    <script src="admin.js"></script>
</body>

</html>
