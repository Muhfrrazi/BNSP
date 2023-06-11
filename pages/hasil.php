<!-- include koneksi -->
<?php
include './koneksi.php';

?>

<div class="container bg-light mt-3 p-3 " style="border: 1px solid black; border-radius:10px;">
    <h2 style="text-align: center;">Hasil Beasiswa</h2><br>
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM tbdaftar");
            while ($data = mysqli_fetch_array($query)) {
                if (empty($data['berkas']) or ($data['berkas'] == '-'))
                    $foto = "berkas.png";
                else
                    $foto = $data['berkas'];
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nomor']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['ipk']; ?></td>
                    <td><?php echo $data['beasiswa']; ?></td>
                    <td style="text-align: center;"><img src="./berkas/<?php echo $foto; ?>" width="40px height=40px" alt=""></td>
                    <td><?php echo "Belum di verifikasi" ?></td>
                    <td>
                        <a href="index.php?p=daftar-edit&id=<?php echo $data['iddaftar']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="proses/daftar-hapus-proses.php?id=<?php echo $data['iddaftar']; ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>