<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
</head>
<body>
    <h2>Tambah Data Siswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" name="nama" required></p>
        <p>Foto: <input type="file" name="foto" required></p>
        <p>Kelas: <input type="text" name="kelas" required></p>
        <p>Jurusan: <input type="text" name="jurusan" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>No HP: <input type="text" name="nohp" required></p>
        <p><button type="submit" name="simpan">Simpan</button></p>
    </form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];

    // upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/".$foto);

    $sql = "INSERT INTO siswa (nama, foto, kelas, jurusan, email, nohp) 
            VALUES ('$nama','$foto','$kelas','$jurusan','$email','$nohp')";
    mysqli_query($conn, $sql);

    echo "<script>alert('Data berhasil disimpan!');window.location='index.php';</script>";
}
?>
</body>
</html> 