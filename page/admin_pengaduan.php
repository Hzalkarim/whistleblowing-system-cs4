<?php

require_once "class/model/Mahasiswa.php";
require_once "class/controller/MahasiswaController.php";
require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/User.php";
require_once "class/controller/UserController.php";
require_once "class/model/Kategori.php";
require_once "class/controller/KategoriController.php";

$pengaduanCt = new PengaduanController();
$pengaduan = $pengaduanCt->setTableOrView('basic_pengaduan')->select();

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
		<h1>Daftar Pengaduan</h1>
		<hr />
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th></th>
					<th>Judul</th>
                    <th>Pelapor</th>
					<th>Tanggal Pengaduan</th>
					<th>Kategori</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php if (is_null($pengaduan)): ?>
				<tr>
					<td colspan="7" class="h1 text-center">Belum ada submit pengaduan</td>
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
                    <td width="20%" style="overflow-x: hidden"><?php echo $p->getJudul() ?></td>
					<td><?php echo $p->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $p->getNimMahasiswa() ?></td>
					<td><?php echo $p->getTanggalPengaduan() ?></td>
					<td><?php echo $p->getIdKategori() ?></td>
					<td>
                        <span class="label label-<?php echo $label[$p->getStatus()] ?>">
							<?php echo $p->getStatus() ?>
						</span>
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan="7" class="wb-hidden-row">
						<div class="wb-content-hidden collapse" id="p-<?php echo $p->getId() ?>">
							<div class="wb-content-show">
                                <b>Judul:</b><br>
								<?php echo $p->getJudul() ?><br><br>
								<b>Isi:</b><br>
								<?php echo $p->getIsi() ?><br><br><hr>
								<b>Bukti:</b><br>
								<?php echo $p->getBukti() ?>
                                <br><hr>
                                <a href="index.php?view=admin_penugasan&id_pgd=<?php echo $p->getId() ?>" class="btn btn-primary wb-tugaskan">Tugaskan</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach;endif; ?>
			</tbody>
		</table>
	</div>
</div>
