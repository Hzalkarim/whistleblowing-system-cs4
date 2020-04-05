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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view=pelapor">Ajukan Pelaporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view=pegawai">Admin View</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php if (!isset($_POST['user'])):?>
                        <li class="nav-item">
                            <a class="dropdown-toggle nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Registrasi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?view=pegawai_regis">Pegawai</a>
                                <a class="dropdown-item" href="index.php?view=mhs_regis">Mahasiswa</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php else:?>
                        <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
                        <li class="navbar-text nav-item text-white ml-3"><b>Selamat datang, <?php echo $_POST['user']?></b></li>
                    <?php endif?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
