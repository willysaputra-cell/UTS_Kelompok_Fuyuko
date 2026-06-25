<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fuyuko.id</title>
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_upward" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    </head>

    <body>
        <header class="header">
            <div class="logo">
                <img src="foto/logo2.png" alt="logo_fuyuko" width="77px" height="77px">
                <h1>FUYUKO.ID</h1>
            </div>
            <div class="bagian">
                <a href="index.php" class="tidak">Tentang Kami</a>
                <a href="pilih.php" class="aktif">Pilih Favoritmu</a>
                <a href="hubungi.php" class="tidak">Hubungi Kami</a>
            </div>
        </header>

        <section class="produk reveal">
            <!-- KUE KERING -->
            <h2 class="judul" id="kuek">KUE KERING</h2>
            <div class="grid">
                <?php
                $sql_product = "SELECT * FROM products WHERE category_id= 1";
                $query_product = mysqli_query($conn, $sql_product);
                while($result = mysqli_fetch_array($query_product)) {
                ?>
                <div class = "card hidden">
                    <img src="foto/<?= htmlspecialchars($result['image']) ?>">
                    <p><?= htmlspecialchars($result['name']) ?></p>
                    <span><?= number_format($result['price'],0,',','.') ?></span>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- SNACK -->
            <h2 class="judul" id="puding">SNACK</h2>
            <div class="grid">
                <?php
                $sql_product = "SELECT * FROM products WHERE category_id= 2";
                $query_product = mysqli_query($conn, $sql_product);
                while($result = mysqli_fetch_array($query_product)) {
                ?>
                <div class = "card">
                    <img src="foto/<?= htmlspecialchars($result['image']) ?>">
                    <p><?= htmlspecialchars($result['name']) ?></p>
                    <span><?= number_format($result['price'],0,',','.') ?></span>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- KUE BASAH & PUDING -->
            <h2 class="judul" id="kueb">KUE BASAH & PUDING</h2>
            <div class="grid">
                <?php
                $sql_product = "SELECT * FROM products WHERE category_id= 3";
                $query_product = mysqli_query($conn, $sql_product);
                while($result = mysqli_fetch_array($query_product)) {
                ?>
                <div class = "card">
                    <img src="foto/<?= htmlspecialchars($result['image']) ?>">
                    <p><?= htmlspecialchars($result['name']) ?></p>
                    <span><?= number_format($result['price'],0,',','.') ?></span>
                </div>
                <?php
                }
                ?>
            </div>
        </section>

        <section class="footer reveal">
            <div class="logo2">
                <img src="FOTO/logo2.png" alt="Logo FUYUKO">
                <h2>FUYUKO.ID</h2>
            </div>

            <div class="isi">
                <div class="group">
                    <div class="col">Kategori</div>

                        <div class="col">
                            <p><a href="#kuek">Kue Kering</a></p>
                            <p><a href="#puding">Snack</a></p>
                            <p><a href="#kueb">Kue Basah &<br> Puding</a></p>
                        </div>
                </div>

                <div class="group">
                    <div class="col">Hubungi Kami</div>

                    <div class="col">
                        <a href="https://s.id/chat_kami">wa.me</a>
                        <a href="https://www.instagram.com/fukuyo.id_ptk/">Instagram</a>
                    </div>
                </div>
            </div>
        </section>

        <button id="btnTop">
            <span class="material-symbols-outlined">arrow_upward</span>
        </button>

        <a href="https://wa.me/6289531726626" class="wa-float" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

        <script src="js/script.js"></script>
    </body>
</html>