<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Siswa</h2>
    <a href="tambah.php">+ Tambah Siswa</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM siswa");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$no++."</td>
                <td><img src='uploads/".$row['foto']."' width='50'></td>
                <td>".$row['nama']."</td>
                <td>".$row['kelas']."</td>
                <td>".$row['jurusan']."</td>
                <td>".$row['email']."</td>
                <td>".$row['nohp']."</td>
                <td>
                    <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                    <a href='hapus.php?id=".$row['id']."' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>