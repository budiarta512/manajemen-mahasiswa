<?php
include 'components/header.php';
include "model/Dosen.php";
include "model/jurusan.php";

if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}

$dosen = New Dosen();
$jurusan = New Jurusan();

?>
    <div class="container mt-3">
        <h1>Input Data Mahasiswa</h1>
        <form action="proses_input.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs">
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select name="jurusan" class="form-select">
                    <?php if($jurusan->get('jurusan') == null): ?>
                    <option value="">Data Jurusan Kosong</option>
                    <?php else: ?>
                    <?php foreach ($jurusan->get('jurusan') as $data): ?>
                    <option value="<?= $data['kode_jurusan'] ?>"><?= $data['nama_jurusan'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <input type="radio" name="jenis_kelamin" value="1">Laki - laki
                <input type="radio" name="jenis_kelamin" value="0">Perempuan
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label class="form-label">Dosen Wali</label>
                <select name="dosen_wali" class="form-select">
                    <?php if($dosen->get('dosen') == null): ?>
                    <option value="">Data Dosen Kosong</option>
                    <?php else: ?>
                    <?php foreach ($dosen->get('dosen') as $data): ?>
                    
                    <option value="<?= $data['nidn'] ?>"><?= $data['nama_dosen'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

<?php
include 'components/footer.php';
?>
