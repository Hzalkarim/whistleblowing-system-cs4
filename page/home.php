<?php
include "class/controller/PengaduanController.php";

$pengaduanCt = new PengaduanController();
$total = $pengaduanCt->getCount();
?>

<div class="row">
<?php if (isset($_COOKIE['submit-berhasil'])): ?>
    <div class="col-12">
        <div class="alert alert-success">
            <b>Berhasil!</b> <?php echo $_COOKIE['submit-pesan'] ?>
        </div>
    </div>
<?php elseif (isset($_COOKIE['submit-gagal'])): ?>
    <div class="col-12">
        <div class="alert alert-danger">
            <b>Gagal!</b> <?php echo $_COOKIE['submit-pesan'] ?>
        </div>
    </div>
<?php endif; ?>
    <div class="jumbotron col-12 text-center bg-light mt-0">
        <h1 class="home-title">Whistleblowing System</h1>
    </div>
    <div class="col-12 text-center">
        <h2 class="my-4">Jumlah Laporan: <?php echo $total ?>K</h2>
        <img src="asset/img/flow.svg" id="flow" alt="Flow">
    </div>
  </div>
</div>
