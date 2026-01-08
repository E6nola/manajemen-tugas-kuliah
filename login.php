<?php
session_start();
include 'koneksi.php';

$nim = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['nim'] = $data['nim'];
    header("Location: dashboard.php");
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}
?>
