<?php
session_start();
include '../koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo '<script language="javascript">';
    echo 'alert("Anda belum login")';
    echo '</script>';
    header("location:../index.php");
}
//mengecek role
$loginuser = $_SESSION['username'];
$data = mysqli_query($conn, "SELECT * FROM users WHERE username_user = '$loginuser'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKOM|Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
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
    <section class="dashboard-section">
        <h1 class="tittle">Selamat Datang <?= $row['username_user']; ?></h1>
        <a href="tambah_data.php" class="btn btn-tambah">Tambah Data</a>
    </section>
    <br>
    <section class="table-section">
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
                while ($d = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $d['nim_mahasiswa'] ?></td>
                        <td><?= $d['nama_mahasiswa'] ?></td>
                        <td><?= $d['alamat_mahasiswa'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id_mahasiswa'] ?>" class="btnaksi btn-edit">Edit</a>
                            <?php
                            if ($row['user_type'] == 'admin') {
                                echo  '<a href="hapus.php?id=' . $d['id_mahasiswa'] . '" class="btnaksi btn-hapus">Hapus</a>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

</body>

</html>