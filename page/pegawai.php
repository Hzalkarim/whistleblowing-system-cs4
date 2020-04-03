<?php
    $data = Array(
        "Hafizh;2 Maret 2020;Saya Sendiri;Kedisiplinan;Karena mengantuk;klik link ini",
        "Anomim;2 Maret 2020;Saya Sendiri;Kedisiplinan;Karena mengantuk;klik link ini",
        "Rizkyy;4 Maret 2020;;Sarana Prasarana;Jadi susah tidur karena kepanasan;"
    );
?>


<div class="row">
    <div class="col-12">
        <div class="jumbotron my-3">
            <h3 class="display-4">Tampilan Data Pelaporan</h1>
        </div>
    </div>
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pelapor</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Pihak Terkait</th>
                    <th>Kategori</th>
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
                    <td><button class="btn btn-primary">Tindak</button> </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
