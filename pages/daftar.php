<div class="container p-3 mb-3 mt-5" style="border: 1px solid black; border-radius:10px;">
    <h2 class="text-center">Daftar Beasiswa</h2>
    <form class="formBeasiswa" action="proses/daftar-input-proses.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukkan Nama<span style="color:red">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukkan Email<span style="color:red">*</span></label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">No HP<span style="color:red">*</span></label>
            <input type="number" class="form-control" name="nomor" id="nomor" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Semester saat ini<span style="color:red">*</span></label>
            <select class="form-select" aria-label="Default select example" name="semester" id="semester" required>
                <option value="" disabled selected>Pilih Semester</option>
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
                    <input id="ipk" name="ipk" type="number" step="0.01" max="4.00" min="0.01" class="form-control" placeholder="0.00" id="ipk" required>
                </div>

            </div>
        </div>

        <div id="beasiswa" class="form-row">
        </div>

        <!-- Button Daftar dan Batal -->
        <div id="tombolSubmit" class="form-row">

        </div>
    </form>
    <div class="col-md-2">
        <button id="tombolCheck" onclick="cekipk()" class="btn btn-primary btn-block">Check IPK</button>
    </div>
</div>