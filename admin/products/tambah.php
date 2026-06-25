<?php
include "../security.php";
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tambah</title>
        <link rel="stylesheet" href="../../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <title>Tambah Produk</title>
    </head>
    <body>
        <header class="reveal">
            <h1>Tambah Produk</h1>
        </header>
        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>

        <section class="form-card reveal">
        <?php if (isset($error)) : ?>
            <p class="error">
                <?= htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

            <form method="POST" action="simpan.php" enctype="multipart/form-data">

                <label>Nama Produk</label>
                <input type="text" name="name" required>

                <label>Harga</label>
                <input type="number" name="price" required>

                <label>Foto Produk</label>
                <input type="file" name="image" accept="image/*">

                <label>Pilih Kategori</label>

                <?php
                $sql_category = "select * from categories";
                $query_category = mysqli_query($conn, $sql_category);
                ?>

                <select name="category_id" required>
                    <?php while($category = mysqli_fetch_assoc($query_category)): ?>
                        <option value="<?= $category['id']; ?>">
                            <?= htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit" name="simpan">Simpan Produk</button>

            </form>
        </section>
        <script src="../../JS/admin.js"></script>
    </body>
</html>