<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fuyuko.id</title>
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_upward" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <a href="pilih.php" class="tidak">Pilih Favoritmu</a>
                <a href="hubungi.php" class="aktif">Hubungi Kami</a>
            </div>
        </header>

        <section class="kontak reveal">
            <div class="kiri">
                <h2>Hubungi Kami</h2>
                <p class="deskripsi">
                Pesan produk favoritmu dengan mudah melalui chat WhatsApp!!
                Kami menyediakan layanan antar (tidak melayani makan di tempat).
                </p>

                <div class="info">
                    <i class="fa-regular fa-envelope"></i>
                    <div>
                        <h4>Gmail</h4>
                        <p>Fuyuko_id@gmail.com</p>
                    </div>
                </div>

                <div class="info">
                    <i class="fa-brands fa-instagram"></i>
                    <div>
                        <h4>Instagram</h4>
                        <p>@fuyuko.id_ptk</p>
                    </div>
                </div>
                
                <div class="info">
                    <i class="fa-brands fa-whatsapp"></i>
                    <div>
                        <h4>Telepon / Whatsapp</h4>
                        <p>+62 895 3213 10601</p>
                    </div>
                </div>

            </div>

            <div class="kanan">
                <form class="form-pesan">
                    <div id="error-msg">
                        Gagal mengirim pesan. Harap isi semua kolom yang wajib diisi!
                    </div>
                    <h3>Form Pemesanan</h3>

                    <p>
                        Sebelum memesan, harap mendaftar terlebih dahulu  <br>
                        untuk mengisi informasi anda sehingga memudahkan <br>
                        kami dalam mengirim pesanan. <a href="daftar.php">Daftar</a></p>

                    <textarea
                        id="pesanan"
                        placeholder="Tulis pesananmu di sini..."
                        required
                    ></textarea>

                    <textarea
                        id="catatan"
                        placeholder="Catatan tambahan..."
                    ></textarea>

                    <button type="button" onclick="kirimWA()">
                        Pesan via WhatsApp
                    </button>

                </form>
            </div>
        </section>

        <section class="map reveal">
            <h2>Lokasi Kami</h2>
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1994.9083847842685!2d109.30821271567214!3d-0.050516752681791025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwMDMnMDEuNSJTIDEwOcKwMTgnMzIuOSJF!5e0!3m2!1sen!2sid!4v1777122803416!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen=""
            loading="lazy">
            </iframe>
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
                            <p><a href="pilih.php #kuek">Kue Kering</a></p>
                            <p><a href="pilih.php #puding">Snack</a></p>
                            <p><a href="pilih.php #kueb">Kue Basah &<br> Puding</a></p>
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