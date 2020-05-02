<?php

include "page/component/auth_validator/admin_validator.php";

if (isset($_GET['id_pgd'])){

    require_once "class/model/Pengaduan.php";
    require_once "class/controller/PengaduanController.php";

    require_once "class/model/Kategori.php";
    require_once "class/controller/KategoriController.php";

    require_once "class/model/PenindakLanjut.php";
    require_once "class/controller/PenindakLanjutController.php";

    require_once "class/model/User.php";
    require_once "class/controller/UserController.php";

    $katCt = new KategoriController();
    $katArr = $katCt->select();

    $kate = Array();
    foreach ($katArr as $k){
        $kate[$k->getId()] = $k->getNama();
    }

    $pengaduanCt = new PengaduanController();
    $pengaduanCari = new Pengaduan();
    $pengaduanCari->setId($_GET['id_pgd']);

    $pengaduan = $pengaduanCt->setTableOrView('basic_pengaduan')->where($pengaduanCari)->selectOne();

    $pLanjutCt = new PenindakLanjutController();
    $pLanjut = $pLanjutCt->select();

    $userCt = new UserController();

}

?>
<div class="row">
    <div class="col-sm-0 col-md-1 col-lg-2"></div>
    <div class="col-sm-12 col-md-10 col-lg-8">
    <?php if (!is_null($pengaduan)): ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <b style="font-size: 1.75em;"><?php echo $pengaduan->getJudul() ?></b>
                <span style="position: absolute; right:5%;">oleh:
                <span class="label label-success"><?php echo $pengaduan->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $pengaduan->getNimMahasiswa() ?></span></span>
            </div>
            <div class="panel-body bg-success">
                Kategori: <i><?php echo $kate[$pengaduan->getIdKategori()] ?></i>
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
                <b class="h2">Tidak ada pengaduan dengan id <?php echo $_GET['id_pgd'] ?></b>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    <?php endif ?>
    </div>
    <div class="col-sm-0 col-md-1 col-lg-2"></div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="text-center">
            <h2>Pilih Penindak Lanjut</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-0 col-md-1 col-lg-2"></div>
    <div class="col-sm-12 col-md-10 col-lg-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>Daftar Penindak Lanjut</b>
            </div>
            <table class="table">
                <thead>
                    <th>Id pegawai</th>
                    <th>Nama pegawai</th>
                    <th>Bidang</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($pLanjut as $p):
                        $u = new User();
                        $u->setId($p->getUserId());
                        $u = $userCt->where($u)->selectOne();
                        ?>
                        <tr>
                            <td><?php echo $p->getIdPegawai() ?></td>
                            <td><?php echo $u->getNama() ?></td>
                            <td><?php echo $p->getBidang() ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-briefcase"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-0 col-md-1 col-lg-2"></div>
</div>
