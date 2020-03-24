<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page/component/upper_bs.php" ?>

    <title>Whistleblowing System</title>
    <link rel="stylesheet" href="style/wbstyle.css">
</head>
<body>

<?php include "page/component/header.php" ?>

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
<?php include "page/component/lower_bs.php" ?>

<script src="js/sidebar.js"></script>

</body>
</html>
