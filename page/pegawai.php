<?php
include "page/component/auth_validator/pegawai_validator.php";

require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/PenindakLanjut.php";
require_once "class/controller/PenindakLanjutController.php";
require_once "class/model/User.php";
require_once "class/controller/UserController.php";

$pLanjutCt = new PenindakLanjutController();
$c = "user.id = '".$_SESSION['user_id']."'";
$pLanjut = $pLanjutCt->where($c)->joinSelectOne();
//echo "<h2>Under Construction</h2>";die;
$pengaduanCt = new PengaduanController();
$c = "id IN (SELECT id_pengaduan FROM penugasan WHERE id_pegawai = '".$pLanjut->getIdPegawai()."') AND status != 'Selesai'";
$pengaduan = $pengaduanCt->where($c)->select();
?>


<div class="row">
    <div class="col-12">
        <div class="well well-lg my-3">
            <h3 class="display-4">Daftar Pengaduan</h1><hr>
            <h4>Bidang: <?php echo $pLanjut->getBidang() ?></h4>
        </div>
    </div>
<?php if (count($pengaduan) > 0): ?>
<?php foreach($pengaduan as $p): ?>
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b><?php echo $p->getJudul() ?></b><span style="position: absolute; right:5%;">oleh:
                <span class="label label-info"><?php echo $p->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $p->getNimMahasiswa() ?></span></span>
            </div>
            <div class="panel-body wb-panel-content">
                <?php echo $p->getIsi() ?>
            </div>
            <div class="panel-footer">
                <i class="text-muted" style="font-size: .75em;">dilaporkan pada <?php echo $p->getTanggalPengaduan() ?></i><br><br>
                <a href="index.php?view=pegawai_deskripsi_pl&id_dtl=<?php echo $p->getId() ?>" class="btn btn-primary wb-tugaskan">Tindak Lanjuti</a>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php else: ?>
    <div class="col-12">
        <div class="text-center">
            <h2>Tidak Ada Penugasan</h2>
        </div>
    </div>
<?php endif ?>
</div>
