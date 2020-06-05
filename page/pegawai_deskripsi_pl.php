<?php

include "page/component/auth_validator/pegawai_validator.php";

if (isset($_GET['id_dtl'])){

    require_once "class/controller/PengaduanController.php";
    require_once "class/controller/PenindakLanjutController.php";
    require_once "class/controller/PenugasanController.php";
    require_once "class/model/Pengaduan.php";
    require_once "class/model/Mahasiswa.php";
    require_once "class/model/Kategori.php";
    require_once "class/model/PenindakLanjut.php";
    require_once "class/model/User.php";
    require_once "class/model/Penugasan.php";

    $penugasanCt = new PenugasanController();
    $c = "id_pengaduan = '".$_GET['id_dtl']."'";
    $penugasan = $penugasanCt->where($c)->selectOne();

    $pengaduan = NULL;
    $pLanjut = NULL;
    if ($penugasan){
        $pengaduanCt = new PengaduanController();
        $c = "pengaduan.id = '".$_GET['id_dtl']."'";
        $pengaduan = $pengaduanCt->where($c)->joinSelectOne();
        // echo "<pre>";print_r($pengaduan);die;
        $pLanjutCt = new PenindakLanjutController();
        $c = "penindak_lanjut.id_pegawai = {$penugasan->getIdPegawai()}";
        $pLanjut = $pLanjutCt->where($c)->joinSelectOne();
    }
}

?>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <h2 align="center">Deskripsi Laporan Tindak Lanjut</h2><br><br>
    <?php if (!is_null($pengaduan)): ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <b style="font-size: 1.75em;"><?php echo $pengaduan->getJudul() ?></b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-success"><?php echo $pengaduan->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $pengaduan->getChildModel("Mahasiswa")->getNim() ?></span></span>
            </div>
            <div class="panel-body bg-success">
                Kategori: <i><?php echo $pengaduan->getChildModel("Kategori")->getNama() ?></i>
            </div>
            <div class="panel-body wb-panel-content">
                <?php echo $pengaduan->getIsi() ?><br><br><br><hr>
                <i>Bukti:  </i>
                <?php echo $pengaduan->getBukti() == '' ? 'Tidak ada' : $pengaduan->getBukti() ?>
            </div>
             <div class="panel-body bg-info">
                Ditindak lanjuti oleh: <i><?php echo $pLanjut->getChildModel("User")->getNama();
                ?></i>
            </div>
            <div class="panel-body wb-panel-content">
                <form action="page/action/pegawai_simpan_desk.php" method="post">
                    <div class="form-group">
                        <label for="desk-tl">Deskripsi:</label>
                        <textarea name="desk-tl" class="form-control" rows="15" cols="100%" style="resize:none"><?php echo $pengaduan->getDeskripsiTindakLanjut() ?></textarea></div>
                    <input type="text" name="id-pgd" value="<?php echo $pengaduan->getId() ?>" style="display:none">
                    <input type="submit" name="btn-submit" class="btn btn-info" style="position: absolute; right:5%;" value="Simpan">
                    <br><br>
                </form>
            </div>
            <div class="panel-footer">
                <span class="text-muted" style="font-size:0.75em;"><?php echo $pengaduan->getTanggalPengaduan() ?></span>
            </div>
        </div>
    <?php else: ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <b class="h2">Tidak ada pengaduan dengan id <?php echo $_GET['id_dtl'] ?></b>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    <?php endif ?>
    </div>
    <div class="col-sm-2"></div>
</div>
