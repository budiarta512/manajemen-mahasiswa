<?php 
include('components/header.php');


if(!isMahasiswa()) {
    echo "<script>window.location='index.php'</script>";
}

$con = mysqli_connect("localhost","root","","bd203_db_uts");


?>


<div class="container mt-3">
    <h1>Dashboard mahasiswa</h1>
</div>

<?php
include('components/footer.php');
?>