<?php
include "../component/auth_validator/admin_validator.php";

require "../../class/wb_controller.php";
require "../../class/wb_model.php";
require "../../class/model/Penugasan.php";
require "../../class/controller/PenugasanController.php";
require "../../class/controller/PengaduanController.php";

$penugasan = new Penugasan();
$penugasan->setUserIdAdmin($_SESSION['user_id']);
$penugasan->setIdPegawai($_GET['id_pgw']);
$penugasan->setIdPengaduan($_GET['id_pgd']);

$penugasanCt = new PenugasanController();
$result = $penugasanCt->insert($penugasan);

date_default_timezone_set("Asia/Bangkok");
if ($result) {
    $pgdCt = new PengaduanController();
    $c = "id = " . $_GET['id_pgd'];
    $pgdCt->where($c)->updateStatus('Sedang Diproses');

    setcookie('update-berhasil', 'hasil', time() + 2, "/");
    setcookie('update-pesan', 'Penugasan berhasil dilakukan.', time() + 2, "/");
} else {
    setcookie('update-gagal', 'gagal', time()+2, "/");
    setcookie('update-pesan', 'Penugasan gagal dilakukan. Silakan menyerah...', time() + 2, "/");
}

header("Location: ../../index.php?view=admin_pengaduan");
?>
