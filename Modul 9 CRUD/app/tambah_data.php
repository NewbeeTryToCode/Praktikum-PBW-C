<?php
session_start();
include '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKOM|Tambah Data</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body class="container full-heigth-grow">
    <header class="main-header">
        <a href="home.html" class="brand-logo"><img src="../assets/img/logo.png" alt=""></a>
        <nav class="main-nav">
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li> <a href="about.html">About</a></li>
                <li> <a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="form-section">
        <h1 class="tittle">Tambah Data</h1>
        <a href="dashboard.php" class="btn btn-kembali">Kembali</a>
        <form action="" method="POST">
            <div class="input-group">
                <label for="nim">NIM</label>
                <input type="number" name="nim" id="nim">
            </div>
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="input-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat">
            </div>
            <div class="input-group">
                <button class="btn btntambahdata" name="tambah">Tambah Data</button>
            </div>
        </form>
    </section>
    <?php
    if (isset($_POST['tambah'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $query = mysqli_query($conn, "INSERT INTO mahasiswa (nim_mahasiswa,nama_mahasiswa,alamat_mahasiswa) VALUES ('$nim','$nama','$alamat')");
        echo '<script language="javascript">';
        echo 'alert("Data Berhasil Ditambahkan")';
        echo '</script>';
        header("location:dashboard.php");
    } ?>
</body>

</html>