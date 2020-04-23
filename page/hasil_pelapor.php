<?php

require_once "class/model/Mahasiswa.php";
require_once "class/controller/MahasiswaController.php";
require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/User.php";
require_once "class/controller/UserController.php";
require_once "class/model/Kategori.php";
require_once "class/controller/KategoriController.php";

$user = new User();
$user->setUserId($_COOKIE['user_id']);

$mCt = new MahasiswaController();
$mhs = $mCt->where($user)->select();

$pCt = new PengaduanController();
$p = $pCt->where($mhs)->setTableOrView('basic_pengaduan')->select();

$kat = new Kategori();
$katCt = new KategoriController();
// foreach ($p as $pengaduan){
// 	$kat->setId($pengaduan->getIdKategori());
// 	$katArr = $katCt->where($kat)->select();
// 	$pengaduan->setIdKategori($katArr[0]->getNama());
// 	print_r($pengaduan->getAllValues());
// }
// die;

?>

<div class="row">
	<div class="col-12">
		<h1>Riwayat Pengaduan</h1>
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Tanggal Pelaporan</th>
					<th>Kategori</th>
					<th>Judul</th>
					<th>Pengaduan</th>
					<th>Bukti</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php if (count($p) == 0): ?>
				<tr>
					<td colspan="6" class="h1 text-center">Belum ada submit pengaduan</td>
				</tr>
			<?php else: ?>
			<?php foreach($p as $pengaduan): ?>
				<tr>
					<td><?php echo $pengaduan->getTanggalPengaduan() ?></td>
					<td><?php echo $pengaduan->getIdKategori() ?></td>
					<td><?php echo $pengaduan->getJudul() ?></td>
					<td><?php echo $pengaduan->getIsi() ?></td>
					<td><?php echo $pengaduan->getBukti() ?></td>
					<td><?php echo $pengaduan->getStatus() ?></td>
				</tr>
			<?php endforeach;endif; ?>
			</tbody>
		</table>
	</div>
</div>
