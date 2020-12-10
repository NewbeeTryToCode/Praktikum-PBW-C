<?php
session_start();
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$_GET[id]'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKOM|Edit Data</title>
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
        <h1 class="tittle">Edit Data</h1>
        <a href="dashboard.html" class="btn btn-kembali">Kembali</a>
        <form action="" method="POST">
            <div class="input-group">
                <label for="nim">NIM</label>
                <input type="number" name="nim" value="<?= $row['nim_mahasiswa'] ?>">
            </div>
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= $row['nama_mahasiswa'] ?>">
            </div>
            <div class="input-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" value="<?= $row['alamat_mahasiswa'] ?>">
            </div>
            <div class="input-group">
                <button class="btn btntambahdata" name="edit">Edit Data</button>
            </div>
        </form>
    </section>
    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $query = mysqli_query($conn, "UPDATE mahasiswa SET nim_mahasiswa ='$nim', nama_mahasiswa='$nama', alamat_mahasiswa='$alamat' WHERE id_mahasiswa = '$_GET[id]'");
        echo '<script language="javascript">';
        echo 'alert("Data Berhasil Diedit")';
        echo '</script>';
        header("location:dashboard.php");
    }
    ?>

</body>

</html>