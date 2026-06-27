<?php

include "../security.php";
include "../../koneksi.php";

if(isset($_POST['ubah'])){
    if(
        !isset($_POST['token']) ||
        !hash_equals($_SESSION['token'],$_POST['token'])
    ){
        die("CSRF detected");
    }

    $id=(int)$_POST['id'];
    $name=trim($_POST['name']);
    $stmt=mysqli_prepare(
        $conn,
        "UPDATE categories
        SET name=?
        WHERE id=?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "si",
        $name,
        $id
    );

    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}