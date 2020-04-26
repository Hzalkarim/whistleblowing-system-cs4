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

    $_POST['isi'] = $_POST['isi'] == '' ? 'NULL' : $_POST['isi'];
    $_POST['judul'] = $_POST['judul'] == '' ? 'NULL' : $_POST['judul'];

    $pengaduan = new Pengaduan();
    $pengaduan->setAllValues($_POST);
    $pengaduan->setNimMahasiswa($nimMhs);

    $pengaduanCt = new PengaduanController();
    $result = $pengaduanCt->setTableOrView('basic_pengaduan_insert')->insert($pengaduan);

    date_default_timezone_set("Asia/Bangkok");
    if ($result == '1') {
        setcookie('submit-berhasil', 'hasil', time() + 2, "/");
        setcookie('submit-pesan', 'Pengaduan berhasil disubmit', time() + 2, "/");
    } else {
        setcookie('submit-gagal', 'gagal', time()+2, "/");
        setcookie('submit-pesan', 'Pengaduan gagal disubmit', time() + 2, "/");
    }

    header("Location: ../../index.php?view=home");
}


?>
