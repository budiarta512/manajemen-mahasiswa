<?php
$nim = $_GET['nim'];
include "model/Mahasiswa.php";
include "model/Dosen.php";
include "model/Jurusan.php";
include "components/header.php";

if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}

$mahasiswa = new Mahasiswa();
$dosen = new Dosen();
$jurusan = new Jurusan();

$data = $mahasiswa->findByNim($nim);

?>
    <div class="container mt-3">
        <h1>Edit Data Mahasiswa</h1>
        <form action="proses_update.php" method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim'] ?>" readonly >
            </div>
            <div class="mb-3">
                <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?php echo $data['nama_mhs'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Jurusan</label>
                <select name="jurusan" class="form-select">
                <?php if($jurusan->get('jurusan') == null): ?>
                    <option value="">Data Jurusan Kosong</option>
                    <?php else: ?>
                    <?php foreach ($jurusan->get('jurusan') as $jurusan): ?>
                    <option value="<?= $jurusan['kode_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <?php if ($data['jenis_kelamin'] == 1) { ?>
                    <input type="radio" name="jenis_kelamin" value="1" checked>Laki - laki
                    <input type="radio" name="jenis_kelamin" value="0">Perempuan
                <?php } else { ?>
                    <input type="radio" name="jenis_kelamin" value="1">Laki - laki
                    <input type="radio" name="jenis_kelamin" value="0" checked>Perempuan
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dosen Wali</label>
                <select class="form-select" name="dosen_wali">
                    <?php if($dosen->get('dosen') == null): ?>
                    <option value="">Data Dosen Kosong</option>
                    <?php else: ?>
                    <?php foreach ($dosen->get('dosen') as $dosen): ?>
                    
                    <option value="<?= $dosen['nidn'] ?>"><?= $dosen['nama_dosen'] ?></option>
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