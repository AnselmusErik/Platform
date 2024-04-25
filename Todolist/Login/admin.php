<?php
// Mulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ''; ?></title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <h1>Selamat Datang <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ''; ?>!</h1>
        <!-- <a href="login.php" class="logout-button">Logout</a> -->
    </div>
</body>

</html>
