<?php 
include('components/header.php');
include_once "model/Mahasiswa.php";
include_once "model/Behavior.php";


if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}
$con = mysqli_connect("localhost","root","","bd203_db_uts");


$mahasiswa = New Mahasiswa();
$behavior = New Behavior();

?>

<div class="container mt-3">
        <h1>Behavior Report Form</h1>
        <form action="proses_report.php" method="POST">
        <div class="mb-3">
                <label class="form-label">Mahasiswa</label><br>
                <select name="nama_mhs" class="form-control">
                    <?php if($mahasiswa->get('mahasiswa') == null): ?>
                    <option value="">Data Mahasiswa Kosong</option>
                    <?php else: ?>
                    <?php foreach ($mahasiswa->get('mahasiswa') as $data): ?>
                    
                    <option  value="<?= $data['nim'] ?>"><?= $data['nama_mhs'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="point" class="form-label">Point</label>
                <input type="text" class="form-control" id="point" name="point">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

<?php
include('components/footer.php');
?>