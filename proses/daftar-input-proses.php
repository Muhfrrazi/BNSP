<?php

include '../koneksi.php';
//Proses input beasiswa ke database tabel daftar_beasiswa
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['nomor'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$status_ajuan = "Belum di verifikasi";

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['berkas']['name'];
    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['berkas']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $berkas = $nama . "." . $tipe_file;

        //tentukan folder untuk menyimpan file
        $folder = "../berkas/$berkas";
        //Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $berkas = "";
    }
    $sql =
        "INSERT INTO tbdaftar (nama, email, nomor, semester, ipk, beasiswa, file, status_ajuan)
    VALUES ('$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$berkas', '$status_ajuan')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        header("location:../index.php?p=hasil");
    } else {
        echo "Gagal input data";
    }
}
