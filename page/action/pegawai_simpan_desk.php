<?php
include "../component/auth_validator/pegawai_validator.php";

require_once "../../class/wb_controller.php";
require_once "../../class/wb_model.php";
require_once "../../class/model/Pengaduan.php";
require_once "../../class/controller/PengaduanController.php";

if (isset($_POST['btn-submit'])){
    $pengaduanCt = new PengaduanController();
    $c = "id = {$_POST['id-pgd']}";
    $result = $pengaduanCt->where($c)->updateTindakLanjut($_POST['desk-tl']);
}

header("Location: ../../index.php?view=pegawai_deskripsi_pl&id_dtl={$_POST['id-pgd']}");
?>
