<?php
include "../security.php";
include "../../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: index.php");
    exit;
}

$sql = "select * from products where id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <title>Edit Produk</title>
    </head>
    <body>
        <header class="reveal">
            <h1>Edit Produk</h1>
        </header>
        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>
        <section class="form-card reveal">
            <form method="POST" action="ubah.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <label>Nama Produk</label>
                <input type="text" name="name" value="<?= htmlspecialchars($data['name']); ?>">

                <label>Harga</label>
                <input type="number" name="price" value="<?= $data['price']; ?>">

                <label>Foto</label><
                <img src="../../FOTO/<?= htmlspecialchars($data['image']); ?>"
                    class="preview-img"
                    alt="Foto Produk">

                <label>Ganti foto</label>
                <input type="file" name="image" accept="image/*">

                <label>Pilih Kategori</label>
                <?php
                $sql_category = "select * from categories";
                $query_category = mysqli_query($conn, $sql_category);
                ?>
                <select name="category_id">
                    <?php while($category = mysqli_fetch_assoc($query_category)): ?>
                        <option value="<?= $category['id']; ?>"
                            <?= $category['id'] == $data['category_id'] ? 'selected' : ''; ?> >
                            <?= htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit" name="ubah">Simpan Perubahan</button>
            </form>
        </section>
        <script src="../../JS/admin.js"></script>
    </body>
</html>
