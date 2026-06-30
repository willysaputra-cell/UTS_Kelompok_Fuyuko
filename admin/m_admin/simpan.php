<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
    if (
        !isset($_POST['token']) ||
        !hash_equals(
            $_SESSION['token'],
            $_POST['token']
        )
    ) {
        die("CSRF detected");
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        die("Semua data wajib diisi.");
    }

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id
        FROM users
        WHERE username = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $username
    );

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        die("Username sudah digunakan.");
    }

    $password_hash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users
        (username, password)
        VALUES (?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $username,
        $password_hash
    );

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Admin gagal ditambahkan!";
    }

}
?>