<?php

include "page/component/auth_validator/admin_validator.php";

require_once "class/model/Mahasiswa.php";
require_once "class/controller/MahasiswaController.php";
require_once "class/model/Pengaduan.php";
require_once "class/controller/PengaduanController.php";
require_once "class/model/User.php";
require_once "class/controller/UserController.php";
require_once "class/model/Kategori.php";
require_once "class/controller/KategoriController.php";

$pengaduanCt = new PengaduanController();
$pengaduan = $pengaduanCt->joinSelect();

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
					<td><?php echo $p->getPrivasiPengadu() == 'Anonim' ? 'Anonim' : $p->getChildModel("Mahasiswa")->getNim() ?></td>
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
					<td colspan="7" class="wb-hidden-row" method="get" action="page/action/update_status_pengaduan.php">
						<div class="wb-content-hidden collapse" id="p-<?php echo $p->getId() ?>">
							<div class="wb-content-show">
                                <b>Judul:</b><br>
								<?php echo $p->getJudul() ?><br><br>
								<b>Isi:</b><br>
								<?php echo $p->getIsi() ?><br><br><hr>
								<b>Bukti:</b><br>
								<?php echo $p->getBukti() ?>
                                <br><hr>
							<?php
							switch ($p->getStatus()):
								case 'Tertunda':
							?>
                                <a href="index.php?view=admin_penugasan&id_pgd=<?php echo $p->getId() ?>" class="btn btn-danger wb-tugaskan">Tugaskan</a>
							<?php
								break;
								case 'Sedang diproses':
							?>
								<a href="index.php?view=admin_progress&id_prg=<?php echo $p->getId() ?>" class="btn btn-warning wb-tugaskan">Lihat Progress</a>
								<a type="button" class="btn btn-success wb-tugaskan" data-toggle="modal" data-target="#myModalFinalisasi" name="btn-final">Finalisasi</a>
								<!-- Modal -->
  								<div class="modal fade" id="myModalFinalisasi" role="dialog">
    								<div class="modal-dialog modal-sm">
      								<div class="modal-content">
        								<div class="modal-header alert-success">
          								<button type="button" class="close" data-dismiss="modal">&times;</button>
          								<h4 class="modal-title">Modal Header</h4>
        								</div>
        								<div class="modal-body">
        								<?php $p->setStatus('Selesai') ?>
          								<p>Laporan pengaduan selesai!!</p>
        								</div>
        								<div class="modal-footer alert-success">
          								<button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
        								</div>
      								</div>
    								</div>
  								</div>
							<?php
								break;
								case 'Selesai':
							?>
								<a href="index.php?view=admin_deskripsiTL&id_dtl=<?php echo $p->getId() ?>" class="btn btn-success wb-tugaskan">Deskripsi Tindak Lanjut</a>
								<a type="button" class="btn btn-danger wb-tugaskan" data-toggle="modal" data-target="#myModalTarikStatus" name="btn-tunda">Tarik Status</a>
								<!-- Modal -->
  								<div class="modal fade" id="myModalTarikStatus" role="dialog">
    								<div class="modal-dialog modal-sm">
      								<div class="modal-content">
        								<div class="modal-header alert-danger">
          								<button type="button" class="close" data-dismiss="modal">&times;</button>
          								<h4 class="modal-title">Modal Header</h4>
        								</div>
        								<div class="modal-body">
          								<p>Laporan pengaduan ditunda!</p>
        								</div>
        								<div class="modal-footer alert-danger">
          								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        								</div>
      								</div>
    								</div>
  								</div>
							<?php break; endswitch ?>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach;endif; ?>
			</tbody>
		</table>
	</div>
</div>
