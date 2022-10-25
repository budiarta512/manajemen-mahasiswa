<?php 
$nim = $_GET['nim'];
include('components/header.php');
include_once "model/Behavior.php";


if(!isAdmin()) {
    echo "<script>window.location='dashboard.php'</script>";
}
$con = mysqli_connect("localhost","root","","bd203_db_uts");
?>
<div class="container mt-3">
<h1>Behavior Point</h1>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
            <div id="curve_chart" style="width: 100%; height: 500px"></div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3 mb-5">
        <h1>Behavior Report</h1>
        <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#formModal">
  Add New Report
</button>
<div class = "card mb-3">
    <div class = "card-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Point</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
        $behavior = new Behavior();
        $datas = $behavior->findByNim($nim);
        foreach($datas as $data) {
        ?>

            <tr>  
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
                <td><?php echo $data['point'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Report Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="proses_report.php" method="POST">
      <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim'] ?>" readonly>
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
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
include('components/footer.php');
?>