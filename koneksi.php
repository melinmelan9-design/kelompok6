<?php
$host = "localhost";
$user = "root";   // ganti sesuai user mysql
$pass = "";       // ganti sesuai password mysql
$db   = "db_siswa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>