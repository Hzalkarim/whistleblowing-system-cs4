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
$user->setId($_COOKIE['user_id']);

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

$label = Array(
	'Tertunda' => 'danger',
	'Sedang diproses' => 'warning',
	'Selesai' => 'success'
);

$count = 1;
?>

<div class="row">
	<div class="col-12">
		<h1>Riwayat Pengaduan</h1>
		<hr />
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th></th>
					<th>Judul</th>
					<th>Tanggal Pengaduan</th>
					<th>Kategori</th>
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
					<td align="center" width="20px"><?php echo $count++ ?></td>
					<td align="center" width="20px">
						<button class="btn btn-secondary wb-content-toggle" data-toggle="collapse" data-target="#p-<?php echo $pengaduan->getId() ?>">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</button>
					</td>
					<td><?php echo $pengaduan->getJudul() ?></td>
					<td><?php echo $pengaduan->getTanggalPengaduan() ?></td>
					<td><?php echo $pengaduan->getIdKategori() ?></td>
					<td>
						<span class="label label-<?php echo $label[$pengaduan->getStatus()] ?>">
							<?php echo $pengaduan->getStatus() ?>
						</span>
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan="6" class="wb-hidden-row">
						<div class="wb-content-hidden collapse" id="p-<?php echo $pengaduan->getId() ?>">
							<div class="wb-content-show">
								<b>Isi:</b><br>
								<?php echo $pengaduan->getIsi() ?><br><br><hr>
								<b>Bukti:</b><br>
								<?php echo $pengaduan->getBukti() ?>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach;endif; ?>
			</tbody>
		</table>
	</div>
</div>
