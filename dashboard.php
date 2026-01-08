<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
  <strong>List Tugas</strong>
</header>

<div class="page-wrap">
  <div class="container">

    <div class="dashboard-card">

      <h2>Dashboard</h2>
      <p>Halo, <b><?php echo $_SESSION['nim']; ?></b></p>

      <div class="dashboard-actions">
        <a class="btn primary" href="tambah_tugas.php">+ Tambah Tugas</a>
        <a class="btn danger" href="logout.php">Logout</a>
      </div>

      <h3>Daftar Tugas</h3>

      <!-- tabel tugas -->
      <table class="table">

<tr>
    <th>Judul</th>
    <th>Deadline</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
include 'koneksi.php';
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM tugas WHERE user_id='$user_id'");

if (mysqli_num_rows($query) == 0) {
  echo "<tr>
          <td colspan='4' style='text-align:center;color:#94a3b8;padding:20px'>
            Belum ada tugas 😴
          </td>
        </tr>";
}

while ($row = mysqli_fetch_assoc($query)) {
?>

<tr>
   <td>
  <span class="task-title"
    onclick="openModal(
      '<?php echo addslashes($row['judul']); ?>',
      '<?php echo addslashes($row['deskripsi']); ?>',
      '<?php echo $row['deadline']; ?>',
      '<?php echo $row['status']; ?>',
      '<?php echo $row['id']; ?>'
    )">
    <?php echo htmlspecialchars($row['judul']); ?>
  </span>
</td>

    <td><?php echo $row['deadline']; ?></td>
    <td>
  <span class="badge <?= $row['status']=='Selesai'?'success':'warning' ?>">
    <?= $row['status'] ?>
  </span>
</td>

    <td>
    <a class="link edit"
       href="edit_tugas.php?id=<?php echo $row['id']; ?>">
       Edit
    </a>
    |
    <a class="link delete"
       href="hapus_tugas.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Yakin ingin menghapus tugas ini?')">
       Hapus
    </a>
</td>


    
</tr>
<?php } ?>
</table>
</div>
</div>
<!-- MODAL DESKRIPSI -->
<div id="taskModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">×</span>

    <h3 id="modalTitle"></h3>

    <div class="modal-meta">
      <span id="modalDeadline"></span>
      <span id="modalStatus"></span>
    </div>

    <p id="modalDesc"></p>

    <div class="modal-actions">
      <a id="modalEdit" class="btn primary">Edit Tugas</a>
    </div>
  </div>
</div>

<script>
function openModal(judul, desc, deadline, status, id) {
  document.getElementById('modalTitle').innerText = judul;
  document.getElementById('modalDesc').innerText = desc;
  document.getElementById('modalDeadline').innerText = '📅 ' + deadline;
  document.getElementById('modalStatus').innerText = '⏳ ' + status;
  document.getElementById('modalEdit').href = 'edit_tugas.php?id=' + id;

  document.getElementById('taskModal').classList.add('show');
}

function closeModal() {
  document.getElementById('taskModal').classList.remove('show');
}

// klik area gelap → tutup
window.onclick = function(e) {
  const modal = document.getElementById('taskModal');
  if (e.target === modal) {
    closeModal();
  }
}
</script>


</body>
</html>
