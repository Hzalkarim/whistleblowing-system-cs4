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
                            <a class="nav-link" href="index.php?view=admin">Admin View</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php if (!isset($_POST['user'])):?>
                        <li class="nav-item"><a class="nav-link" href="#">Sign Up</a></li>
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
