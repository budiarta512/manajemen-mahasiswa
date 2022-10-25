<?php 
include_once "components/guestHeader.php";
?>

<div class="wrapper">
    

    <form class="form-signin" action="proses_login.php" method="POST">
    <h1 class="form-signin-heading">Login</h1>
        
            <label for="nim">Nim</label>
            <input type="text" name="nim" class="form-control" id="nim" autofocus="">
            <label for="password" >Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <button type="submit" class="btn btn-lg btn-primary btn-block" >Login</button>
    </form>
</div>
    

<?php
include('components/footer.php');
?>