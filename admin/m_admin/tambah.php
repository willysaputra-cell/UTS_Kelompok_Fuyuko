<?php
include "../security.php";
include "../../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Admin</title>
        <link rel="stylesheet" href="../../css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="reveal">
            <h1>Tambah Admin</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>

        <section class="form-card reveal">
            <?php if(isset($error)): ?>
                <p class="error">
                    <?= htmlspecialchars($error); ?>
                </p>
            <?php endif; ?>
            <form method="POST" action="simpan.php">
                <input
                    type="hidden"
                    name="token"
                    value="<?= $_SESSION['token']; ?>"
                >
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    required
                    autocomplete="username"
                >
                <label>Password</label>
                <div class="password-box">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password">
                    <span class="toggle-password" onclick="togglePassword()">
                        <i id="eyeIcon" class="fa-regular fa-eye-slash"></i>
                    </span>
                </div>
                <button
                    type="submit"
                    name="simpan">
                    Simpan Admin
                </button>
            </form>
        </section>
        <script src="../../js/admin.js"></script>
    </body>
</html>