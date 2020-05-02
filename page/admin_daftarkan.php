<?php

include "page/component/auth_validator/admin_validator.php";

$result = false;
if (isset($_POST['btn-submit']) && $_POST['email'] != '' && $_POST['password'] != ''){
    require_once "class/controller/UserController.php";
    require_once "class/model/User.php";

    $user = new User();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));

    $userCt = new UserController();
    $result = $userCt->insert($user);
}

if ($result):

$getParam = "&p=" . md5($_POST['password']) . "&e=" . md5($_POST['email']);
$link = "?view=pegawai_regis{$getParam}";

?>
<div class="row">
    <div class="col-xs-0 col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <div class="alert alert-success" style="overflow-x: auto">
            <b>Berhasil!</b> Pendaftaran user baru berhasil.<br><br>
            Silakan share link berikut: <a href="<?php echo 'index.php'.$link ?>">
                <i><?php echo $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].$link ?></i><br><br>
            </a>
            Atau beri tahu email dan password pada penerima.
        </div>
    </div>
    <div class="col-xs-0 col-md-2"></div>
</div>
<?php elseif (isset($_POST['btn-submit']) && !$result) : ?>
<div class="row">
    <div class="col-xs-0 col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <div class="alert alert-danger" style="overflow-x: auto">
            <b>Gagal!</b> Pendaftaran user baru tidak berhasil.
        </div>
    </div>
    <div class="col-xs-0 col-md-2"></div>
</div>
<?php endif ?>


<div class="row">
    <div class="col-lg-4 col-md-2"></div>
    <div class="col-lg-4 col-md-8 col-sm-12 text-center bg-light rounded p-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Daftarkan Administrator/Penindak Lanjut</h2>
            </div>
            <div class="panel-body">
                <form method="post" action="index.php?view=admin_daftarkan">
                    <div class="form-group">
                        <label for="user">Email:</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-2"></div>
</div>
