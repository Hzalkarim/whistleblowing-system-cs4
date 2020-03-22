<div class="container">
<h1>Laporan</h1>
<hr />
<p>
    Pada page ini seseorang dapat melaporkan tindakan yang tidak sesuian dengan hukum yang ada pada peraturan menara 165. 
</p>

<div class="jumbotron">
  <form method="post" action="hasilPelapor.php">
      <div class="form-group">
        <label for="pelapor">Pelapor :</label>
        <input type="text" class="form-control" placeholder="Pelapor" id="pelapor" name="pelapor">
      </div>
      <div class="form-group">
        <label for="pelanggar">Pelanggar :</label>
        <input type="text" class="form-control" placeholder="Pelanggar" id="pelanggar" name="pelanggar">
      </div>
      <div class="form-group">
        <label for="sel1">Pelanggaran Kategori:</label>
        <select class="form-control" id="sel1">
          <option>Layanan Kedisiplinan</option>
          <option>Layanan Akedemik</option>
          <option>Layanan Sarana Prasarana</option>
          <option>Layanan Keuangan</option>
          <option>Layanan Perpustakaan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pengaduan">Pengaduan :</label>
        <textarea class="form-control" rows="5" placeholder="Keterangan pengaduan" id="Pengaduan" name="pengaduan"></textarea>
      </div>
      <div class="form-group">
        <label for="bukti">Foto kejadian :</label>
        <input type="file" class="form-control-file border" name="penjelasan">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>