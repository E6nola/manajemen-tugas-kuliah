<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM tugas WHERE id='$id' AND user_id='$user_id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $deadline = $_POST['deadline'];
  $status = $_POST['status'];

  mysqli_query($conn, "UPDATE tugas SET
    judul='$judul',
    deskripsi='$deskripsi',
    deadline='$deadline',
    status='$status'
    WHERE id='$id' AND user_id='$user_id'
  ");

  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Tugas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
  <a href="dashboard.php" class="back-btn">← Kembali</a>
</header>

<div class="page-center">
  <div class="card">

    <h2>Edit Tugas</h2>

    <form method="post">
      <label>Judul Tugas</label>
      <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>

      <label>Deskripsi</label>
      <textarea name="deskripsi"><?= htmlspecialchars($data['deskripsi']) ?></textarea>

      <label>Deadline</label>
      <input type="date" name="deadline" value="<?= $data['deadline'] ?>">

      <label>Status</label>
      <select name="status">
        <option value="Belum" <?= $data['status']=='Belum'?'selected':'' ?>>Belum</option>
        <option value="Selesai" <?= $data['status']=='Selesai'?'selected':'' ?>>Selesai</option>
      </select>

      <button type="submit" name="update" class="btn primary full">
        Update Tugas
      </button>
    </form>

  </div>
</div>

</body>
</html>
