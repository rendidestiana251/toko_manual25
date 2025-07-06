<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
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
        <h2 class="site-title"></h2>
    </div>
</header>
<body>

    <h1>Edit Produk</h1>
    <form method="post">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>"><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $data['harga'] ?>"><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= $data['stok'] ?>"><br><br>

        <input type="submit" name="submit" value="Simpan">
    </form>

</body>
</html>
