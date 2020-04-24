<?php
require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/PenindakLanjut.php";
require_once "class/controller/PenindakLanjutController.php";
require_once "class/model/User.php";
require_once "class/controller/UserController.php";

$user = new User();
$user->setId($_COOKIE['user_id']);

$userCt = new UserController();
$user = $userCt->where($user)->selectOne();

$pLanjutCt = new PenindakLanjutController();
$pLanjut = $pLanjutCt->where($user)->selectOne();

$pengaduanCt = new PengaduanController();
$pengaduan = $pengaduanCt->setTableOrView('pengaduan')->where($pLanjut)->select();


?>


<div class="row">
    <div class="col-12">
        <div class="well well-lg my-3">
            <h3 class="display-4">Daftar Pengaduan</h1><hr>
            <h4>Bidang: Layanan Kedisiplinan</h4>
        </div>
    </div>
    <!-- <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pelapor</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Pengaduan</th>
                    <th>Bukti</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div> -->
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
                <i class="text-muted" style="font-size: .75em;">dilaporkan pada <?php echo $p->getTanggalPengaduan() ?></i>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>
