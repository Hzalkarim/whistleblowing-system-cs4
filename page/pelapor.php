<?php

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
        <h1>Form Pengaduan</h1>
        <hr />

        <div class="jumbotron">
            <form method="post" action="index.php?view=hasil_pelapor">
                <div class="form-group">
                    <label for="pelapor">Pelapor :</label><br>
                    <!-- <input type="text" class="form-control" placeholder="Pelapor" id="pelapor" name="pelapor"> -->
                    <div class="form-check-inline">
                        <label for="user">
                            <input type="radio" name="pelapor" value="Sebagai Mahasiswa" checked> Sebagai Mahasiswa
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label for="anon">
                            <input type="radio" name="pelapor" value="Anonim"> Sebagai Anonim
                        </label>
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
                    <label for="pengaduan">Pengaduan :</label>
                    <textarea class="form-control" rows="5" placeholder="Keterangan pengaduan" id="Pengaduan" name="pengaduan"></textarea>
                </div>
                <div class="form-group">
                    <label for="bukti">Bukti :</label>
                    <input type="file" class="form-control-file border" name="bukti">
                </div>
                <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
            </form>
        </div>
    </div>
</div>
