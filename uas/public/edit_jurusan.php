<?php 
include "components/header.php";
include "model/Jurusan.php";

if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}

$kode_jurusan = $_GET['kode_jurusan'];
$jurusan = new Jurusan();


$data = $jurusan->findByKodeJurusan($kode_jurusan);
?>

<div class="container">
    <div class="mt-5">
        <h3>Edit Jurusan</h3>
        <form action="proses_update_jurusan.php" method="POST">
            <div class="mb-3">
                <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" value="<?php echo $data['kode_jurusan'] ?>">
            </div>
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?php echo $data['nama_jurusan'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php 
include "components/footer.php";
?>