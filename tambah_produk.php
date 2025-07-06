<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");

    if ($insert) {
        echo "<script>alert('Produk berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "Gagal menambah produk.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
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
    <h1>Tambah Produk</h1>
    <form method="post">
        Nama Produk: <input type="text" name="nama" required><br><br>
        Harga: <input type="number" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
