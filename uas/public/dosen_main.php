<?php 
include('components/header.php');
include_once "model/Dosen.php";
if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}
?>

<!-- body -->

<div class="container mt-3">
    <h1>Data Dosen</h1> <br>
    <form action="#" method="GET">
            <div class="mb-3">
                <label for="nim" class="form-label">Cari Dosen</label>
                <input type="text" class="form-control"  name="cari">
            </div>
            <button type="submit" class="btn btn-primary" value="cari">Search</button>
            <a href="tambah_dosen.php" class="btn btn-primary">Tambah Dosen</a>
        </form>
        <?php
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b> Results of : ".$cari."</b>";
}
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nidn</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Pendidikan</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Gender</th>
                <th scope="col">Alamat</th></th>
                <th scope="col">No Hp</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
        $cari = $_GET['cari'] ?? '';
        $dosen = new Dosen();
        foreach($dosen->searchByName($cari) as $data) {
        ?>
            <tr>
                <td><?php echo $data['nidn'] ?></td>
                <td><?php echo $data['nama_dosen'] ?></td>
                <td><?php echo $data['pendidikan_dosen'] ?></td>
                <td><?php echo $data['tgl_lahir_dosen'] ?></td>
                <td><?php echo $data['gender_dosen'] == 1 ? "Laki-laki" : "Perempuan" ?></td>
                <td><?php echo $data['alamat_dosen'] ?></td>
                <td><?php echo $data['no_hp_dosen'] ?></td>
                <td><?php echo $data['email_dosen'] ?></td>
                <td>
                    <a href="edit_dosen.php?nidn=<?php echo $data['nidn'] ?>"><button class = "btn btn-primary">Edit</button></a>
                    <a href="delete_dosen.php?nidn=<?php echo $data['nidn'] ?>"><button class = "btn btn-secondary">Delete</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php
include('components/footer.php');
?>