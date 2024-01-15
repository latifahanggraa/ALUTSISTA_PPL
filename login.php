<?php
include 'koneksi.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["username"];
    $password = $_POST["pass"];

    // Hindari SQL Injection
    $nama = $conn->real_escape_string($nama);

    $sql = "SELECT * FROM admin WHERE nama = '$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Periksa kesesuaian password
        if ($password == $row["password"]) {
            // Login berhasil, Anda dapat menambahkan logika lain jika diperlukan

            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["nama"];
            header("Location: http://localhost/ALUTSISTA_PPL/home/index.html");
            exit();
        } else {
           echo "<script>alert('Password salah.')</script>";
        }
    } else {
        echo "<script>alert('Akun tidak ditemukan.')</script>";
    }

    $conn->close();
}
?>