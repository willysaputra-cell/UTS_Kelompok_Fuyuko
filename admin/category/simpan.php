<?php

include "../security.php";
include "../../koneksi.php";

if(isset($_POST['simpan'])){

    if(
        !isset($_POST['token']) ||
        !hash_equals($_SESSION['token'],$_POST['token'])
    ){
        die("CSRF detected");
    }

    $name=trim($_POST['name']);
    $added_by=$_SESSION['id'];

    $stmt=mysqli_prepare(
        $conn,
        "INSERT INTO categories
        (name,added_by)
        VALUES(?,?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "si",
        $name,
        $added_by
    );

    mysqli_stmt_execute($stmt);

    header("Location:index.php");
    exit;

}