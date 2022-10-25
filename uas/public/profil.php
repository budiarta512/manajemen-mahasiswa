<?php 
include('components/header.php');
include_once "model/Mahasiswa.php";
include_once "model/Behavior.php";

if(!isMahasiswa()) {
    echo "<script>window.location='index.php'</script>";
}

$con = mysqli_connect("localhost","root","","bd203_db_uts");
?>

<div class="container mt-3">
    <h1>Profil mahasiswa</h1>
</div>

<div class = "container">
<?php
$mahasiswa = new Mahasiswa();
$datas = $mahasiswa->show();
foreach($datas as $data) {
?>
      <div class="main-body mt-3">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="foto/<?php echo $data['foto'] == '' ? 'default.png' : $data['foto'] ?>"  alt="Admin" class="rounded-3" width="250px" height="306px" />
                  <div class="mt-3">
                    <p>NIM</p>
                    <h4><?php echo $data['nim'] ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nama Lengkap</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['nama_mhs'] ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Jurusan</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['nama_jurusan'] ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Jenis Kelamin</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['jenis_kelamin'] == 1 ? "Laki-laki" : "Perempuan" ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Alamat</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['alamat'] ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nomor Telepon</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['no_hp'] ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['email'] ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Dosen Wali</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $data['nama_dosen'] ?></div>
                </div>
                <hr />
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
</div>
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
        <div id="curve_chart" style="width: 100%; height: 500px"></div>
        </div>
    </div>
</div>
<div class="container mt-3 mb-5">
  <div class = "card mb-3">
    <div class="card-body">
        <h1>Behavior Report</h1> <br>
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
        $datas = $behavior->show();
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

<style type="text/css">
      .main-body {
        padding: 15px;
      }
      .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      }

      .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
      }

      .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
      }

      .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
      }

      .gutters-sm > .col,
      .gutters-sm > [class*="col-"] {
        padding-right: 8px;
        padding-left: 8px;
      }
      .mb-3,
      .my-3 {
        margin-bottom: 1rem !important;
      }

      .bg-gray-300 {
        background-color: #e2e8f0;
      }
      .h-100 {
        height: 100% !important;
      }
      .shadow-none {
        box-shadow: none !important;
      }
    </style>
<?php
include('components/footer.php');
?>