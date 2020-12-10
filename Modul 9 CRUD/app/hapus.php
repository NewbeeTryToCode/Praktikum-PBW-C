<?php
session_start();
include '../koneksi.php';
$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa='$_GET[id]'");
echo '<script language="javascript">';
echo 'alert("Data Berhasil Dihapus")';
echo '</script>';
header("location:dashboard.php");
