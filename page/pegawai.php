<?php
    $data = Array(
        "Hafizh;2 Maret 2020;Layanan Kedisiplinan;Saya Tidur;Karena mengantuk;klik link ini",
        "Anomim;2 Maret 2020;Layanan Kedisiplinan;Saya Tidur;Karena mengantuk;klik link ini",
        "Rizkyy;4 Maret 2020;Sarana Prasarana;AC Mati;Jadi susah tidur karena kepanasan;"
    );

    $bidang = "Layanan Kedisiplinan";
?>


<div class="row">
    <div class="col-12">
        <div class="jumbotron my-3">
            <h3 class="display-4">Daftar Pengaduan</h1><hr>
            <h4>Bidang: Layanan Kedisiplinan</h4>
        </div>
    </div>
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pelapor</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Pengaduan</th>
                    <th>Bukti</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $str):?>
                <tr>
                <?php foreach(explode(';', $str) as $d):?>
                    <td><?php echo $d?></td>
                <?php endforeach?>
                    <td>
                        <a href="#" class="btn btn-primary"
                        <?php if (!strpos($str, $bidang)) echo "disabled" ?>
                        >
                        Tindak</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
