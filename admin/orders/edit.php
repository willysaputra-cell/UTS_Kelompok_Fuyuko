<?php
include "../security.php";
include "../../koneksi.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT *
     FROM orders
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    header("Location: index.php");
    exit;
}

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

        <title>Edit Order</title>

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
            <h1>Edit Order</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">
                Kembali
            </a>
        </div>

        <section class="form-card reveal">

            <form
                action="ubah.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="id"
                    value="<?= $order["id"]; ?>"
                >

                <input
                    type="hidden"
                    name="token"
                    value="<?= $_SESSION["token"]; ?>"
                >

                <label>Produk</label>

                <select
                    name="product_id"
                    id="product"
                    required
                >

                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <option
                        value="<?= $row["id"]; ?>"
                        data-price="<?= $row["price"]; ?>"
                        <?= $row["id"] == $order["product_id"] ? "selected" : ""; ?>
                    >
                        <?= htmlspecialchars($row["name"]); ?>
                        -
                        <?= htmlspecialchars($row["category_name"]); ?>
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
                >

                <label>Jumlah</label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    min="1"
                    value="<?= $order["quantity"]; ?>"
                    required
                >

                <label>Total</label>

                <input
                    type="text"
                    id="total"
                    readonly
                >

                <button
                    type="submit"
                >
                    Simpan Perubahan
                </button>

            </form>

        </section>

        <script src="../../js/admin.js"></script>

    </body>
</html>