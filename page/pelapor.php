<div class="row">
    <div class="col-12">
        <h1>Form Pengaduan</h1>
        <hr />

        <div class="jumbotron">
            <form method="post" action="index.php?view=hasilPelapor">
                <div class="form-group">
                    <label for="pelapor">Pelapor :</label><br>
                    <!-- <input type="text" class="form-control" placeholder="Pelapor" id="pelapor" name="pelapor"> -->
                    <div class="form-check-inline">
                        <label for="user">
                            <input type="radio" name="pelapor" value="user" checked> Sebagai Mahasiswa
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label for="anon">
                            <input type="radio" name="pelapor" value="anon"> Sebagai Anonim
                        </label>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="pelanggar">Pihak Terkait :</label>
                    <input type="text" class="form-control" placeholder="Pelanggar" id="pelanggar" name="pihak-terkait">
                </div> -->
                <div class="form-group">
                    <label for="sel1">Kategori Pengaduan:</label>
                    <select class="form-control" id="sel1">
                        <option>Layanan Kedisiplinan</option>
                        <option>Layanan Akedemik</option>
                        <option>Layanan Sarana Prasarana</option>
                        <option>Layanan Keuangan</option>
                        <option>Layanan Perpustakaan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pelapor">Judul :</label>
                    <input type="text" class="form-control" placeholder="Pelapor" id="pelapor" name="judul">
                </div>
                <div class="form-group">
                    <label for="pengaduan">Pengaduan :</label>
                    <textarea class="form-control" rows="5" placeholder="Keterangan pengaduan" id="Pengaduan" name="pengaduan"></textarea>
                </div>
                <div class="form-group">
                    <label for="bukti">Bukti :</label>
                    <input type="file" class="form-control-file border" name="bukti">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
