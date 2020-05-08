<?php

	include "page/component/auth_validator/admin_validator.php";

	require_once "class/controller/PengaduanController.php";
    require_once "class/controller/PenindakLanjutController.php";
    require_once "class/model/Pengaduan.php";
    require_once "class/model/Mahasiswa.php";
    require_once "class/model/Kategori.php";
    require_once "class/model/PenindakLanjut.php";
    require_once "class/model/User.php";
    require_once "class/model/Penugasan.php";

	if (isset($_GET['btn-final'])){

    	$pengaduanCt = new PengaduanController();
    	$c = "pengaduan.id = '".$_GET['id_pgd']."'";
    	$pengaduan = $pengaduanCt->where($c)->SelectOne();
    	$pengaduan->setStatus("Selesai");
    	$pengaduan->update($pengaduan);
	}

	if (isset($_GET['btn-tunda'])){

    	$pengaduanCt = new PengaduanController();
    	$c = "pengaduan.id = '".$_GET['id_pgd']."'";
    	$pengaduan = $pengaduanCt->where($c)->SelectOne();
    	$pengaduan->setStatus("Tertunda");
    	$pengaduan->update($pengaduan);
	}	
?>