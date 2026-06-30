<?php
include "../security.php";
include "../../koneksi.php";

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM users
    WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
if (!$data) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Admin</title>
        <link rel="stylesheet" href="../../css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="reveal">
            <h1>Edit Admin</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>

        <section class="form-card reveal">
            <form method="POST" action="ubah.php">
                <input
                    type="hidden"
                    name="token"
                    value="<?= $_SESSION['token']; ?>"
                >
                <input
                    type="hidden"
                    name="id"
                    value="<?= $data['id']; ?>"
                >
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    value="<?= htmlspecialchars($data['username']); ?>"
                    required
                    autocomplete="username"
                >
                <label>Password Baru</label>
                <div class="password-box">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                        autocomplete="new-password">
                    <span class="toggle-password" onclick="togglePassword()">
                        <i id="eyeIcon" class="fa-regular fa-eye-slash"></i>
                    </span>
                </div>
                <button
                    type="submit"
                    name="ubah">
                    Simpan Perubahan
                </button>
            </form>
        </section>
        <script src="../../js/admin.js"></script>
    </body>
</html>