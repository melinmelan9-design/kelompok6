<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM siswa WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required></p>
        <p>Foto: <input type="file" name="foto"> (foto lama: <?= $data['foto'] ?>)</p>
        <p>Kelas: <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required></p>
        <p>Jurusan: <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required></p>
        <p>Email: <input type="email" name="email" value="<?= $data['email'] ?>" required></p>
        <p>No HP: <input type="text" name="nohp" value="<?= $data['nohp'] ?>" required></p>
        <p><button type="submit" name="update">Update</button></p>
    </form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];

    if ($_FILES['foto']['name'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$foto);
    } else {
        $foto = $data['foto'];
    }

    $sql = "UPDATE siswa SET nama='$nama', foto='$foto', kelas='$kelas', jurusan='$jurusan', email='$email', nohp='$nohp' WHERE id=$id";
    mysqli_query($conn, $sql);

    echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
}
?>
</body>
</html>