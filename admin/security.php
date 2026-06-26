<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /uts_projek_fuyuko/login.php");
    exit;
}

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$username = $_SESSION['username'];
?>