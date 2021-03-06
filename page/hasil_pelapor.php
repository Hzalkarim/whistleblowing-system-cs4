<?php

include "page/component/auth_validator/mhs_validator.php";

require_once "class/model/Mahasiswa.php";
require_once "class/model/ProgramStudi.php";
require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/User.php";
require_once "class/model/Kategori.php";

$pengaduanCt = new PengaduanController();
$c = "mahasiswa.user_id = {$_SESSION['user_id']}";
$pengaduan = $pengaduanCt->where($c)->joinSelect();

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
			<?php if (is_null($pengaduan)): ?>
				<tr>
					<td colspan="6" class="h1 text-center">Belum ada submit pengaduan</td>
				</tr>
			<?php else: ?>
			<?php foreach($pengaduan as $p): ?>
				<tr>
					<td align="center" width="20px"><?php echo $count++ ?></td>
					<td align="center" width="20px">
						<button class="btn btn-secondary wb-content-toggle" data-toggle="collapse" data-target="#p-<?php echo $p->getId() ?>">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</button>
					</td>
					<td><?php echo $p->getJudul() ?></td>
					<td><?php echo $p->getTanggalPengaduan() ?></td>
					<td><?php echo $p->getChildModel("Kategori")->getNama() ?></td>
					<td>
						<span class="label label-<?php echo $label[$p->getStatus()] ?>">
							<?php echo $p->getStatus() ?>
						</span>
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan="6" class="wb-hidden-row">
						<div class="wb-content-hidden collapse" id="p-<?php echo $p->getId() ?>">
							<div class="wb-content-show">
								<b>Isi:</b><br>
								<?php echo $p->getIsi() ?><br><br><hr>
								<b>Bukti:</b><br>
								<?php echo $p->getBukti() ?>
								<?php if ($p->getStatus() == 'Selesai'){
									echo "<hr><b>Tindak Lanjut:</b><br>".$p->getDeskripsiTindakLanjut()."<br><br>";
								}?>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach;endif; ?>
			</tbody>
		</table>
	</div>
</div>
