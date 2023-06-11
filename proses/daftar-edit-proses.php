<?php

include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['nomor'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$foto_awal = $_POST['berkas'];
$status_ajuan = $_POST['status_ajuan'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['berkas']['name'];
    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['berkas']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $berkas = $nama . "." . $tipe_file;

        $folder = "../berkas/$berkas";
        @unlink("$folder");

        //Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, $folder);
    } else {
        $file_foto = $foto_awal;
    };

    mysqli_query(
        $db,
        "UPDATE tbdaftar SET nama='$nama', email='$email', nomor='$no_hp', semester='$semester', ipk='$ipk', beasiswa='$beasiswa', status_ajuan='$status_ajuan', file='$berkas' WHERE iddaftar='$id'"
    );
    header("location:../index.php?p=hasil");
}
