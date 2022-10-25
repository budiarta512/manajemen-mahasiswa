<?php 
include('components/header.php');
include "model/Jurusan.php";

if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}

$jurusan = new Jurusan();
?>

<div class="container mt-3">
    <h3>Daftar Jurusan</h3>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Kode Jurusan</th>
            <th scope="col">Nama Jurusan</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($jurusan->get('jurusan') as $data): ?>
        <tr>
            <td><?= $data['kode_jurusan'] ?></td>
            <td><?= $data['nama_jurusan'] ?></td>
            <td>
                <a href="edit_jurusan.php?kode_jurusan=<?php echo $data['kode_jurusan'] ?>"><button class = "btn btn-primary">Edit</button></a>
                <a href="delete_jurusan.php?kode_jurusan=<?php echo $data['kode_jurusan'] ?>"><button class = "btn btn-secondary">Delete</button></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Jurusan
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="proses_input_jurusan.php" method="POST">
            <div class="mb-3">
                <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan">
            </div>
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('components/footer.php');
?>