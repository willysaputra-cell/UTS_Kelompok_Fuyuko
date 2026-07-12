<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Daftar</title>
        <link rel="stylesheet" href="CSS/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class = "header_daftar"><h1>Forum Pendaftaran</h1></div>
        <form method="POST" action="sv_daftar.php" class="daftar">
            
            <div>
                <label>Nama Lengkap :</label><br>
                <input type="text" name="full_name" placeholder="Ilham Santoso" required><br>
            </div>

            <div>
                <label>Nomor Telepon :</label><br>
                <input type="text" name="phone_number" placeholder="08**********" required><br>
            </div>

            <div>
                <label>Alamat :</label><br>
                <textarea name="address" placeholder="Jl. Selat Panjang, Gang Kalilandak, No AH5" required></textarea><br>
            </div>

            <div>
                <label>Email :</label><br>
                <input type="email" name="email" placeholder="Ilhamgod@gmail.com" required><br>
            </div>

            <button type="submit" name="daftar">Daftar sekarang!</button>
            <p class="kembali">
                <a href="hubungi.php">Kembali</a>
            </p>
        </form>
    </body>
            
