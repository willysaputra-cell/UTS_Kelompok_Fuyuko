<?php
include "security.php";
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="reveal">
            <h1>Dashboard</h1>
        </header>

        <section class="D">
            <div class="sapaan reveal">
                <p>Selamat datang <?= $username ?> di halaman Dashboard</p>
            </div>

            <div class="dashboard reveal">
                <a href="products/index.php">Manajemen Produk</a>
            </div>

            <div class="dashboard reveal">
                <a href="registrations/index.php">Manajemen Pendaftaran</a>
            </div>

            <div class="dashboard reveal">
                <a href="category/index.php">Manajemen Kategori</a>
            </div>

            <div class="dashboard reveal">
                <a href="m_admin/index.php">Manajemen Admin</a>
            </div>

            <div class="dashboard reveal">
                <a href="orders/index.php">Manajemen Orders</a>
            </div>

            <div class="dashboard reveal">
                <a href="logout.php">Logout</a>
            </div>
        </section>
        <script src="../js/admin.js"></script>
    </body>
</html>