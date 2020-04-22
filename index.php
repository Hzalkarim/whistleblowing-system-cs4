<?php

include "class/wb_controller.php";
include "class/wb_model.php";

$pages = Array(
    'home' => 'Sistem Pengaduan Kampus',
    'pelapor' => 'Submit Pengaduan',
    'hasil_pelapor' => 'Histori Pengaduan',
    'pegawai' => 'Daftar Pengaduan',
    'pegawai_regis' => 'Registrasi Pegawai',
    'mhs_regis' => 'Registrasi Mahasiswa',
);

if (!isset($_GET['view'])) $_GET['view'] = 'home';

$page_title = '';
$page_exist = false;
if (array_key_exists($_GET['view'], $pages)){
    $page_title = $pages[$_GET['view']];
    $page_exist = true;
} else {
    $page_title = "Page not found";
}

require "page/component/header.php";

?>

<main class="container">
    <?php
    if (!$page_exist){
        echo '<div class="display-1">404 Not Found</div>';
    } else {
        require 'page/' . $_GET['view'] . '.php';
    }
    ?>
</main>

<?php require "page/component/footer.php" ?>
