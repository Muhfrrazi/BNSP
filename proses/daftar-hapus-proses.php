<?php

include '../koneksi.php';

//membuat proses hapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbdaftar WHERE iddaftar = '$id'";
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($result);
    $foto = $data['file'];
    $sql_hapus = "DELETE FROM tbdaftar WHERE iddaftar = '$id'";
    $hapus = mysqli_query($db, $sql_hapus);
    if ($hapus) {
        unlink("../berkas/$foto");
        header("Location:../index.php?p=hasil");
    } else {
        echo "Gagal";
    }
}
