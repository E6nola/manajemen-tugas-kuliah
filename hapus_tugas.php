<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tugas WHERE id='$id'");

header("Location: dashboard.php");
?>
