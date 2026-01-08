<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $user_id = $_SESSION['user_id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    mysqli_query($conn, "INSERT INTO tugas (user_id, judul, deskripsi, deadline, status)
    VALUES ('$user_id', '$judul', '$deskripsi', '$deadline', '$status')");

    header("Location: dashboard.php");
}
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
  <a href="dashboard.php" class="back-btn">← Kembali</a>
</header>

<div class="page-center">
  <div class="card">

    <h2>Tambah Tugas</h2>

    <form action="" method="post">
      <label>Judul Tugas</label>
      <input type="text" name="judul" required>

      <label>Deskripsi</label>
      <textarea name="deskripsi"></textarea>

      <label>Deadline</label>
      <input type="date" name="deadline">

      <label>Status</label>
      <select name="status">
        <option value="Belum">Belum</option>
        <option value="Selesai">Selesai</option>
      </select>

      <button type="submit" name="simpan" class="btn primary">
        Simpan
      </button>
    </form>

  </div>
</div>


</body>
</html>
