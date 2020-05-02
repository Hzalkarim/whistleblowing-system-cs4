<?php

include "page/component/auth_validator/mhs_validator.php";

require_once "class/model/Kategori.php";
require_once "class/controller/KategoriController.php";

$kategoriCt = new KategoriController();
$listKategori = $kategoriCt->select();
//
// echo "<pre>";
// print_r($listKategori[0]->getValues());die;

?>

<div class="row">
    <div class="col-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Ajukan Pengaduan</h2>
            </div>
            <div class="panel-body">
                <form method="post" action="page/action/pelapor_action.php">
                    <div class="form-group">
                        <label for="pelapor">Pelapor :</label><br>
                        <!-- <input type="text" class="form-control" placeholder="Pelapor" id="pelapor" name="pelapor"> -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="privasi_pengadu" value="Sebagai Mahasiswa" checked>
                            <label class="form-check-label" for="user">Sebagai Mahasiswa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="privasi_pengadu" value="Anonim">
                            <label class="form-check-label" for="anon">Sebagai Anonim</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori Pengaduan:</label>
                        <select class="form-control" name="id_kategori">
                            <?php foreach($listKategori as $kategori):?>
                                <option value="<?php echo $kategori->getId() ?>"><?php echo $kategori->getNama() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pelapor">Judul :</label>
                        <input type="text" class="form-control" placeholder="Judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="isi">Pengaduan :</label>
                        <textarea class="form-control" rows="10" style="resize: none" placeholder="Keterangan pengaduan" name="isi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti :</label>
                        <input type="file" class="form-control-file border" name="bukti">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-submit">Submit</button>
                </form>
            </div>
            <div class="panel-footer">
                Lapor dengan Integritas dalam hati
            </div>
        </div>
    </div>
</div>
