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
    $penugasan = $penugasanCt->where($c)->joinSelectOne();
}

?>

<div class="row">
    <div class="col-sm-6">
    <?php if (!is_null($pengaduan)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <b style="font-size: 1.75em;"><?php echo $pengaduan->getJudul() ?></b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-info"><?php echo $pengaduan->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $pengaduan->getChildModel("Mahasiswa")->getNim() ?></span></span>
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
                <b style="font-size: 1.75em;">Tindakan Lanjut</b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-warning"><?php echo $penugasan->getChildModel("PenindakLanjut")->getIdPegawai() ?></span></span>
            </div>
            <div class="panel-body bg-warning">
                Bidang: <i><?php echo $penugasan->getChildModel("PenindakLanjut")->getBidang();
                ?></i>
            </div>
            <div class="panel-body wb-panel-content">
                Deskripsi progress:<br><br> <?php echo $pengaduan->getDeskripsiTindakLanjut() ?><br><br><hr>
                <a href="page/action/update_status_pengaduan.php?final_id_pgd=<?php echo $pengaduan->getId() ?>" class="btn btn-success wb-tugaskan">Finalisasi</a>
            </div>
            <div class="panel-footer">
                <span class="text-muted" style="font-size:0.75em;"><?php echo $pengaduan->getTanggalTindakLanjut() ?></span>
            </div>
        </div>
    </div>
</div>
