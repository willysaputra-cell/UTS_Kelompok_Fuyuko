<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fuyuko.id</title>
        <link rel="stylesheet" href="CSS/style.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_upward" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    </head>

    <body>
        <header class="header">
            <div class="logo">
                <img src="FOTO/logo2.png" alt="logo_fuyuko" width="77px" height="77px">
                <h1>FUYUKO.ID</h1>
            </div>
            <div class="bagian">
                <a href="index.php" class="tidak">Tentang Kami</a>
                <a href="Pilih.php" class="aktif">Pilih Favoritmu</a>
                <a href="Hubungi.php" class="tidak">Hubungi Kami</a>
            </div>
        </header>

        <section class="produk">
            <!-- KUE KERING -->
            <h2 class="judul" id="kuek">KUE KERING</h2>
            <div class="grid">
                <div class="card">
                    <img src="FOTO/1.jpg">
                    <p>Chocochips Cookies Crispy</p>
                    <span>Rp. 50.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/2.jpg">
                    <p>Almond Crescent Cookies</p>
                    <span>Rp. 50.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/3.jpg">
                    <p>Chui Kao So</p>
                    <span>Rp. 50.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Bola Salju Mede.jpg">
                    <p>Bola Salju Mede</p>
                    <span>Rp. 75.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Semprit Dahlia.jpg">
                    <p>Semprit Dahlia</p>
                    <span>Rp. 45.000</span>
                </div>
            </div>

            <!-- SNACK -->
            <h2 class="judul" id="puding">SNACK</h2>
            <div class="grid">
                <div class="card">
                    <img src="FOTO/Amplang Khas Ketapang.jpg">
                    <p>Amplang Khas Ketapang</p>
                    <span>Rp. 80.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Stik Bawang.jpg">
                    <p>Stik Bawang</p>
                    <span>Rp. 65.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Kembang Goyang.jpg">
                    <p>Kembang Goyang</p>
                    <span>Rp. 65.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Kripik Makaroni Spiral.jpg">
                    <p>Kripik Makaroni Spiral</p>
                    <span>Rp. 120.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/Semprong Lipat.jpg">
                    <p>Semprong Lipat</p>
                    <span>Rp. 65.000</span>
                </div>
            </div>

            <!-- KUE BASAH & PUDING -->
            <h2 class="judul" id="kueb">KUE BASAH & PUDING</h2>
            <div class="grid">
                <div class="card">
                    <img src="FOTO/6.jpg">
                    <p>Brownies Kukus</p>
                    <span>Rp. 80.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/7.webp">
                    <p>Lapis Susu Original Singkawang</p>
                    <span>Rp. 120.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/8.jpg">
                    <p>Spiku Almond</p>
                    <span>Rp. 50.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/4.jpg">
                    <p>Puding Regal Lumut</p>
                    <span>Rp. 95.000</span>
                </div>

                <div class="card">
                    <img src="FOTO/5.jpg">
                    <p>Puding Lumut Butter</p>
                    <span>Rp. 95.000</span>
                </div>
            </div>
        </section>

        <section class="footer">
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

        <script src="JS/script.js"></script>
    </body>
</html>