<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
