<?php
include "class/controller/PengaduanController.php";

$pengaduanCt = new PengaduanController();
$total = $pengaduanCt->getCount();
?>

<div class="row">
    <div class="col-12 text-center bg-light mt-0">
        <h1 class="display-1 home-title">Whistleblowing System</h1>
    </div>
    <div class="col-12 text-center">
        <h2 class="my-4">Jumlah Laporan: <?php echo $total ?></h2>
        <img src="asset/img/flow.svg" id="flow" alt="Flow">
    </div>
  </div>
</div>
