<?php
include "security.php";
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Dashboard</h1>
        </header>
        <section class="D">
            <div class = "sapaan"><p>Selamat datang <?= $username ?> di halaman Dashboard</p></div>
            <div class="dashboard">
                <a href="products/index.php">Manajemen Produk</a><br>
            </div>
            <div class="dashboard">
                <a href="registrations/index.php">Manajemen Pendaftaran</a><br>
            </div>
            <div class = "dashboard">
                <a href = "logout.php">Logout</a>
            </div>
        </section>
    </body>
</html>