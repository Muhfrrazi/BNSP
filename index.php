<?php
include 'koneksi.php';
function generateRandomFloat($min, $max)
{
    $rand_float = round($min + mt_rand() / mt_getrandmax() * ($max - $min), 2);
    return $rand_float;
}
$rand_value = generateRandomFloat(0.01, 4.00);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">

</head>

<body class="bg-light">
    <nav class="navbar stiky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style="font-weight: bolder;font-size: larger; pointer-events: none;" href="#">Kampusku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item
                <?php if (empty($_GET)) {
                    echo 'active';
                }; ?>
                ">
                    <a class="nav-link" href="index.php">Pilihan Beasiswa</a>
                </li>
                <li class="nav-item 
                <?php if (isset($_GET['p']) && $_GET['p'] == 'daftar') {
                    echo 'active';
                }; ?>
                ">
                    <a class="nav-link" href="index.php?p=daftar">Daftar</a>
                </li>
                <li class="nav-item
                <?php if (isset($_GET['p']) && $_GET['p'] == 'hasil') {
                    echo 'active';
                }; ?>
                ">
                    <a class="nav-link" href="index.php?p=hasil">Hasil</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php

    if (isset($_GET['p']) && $_GET['p'] == 'daftar') {
        include './pages/daftar.php';
    } elseif (isset($_GET['p']) && $_GET['p'] == 'hasil') {
        include './pages/hasil.php';
    } elseif (isset($_GET['p']) && $_GET['p'] == 'daftar-edit') {
        include './pages/daftar-edit.php';
    } elseif (empty($_GET)) {
        include './pages/beasiswa.php';
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/6213932414.js" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('#datatable').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': false,
                'autoWidth': false,
                'info': false
            })
        });

        //Script check input ipk lebih atau kurang dari 3.0
        function cekipk() {
            var ipk = $('#ipk').val();
            if (ipk >= 3.0 && ipk <= 4.0) {
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat, anda berhak mendapatkan beasiswa',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.beasiswa').focus();
                    }
                })
                //Munculkan inputan pilihan beasiswa
                $('#beasiswa').append('<div class="form-group col-md-6"> <label for="beasiswa">Pilihan Beasiswa<span style="color:red">*</span></label> <select id="beasiswa" name="beasiswa" class="beasiswa form-control"> <option disabled selected>--- Pilih ---</option> <option value="Beasiswa Bank Indonesia">Beasiswa Bank Indonesia</option> </option> <option value="Beasiswa LPDP">Beasiswa LPDP</option> <option value="Beasiswa KIP-Kuliah">Beasiswa KIP-Kuliah</option> <option value="Beasiswa Muda Berprestasi">Beasiswa Muda Berprestasi</option> </select> </div> <div class="form-group col-md-6"> <label for="berkas">Upload Berkas Syarat<span style="color:red">*</span></label> <input type="file" accept="application/pdf, image/jpeg, application/zip" name="berkas" class="form-control-file" id="berkas"> </div>');
                //Menghilangkan tombol check ipk
                $('#tombolCheck').hide();
                //Menambahkan tombol submit
                $('#tombolSubmit').append('<div class="col-md-offset-3 col-md-6"> <button type="submit" name="simpan" class="btn btn-primary btn-block">Daftar</button> </div> <div class="col-md-offset-3 col-md-6"> <button type="reset" class="btn btn-danger btn-block">Batal</button> </div>');

            } else if (ipk < 3.0 && ipk >= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Maaf, anda tidak memenuhi syarat penerima beasiswa',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Silahkan coba lagi nanti', '', 'info')
                        //refresh page
                        location.reload();
                    }
                })

            }
        };

        $('.btn-delete').on('click', function() {
            event.preventDefault(); // prevent form submit
            var getLink = $(this).attr('href'); // storing the form
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus itu!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink;
                    Swal.fire(
                        'Terhapus!',
                        'Data telah berhasil dihapus.',
                        'success'
                    )
                }
            })
        })
    </script>
</body>

</html>