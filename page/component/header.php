<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="style/wbstyle.css">
</head>
<body>

<header class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand navbar-dark">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php?view=home">Whistleblowing</a>
                    </div>
                    <ul class="nav navbar-nav mr-auto">
                    <?php if (isset($_COOKIE['user_role'])): ?>

                    <?php if (strtolower($_COOKIE['user_role']) == 'mahasiswa'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view=pelapor">Ajukan Pelaporan</a>
                        </li>
                    <?php elseif (strtolower($_COOKIE['user_role']) == 'administrator'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view=pegawai">Admin View</a>
                        </li>
                    <?php elseif (strtolower($_COOKIE['user_role']) == 'penindak lanjut'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view=pegawai">Laporan View</a>
                        </li>
                    <?php endif ?>

                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Ajukan Pelaporan</a>
                        </li>
                    <?php endif ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php if (!isset($_COOKIE['user_nama'])):?>
                        <li class="nav-item"><a class="nav-link" href="index.php?view=mhs_regis">Registrasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php else:?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <li class="navbar-text nav-item text-white ml-3"><b>Selamat datang, <?php echo "{$_COOKIE['user_nama']}:{$_COOKIE['user_id']}"?></b></li>
                    <?php endif?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
