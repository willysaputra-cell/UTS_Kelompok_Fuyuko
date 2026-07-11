<?php
include "../security.php";
include "../../koneksi.php";

$sql_registration = "
SELECT
    id,
    full_name
FROM registrations
ORDER BY full_name ASC
";

$query_registration = mysqli_query($conn, $sql_registration);

$sql = "
    SELECT
        products.id,
        products.name,
        products.price,
        categories.name AS category_name
    FROM products
    JOIN categories
        ON products.category_id = categories.id
    ORDER BY products.name ASC
";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Tambah Order</title>

        <link
            rel="stylesheet"
            href="../../css/admin.css"
        >

        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@200..1000&family=Old+Standard+TT:wght@400;700&family=Quicksand:wght@300..700&display=swap"
            rel="stylesheet"
        >
    </head>

    <body>

        <header class="reveal">
            <h1>Tambah Order</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">
                Kembali
            </a>
        </div>

        <section class="form-card reveal">

            <form
                action="simpan.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="token"
                    value="<?= $_SESSION['token']; ?>"
                >

                <label>Nama Pendaftar</label>

                <select
                    name="registration_id"
                    required
                >

                    <option value="">
                        -- Pilih Pendaftar --
                    </option>

                    <?php
                    while ($registration = mysqli_fetch_assoc($query_registration)) :
                    ?>

                        <option
                            value="<?= $registration['id']; ?>"
                        >
                            <?= htmlspecialchars($registration['full_name']); ?>
                        </option>

                    <?php endwhile; ?>

                </select>

                <label>Produk</label>

                <select
                    name="product_id"
                    id="product"
                    required
                >
                    <option value="">
                        -- Pilih Produk --
                    </option>

                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <option
                        value="<?= $row['id']; ?>"
                        data-price="<?= $row['price']; ?>"
                    >
                        <?= htmlspecialchars($row['name']); ?>
                        -
                        <?= htmlspecialchars($row['category_name']); ?>
                    </option>

                    <?php
                    }
                    ?>

                </select>

                <label>Harga</label>

                <input
                    type="text"
                    id="price"
                    readonly
                    placeholder="Harga produk"
                >

                <label>Jumlah</label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    min="1"
                    value="1"
                    required
                >

                <label>Total</label>

                <input
                    type="text"
                    id="total"
                    readonly
                    placeholder="Total pembayaran"
                >

                <button
                    type="submit"
                >
                    Simpan Order
                </button>

            </form>

        </section>

        <script src="../../js/admin.js"></script>

    </body>
</html>