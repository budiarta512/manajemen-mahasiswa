<?php
include 'components/header.php';

if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}

?>
    <div class="container mt-3">
        <h1>Input Data Dosen</h1>
        <form action="proses_input_dosen.php" method="POST">
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn">
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
            </div>
            <div class="mb-3">
                <label for="pendidikan_dosen" class="form-label">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan_dosen" name="pendidikan_dosen">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir_dosen" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir_dosen" name="tgl_lahir_dosen">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <input type="radio" name="gender_dosen" value="1">Laki - laki
                <input type="radio" name="gender_dosen" value="0">Perempuan
            </div>
            <div class="mb-3">
                <label for="alamat_dosen" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_dosen" name="alamat_dosen">
            </div>
            <div class="mb-3">
                <label for="no_hp_dosen" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="no_hp_dosen" name="no_hp_dosen">
            </div>
            <div class="mb-3">
                <label for="email_dosen" class="form-label">Email</label>
                <input type="email_dosen" class="form-control" id="email_dosen" name="email_dosen">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

<?php
include 'components/footer.php';
?>
