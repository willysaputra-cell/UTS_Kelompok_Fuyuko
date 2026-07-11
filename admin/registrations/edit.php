<?php
include "../security.php";
include "../../koneksi.php";

$id = $_GET["id"] ?? "";

if ($id == "") {
    header("Location: index.php");
    exit;
}

$sql = "
SELECT *
FROM registrations
WHERE id = '$id'
";

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Pendaftaran</title>

    <link
        rel="stylesheet"
        href="../../CSS/admin.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:wght@400;700&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet"
    >

</head>

<body>

    <header class="reveal">
        <h1>Edit Pendaftaran</h1>
    </header>

    <div class="arah reveal">

        <a href="index.php">
            Kembali
        </a>

    </div>

    <div class="form-card reveal">

        <form
            action="ubah.php"
            method="POST"
        >

            <input
                type="hidden"
                name="id"
                value="<?= $data["id"]; ?>"
            >

            <label>
                Nama Lengkap
            </label>

            <input
                type="text"
                name="full_name"
                value="<?= htmlspecialchars($data["full_name"]); ?>"
                required
            >

            <label>
                Alamat
            </label>

            <input
                type="text"
                name="address"
                value="<?= htmlspecialchars($data["address"]); ?>"
                required
            >

            <label>
                Nomor Telepon
            </label>

            <input
                type="text"
                name="phone_number"
                value="<?= htmlspecialchars($data["phone_number"]); ?>"
                required
            >

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($data["email"]); ?>"
                required
            >

            <button type="submit">
                Simpan Perubahan
            </button>

        </form>

    </div>

    <script src="../../JS/admin.js"></script>

</body>

</html>