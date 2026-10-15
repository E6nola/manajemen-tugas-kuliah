# Manajemen Tugas Kuliah (Student Task Manager)

Aplikasi pencatatan dan pelacakan tenggat (deadline) tugas perkuliahan untuk mahasiswa berbasis PHP dan database MySQL.

## Fitur Utama
- **Autentikasi Mahasiswa**: Login aman menggunakan Nomor Induk Mahasiswa (NIM) dan sesi pengguna.
- **Pencatatan Tugas (CRUD)**: Menambah daftar tugas baru, mengedit rincian tugas, dan menghapus tugas selesai.
- **Status & Deadline**: Memantau tanggal tenggat tugas secara terstruktur.

## Teknologi
- PHP
- MySQL / MariaDB
- HTML5 & Responsive CSS

## Panduan Instalasi
1. Pindahkan folder proyek ke folder htdocs.
2. Import database ke MySQL melalui phpMyAdmin.
3. Akses melalui browser di:
   `
   http://localhost/manajemen-tugas-kuliah/
   `
"@
        gitignore = @"
.vscode/
.idea/
Thumbs.db
.DS_Store
