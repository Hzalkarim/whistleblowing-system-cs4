<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="style/wbstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?view=home">Whistleblowing</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav mr-auto">
                    <?php if (isset($_COOKIE['user_role'])): ?>

                        <?php if (strtolower($_COOKIE['user_role']) == 'mahasiswa'): ?>
                            <li class="nav-item">
                                <a href="index.php?view=pelapor">Ajukan Pelaporan</a>
                            </li>
                        <?php elseif (strtolower($_COOKIE['user_role']) == 'administrator'): ?>
                            <li class="nav-item">
                                <a href="index.php?view=pegawai">Admin View</a>
                            </li>
                        <?php elseif (strtolower($_COOKIE['user_role']) == 'penindak lanjut'): ?>
                            <li class="nav-item">
                                <a href="index.php?view=pegawai">Laporan View</a>
                            </li>
                        <?php endif ?>

                    <?php else: ?>
                        <li>
                            <a class="nav-link" href="login.php">Ajukan Pelaporan</a>
                        </li>
                    <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!isset($_COOKIE['user_nama'])):?>
                        <li class="nav-item"><a href="index.php?view=mhs_regis">Registrasi</a></li>
                        <li class="nav-item"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php else:?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                                <b>Selamat datang, <?php echo "{$_COOKIE['user_nama']}:{$_COOKIE['user_id']}"?></b>
                            </a>
                        </li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </nav>

</header>
