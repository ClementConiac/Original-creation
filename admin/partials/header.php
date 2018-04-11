<div class="container-fluid">
    <div class="row" id="menu">
        <div class="col-3 d-flex align-items-center justify-content-center" >
            <a href="index.php"><img src="../image/utilitaire/logo.png" class="img-fluid" id="logo" alt="Responsive image"></a>
        </div>
        <div class="col-6"></div>
        <div class="col-3 d-flex justify-content-around align-items-center">
            <?php if(isset($_SESSION['user'])): ?>
                <a class="d-block btn btn-danger button-logout" href="../index.php?logout">Logout</a>
                <?php if($_SESSION['is_admin'] == 1): ?>
                    <a class="d-block btn button-color" href="../index.php">Previous</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>






