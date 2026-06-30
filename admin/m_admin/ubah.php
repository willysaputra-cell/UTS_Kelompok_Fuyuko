<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['ubah'])) {
    if (
        !isset($_POST['token']) ||
        !hash_equals(
            $_SESSION['token'],
            $_POST['token']
        )
    ) {
        die("CSRF detected");
    }

    $id = (int)$_POST['id'];
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    if ($id <= 0) {
        die("ID tidak valid");
    }

    if ($username == '') {
        die("Username wajib diisi.");
    }

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id
        FROM users
        WHERE username = ?
        AND id != ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "si",
        $username,
        $id
    );

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        die("Username sudah digunakan.");
    }

    if ($password == '') {

        $stmt = mysqli_prepare(
            $conn,
            "UPDATE users
            SET username = ?
            WHERE id = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "si",
            $username,
            $id
        );

    } else {
        $password_hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE users
            SET username = ?,
                password = ?
            WHERE id = ?"
        );
        mysqli_stmt_bind_param(
            $stmt,
            "ssi",
            $username,
            $password_hash,
            $id
        );
    }

    $query = mysqli_stmt_execute($stmt);
    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Admin gagal diubah!";
    }

}
?>