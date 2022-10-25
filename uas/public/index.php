<?php 
include('components/header.php');
include_once "model/Mahasiswa.php";
include_once "model/Behavior.php";

$behavior = new Behavior();
if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}
?>

<!-- body -->

<div class="container mt-3">
    <h1>Data Mahasiswa</h1> <br>
    <form action="#" method="GET">
            <div class="mb-3">
                <label for="nim" class="form-label">Cari Mahasiswa</label>
                <input type="text" class="form-control"  name="cari">
            </div>
            <button type="submit" class="btn btn-primary" value="cari">Search</button>
            <a href="mahasiswa.php" class="btn btn-primary">Tambah Mahasiswa</a>
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
                <th scope="col"></th>
                <th scope="col">Nim</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Hp</th>
                <th scope="col">Email</th>
                <th scope="col">Dosen Wali</th>
                <th scope="col">Student performance</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
        $cari = $_GET['cari'] ?? '';
        $mahasiswa = new Mahasiswa();
        $datas = $mahasiswa->searchByName($cari);
        foreach($datas as $data) {
        ?>

            <tr>
                <td><img src="foto/<?php echo $data['foto'] == '' ? 'default.png' : $data['foto'] ?>" width="25px"> </img></td>
                <td><?php echo $data['nim'] ?></td>
                <td><?php echo $data['nama_mhs'] ?></td>
                <td><?php echo $data['nama_jurusan'] ?></td>
                <td><?php echo $data['jenis_kelamin'] == 1 ? "Laki-laki" : "Perempuan" ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['no_hp'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['nama_dosen'] ?></td>
                <td><a href="student_performance.php?nim=<?php echo $data['nim'] ?>"><?php 
                    echo $behavior->findByNim($data['nim'])[0]['point'];
                ?></a></td>
                <td>
                    <a href="edit.php?nim=<?php echo $data['nim'] ?>"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
                <a href="delete.php?nim=<?php echo $data['nim'] ?>"><button class="btn btn-secondary" >Delete</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php
include('components/footer.php');
?>