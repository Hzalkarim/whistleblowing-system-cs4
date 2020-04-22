<?php
require_once "../../class/wb_controller.php";
require_once "../../class/wb_model.php";
require_once "../../class/controller/PengaduanController.php";
require_once "../../class/model/Pengaduan.php";
require_once "../../class/controller/MahasiswaController.php";
require_once "../../class/model/Mahasiswa.php";

if (isset($_POST['btn-submit'])) {
    $mhsCt = new MahasiswaController();
    $nimMhs = $mhsCt->getNimFromUserId($_COOKIE['user_id']);

    $pengaduan = new Pengaduan();
    $pengaduan->setAllValues($_POST);
    $pengaduan->setNimMahasiswa($nimMhs);

    $pengaduanCt = new PengaduanController();
    $result = $pengaduanCt->setTableOrView('basic_pengaduan_insert')->insert($pengaduan);

    date_default_timezone_set("Asia/Bangkok");
    if ($result == '1') {
        setcookie('submit_berhasil', 'hasil', time() + 2, "/");
    } else {
        setcookie('submit_gagal', 'gagal', time()+2, "/");
    }

    header("Location: ../../index.php?view=home");
}


?>
