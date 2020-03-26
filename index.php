<?php

$pages = Array(
    'home' => 'Sistem Pengaduan Kampus',
    'pelapor' => 'Submit Pengaduan',
    'hasilPelapor' => 'Histori Pengaduan',
    'admin' => 'Daftar Pengaduan'
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
        foreach ($pages as $page => $p_title) {
            if ($_GET['view'] == $page){
                require 'page/' . $page . '.php';
                break;
            }
        }
    }
    ?>
</main>

<?php require "page/component/footer.php" ?>
