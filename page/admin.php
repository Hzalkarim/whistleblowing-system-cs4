<?php
    $data = Array(
        "Hafizh;2 Maret 2020;Saya Sendiri;Tidur dikelas;Karena mengantuk;klik link ini",
        "Anomim;2 Maret 2020;Saya Sendiri;Tidur dikelas;Karena mengantuk;klik link ini",
        "Rizky;2 Maret 2020;Saya Sendiri;Tidur dikelas;Karena mengantuk;klik link ini",
        "Aqilla;2 Maret 2020;Saya Sendiri;Tidur dikelas;Karena mengantuk;klik link ini"
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
                    <th>Pelanggar</th>
                    <th>Pelanggaran</th>
                    <th>Penjelasan</th>
                    <th>Bukti</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $str):?>
                <tr>
                <?php foreach(explode(';', $str) as $d):?>
                    <td><?php echo $d?></td>
                <?php endforeach?>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>