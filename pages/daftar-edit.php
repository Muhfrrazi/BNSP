<?php
include './koneksi.php';

// mengambil id
$id_daftar = $_GET['id'];
// query untuk menampilkan data berdasarkan id
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbdaftar WHERE iddaftar='$id_daftar'");
$data = mysqli_fetch_array($q_tampil_anggota);
if (empty($data['file']) or ($data['file'] == '-'))
    $foto = "berkas.png";
else
    $foto = $data['file'];
?>

<div class="container p-3 mb-3 mt-5" style="border: 1px solid black; border-radius:10px;">
    <h2 class="text-center">Edit Beasiswa</h2>
    <form class="formBeasiswa" action="./proses/daftar-edit-proses.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukkan Nama<span style="color:red">*</span></label>
            <input type="text" value="<?php echo $data['nama']; ?>" class="form-control" name="nama" id="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukkan Email<span style="color:red">*</span></label>
            <input type="email" value="<?php echo $data['email']; ?>" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">No HP<span style="color:red">*</span></label>
            <input type="number" value="<?php echo $data['nomor']; ?>" class="form-control" name="nomor" id="nomor">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Semester saat ini<span style="color:red">*</span></label>
            <select class="form-select" aria-label="Default select example" name="semester" id="semester">
                <option value="<?php echo $data['semester']; ?>" selected><?php echo $data['semester']; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ipk">IPK<span style="color:red">*</span></label>
            <div class="row">
                <div class="col-md-3">
                    <input id="ipk" name="ipk" type="text" step="0.01" value="<?php echo $data['ipk']; ?>" class="form-control" id="ipk">
                </div>

            </div>
        </div>
        <div class="form-group col-md-6" style="padding:0;"> <label for="beasiswa">Pilihan Beasiswa<span style="color:red">*</span></label> <select id="beasiswa" name="beasiswa" class="beasiswa form-control">
                <option value="<?php echo $data['beasiswa']; ?>" selected><?php echo $data['beasiswa']; ?></option>
                <option value=" Beasiswa Bank Indonesia">Beasiswa Bank Indonesia</option>
                </option>
                <option value="Beasiswa LPDP">Beasiswa LPDP</option>
                <option value="Beasiswa KIP-Kuliah">Beasiswa KIP-Kuliah</option>
                <option value="Beasiswa Muda Berprestasi">Beasiswa Muda Berprestasi</option>
            </select>
            <label for="berkas" <?php if (!empty($data['file'])) echo 'style="color:blue;font-weight: bolder;"' ?>><?php if (!empty($data['file'])) echo $data['file'] ?></label>
            <input type="file" accept="application/pdf, image/jpeg, application/zip" name="berkas" class="form-control-file" id="berkas">
        </div>
        <div class="col-md-offset-3 col-md-6"> <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button> </div>
    </form>

</div>