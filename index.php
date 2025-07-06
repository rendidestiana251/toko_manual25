<?php
include 'config.php';

// Ambil semua data produk
$query = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Manual</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<button class="theme-toggle" onclick="toggleTheme()">Ganti Mode 🌙/🌞</button>

<script>
function toggleTheme() {
    const body = document.body;
    body.classList.toggle("dark-mode");

    if (body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}
// Saat halaman dibuka, cek preferensi tema
window.onload = () => {
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }
};
</script>
<header class="site-header">
    <div class="logo-area">
        <img src="assets/logo.png" alt="Logo Toko" class="logo">
        <h2 class="site-title">Toko Manual</h2>
    </div>

    <!-- Navigasi -->
     <?php session_start(); ?>
<nav class="nav-menu">
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['admin'])): ?>
        <a href="dashboard.php">Dashboard</a>
        <a href="tambah_produk.php">Tambah Produk</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <a href="tentang.php">Tentang</a>
    <a href="kontak.php">Kontak</a>
</nav>
    <!-- Tombol tema -->
</header>
<body>
    <h1>Daftar Produk Toko Rendi</h1>
    <a href="tambah_produk.php" class="add-button">+ Tambah Produk</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td>Rp<?= number_format($row['harga']) ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus_produk.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
