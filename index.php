<?php
session_start();
include 'koneksi.php';

// PROSES LOGIN
if (isset($_POST['login'])) {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['nim'] = $data['nim'];
        header("Location: dashboard.php");
    } else {
        $error = "Login gagal";
    }
}

// PROSES REGISTER
if (isset($_POST['register'])) {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim'");

    if (mysqli_num_rows($cek) > 0) {
        $error = "NIM sudah terdaftar";
    } else {
        mysqli_query($conn, "INSERT INTO users (nim, password) VALUES ('$nim', '$password')");
        $success = "Registrasi berhasil, silakan login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login & Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="auth-container">

  <!-- CARD LOGIN -->
  <div class="card">
    <h2>Login</h2>
    <form method="post">
      <input type="text" name="nim" placeholder="NIM"required>
      <input type="password" name="password" placeholder="Password" required>
      <button class="btn primary" type="submit" name="login">Login</button>
    </form>
  </div>

  <!-- CARD REGISTER -->
  <div class="card">
    <h2>Register</h2>
    <form method="post">
      <input type="text" name="nim" placeholder="NIM" required>
      <input type="password" name="password" placeholder="Password" required>
      <button class="btn secondary" type="submit" name="register">Register</button>
    </form>
  </div>

</div>

</body>
</html>