<?php

$page_title = "Sistem Pengaduan Dari Kami";
include "page/component/header.php"
?>

<main>
    <div class="container">
        <?php

        if (!isset($_GET['view'])) $_GET['view'] = 'home';
        switch ($_GET['view']){
            case 'home':
                require "page/home.php";
                break;
            case 'pelapor':
                require "page/pelapor.php";
                break;
            case 'hasilPelapor':
                require "page/hasilPelapor.php";
                break;
            case 'admin':
                require "page/admin.php";
                break;
            default:
                echo '<div class="display-1">404 Not Found</div>';
        }

        ?>
    </div>
</main>

<?php include "page/component/footer.php" ?>
