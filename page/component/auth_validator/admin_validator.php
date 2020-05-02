<?php

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Administrator'):
?>

<?php else: ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger">
            <b>Akses Ditolak!</b> Halaman ini hanya dapat dilihat oleh Administrator <br><br>
            <a href="index.php">Halaman utama</a>
        </div>
    </div>
</div>
<?php die();endif; ?>
