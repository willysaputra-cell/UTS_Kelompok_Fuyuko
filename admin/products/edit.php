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
        <title>Edit Produk</title>
    </head>
    <body>
        <h1>Edit Produk</h1>
        <a href="index.php">Kembali</a>
        <br><br>
        <form method="POST" action="ubah.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <label>Nama Produk</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($data['name']); ?>">
            <br><br>

            <label>Harga</label>
            <input type="number" name="price" value="<?= $data['price']; ?>">
            <br><br>

            <label>Foto</label><br>
            <img src="../../FOTO/<?= htmlspecialchars($data['image']); ?>" width="150">
            <br>

            <label>Ganti foto</label><br>
            <input type="file" name="image" accept="image/*">
            <br><br>

            <label>Pilih Kategori</label><br>
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
            <br><br>

            <button type="submit" name="ubah">Ubah</button>
        </form>

    </body>
</html>
