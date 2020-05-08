<?php

include "page/component/auth_validator/admin_validator.php";

if (isset($_GET['id_prg'])){

    require_once "class/controller/PengaduanController.php";
    require_once "class/controller/PenindakLanjutController.php";
    require_once "class/controller/PenugasanController.php";
    require_once "class/model/Pengaduan.php";
    require_once "class/model/Mahasiswa.php";
    require_once "class/model/Kategori.php";
    require_once "class/model/PenindakLanjut.php";
    require_once "class/model/User.php";
    require_once "class/model/Penugasan.php";


    $pengaduanCt = new PengaduanController();
    $c = "pengaduan.id = '".$_GET['id_prg']."'";
    $pengaduan = $pengaduanCt->where($c)->joinSelectOne();
    // echo "<pre>";print_r($pengaduan);die;
    $pLanjutCt = new PenindakLanjutController();
    $pLanjut = $pLanjutCt->joinSelect();
    $penugasanCt = new PenugasanController();
    $penugasan = $penugasanCt->where($c)->joinSelect()[0];
}

?>

<div class="row">
    <div class="col-sm-2"> </div>
    <div class="col-sm-8">
        <h2 align="center">Progress pengaduan saat ini</h2>
        <br><br>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                60% Progress
            </div>
        </div>
    </div>
    <div class="col-sm-2"> </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-6">
    <?php if (!is_null($pengaduan)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <b style="font-size: 1.75em;"><?php echo $pengaduan->getJudul() ?></b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-info"><?php echo $pengaduan->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $pengaduan->getNimMahasiswa() ?></span></span>
            </div>
            <div class="panel-body bg-info">
                Kategori: <i><?php echo $pengaduan->getChildModel("Kategori")->getNama() ?></i>
            </div>
            <div class="panel-body wb-panel-content">
                <?php echo $pengaduan->getIsi() ?><br><br><br><hr>
                <i>Bukti:  </i>
                <?php echo $pengaduan->getBukti() == '' ? 'Tidak ada' : $pengaduan->getBukti() ?>
            </div>
            <div class="panel-footer">
                <span class="text-muted" style="font-size:0.75em;"><?php echo $pengaduan->getTanggalPengaduan() ?></span>
            </div>
        </div>
    <?php else: ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <b class="h2">Tidak ada pengaduan dengan id <?php echo $_GET['id_pgr'] ?></b>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    <?php endif ?>
    </div>

    <div class="col-sm-2"></div>

    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <b style="font-size: 1.75em;">Penindak Lanjut</b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-info"><?php echo $pengaduan->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $pengaduan->getNimMahasiswa() ?></span></span>
            </div>
            <div class="panel-body bg-warning">
                Bidang: <i><?php echo $penugasan->getChildModel("PenindakLanjut")->getBidang();
                ?></i>
            </div>
            <div class="panel-body wb-panel-content">
                Deskripsi progress:<br><br> Pengaduan <?php echo $pengaduan->getStatus() ?><br><br><hr>
                Id Pengaduan:  
                <i><?php echo $pengaduan->getId()?></i>
                  ||  Id Penindak Lanjut:  
                <i><?php echo $penugasan->getChildModel("PenindakLanjut")->getIdPegawai()?></i>
            </div>
            <div class="panel-footer">
                <span class="text-muted" style="font-size:0.75em;"><?php echo $pengaduan->getTanggalPengaduan() ?></span>
            </div>
        </div>
    </div>
</div>