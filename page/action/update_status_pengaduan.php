<?php

	include "../component/auth_validator/admin_validator.php";

	require_once "../../class/wb_controller.php";
	require_once "../../class/wb_model.php";
	require_once "../../class/model/Pengaduan.php";
    require_once "../../class/controller/PengaduanController.php";

	$result = '0';
	if (isset($_GET['final_id_pgd'])){

    	$pengaduanCt = new PengaduanController();
    	$c = "id = '".$_GET['final_id_pgd']."'";
    	$pengaduan = $pengaduanCt->where($c)->SelectOne();
    	$pengaduan->setStatus("Selesai");
    	$result = $pengaduanCt->update($pengaduan);
	}

	if (isset($_GET['tunda_id_pgd'])){

    	$pengaduanCt = new PengaduanController();
    	$c = "id = '".$_GET['tunda_id_pgd']."'";
    	$pengaduan = $pengaduanCt->where($c)->SelectOne();
    	$pengaduan->setStatus("Tertunda");
    	$result = $pengaduanCt->update($pengaduan);
	}

	date_default_timezone_set("Asia/Bangkok");
    if ($result == '1') {
        setcookie('update-berhasil', 'hasil', time() + 2, "/");
        setcookie('update-pesan', 'Status pengaduan berhasil diupdate', time() + 2, "/");
    } else {
        setcookie('update-gagal', 'gagal', time()+2, "/");
        setcookie('update-pesan', 'Status pengaduan gagal diupdate', time() + 2, "/");
    }

	header("Location: ../../index.php?view=admin_pengaduan");
?>
