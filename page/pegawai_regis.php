<?php

if (!isset($_GET['user_id']) && isset($_GET['p']) && isset($_GET['e'])){
    require_once "class/wb_controller.php";
    require_once "class/wb_model.php";
    require_once "class/controller/UserController.php";
    require_once "class/model/User.php";

    $user = new User();
    $userCt = new UserController();

    $user->setRole('NULL');
    $user = $userCt->where($user)->select();

    $selectUser = NULL;
    foreach ($user as $u){
        if ($u->getPassword() == $_GET['p']){
            $selectUser = $u;
            break;
        }
    }

    if (is_null($selectUser)) header("Location: index.php");
} else {
    header("Location: index.php");
}
?>

<div class="row">
    <div class="col-sm-0 col-md-2 col-lg-3"></div>
    <div class="col-sm-12 col-md-8 col-lg-6 bg-light mt-5">
        <div class="text-center my-4">
            <h4>Form Pendaftaran Pegawai</h4>
        </div>
        <form class="safe-open" method="post" action="page/action/pegawai_regis_action.php">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $selectUser->getEmail() ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Ubah password...">
            </div>
            <div class="form-group my-3">
                <label class="mr-5" for="jenis-kel">Jenis Kelamin</label>
                <div class="form-check-inline">
                    <label for="pria">
                        <input type="radio" name="gender" value="L" checked> Laki - Laki
                    </label>
                </div>
                <div class="form-check-inline">
                    <label for="wanita">
                        <input type="radio" name="gender" value="P"> Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Tinggal</label>
                <textarea name="alamat" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="no-telp">Nomor Telepon</label>
                <input type="number" name="no_telp" class="form-control">
            </div>
            <div class="form-group my-3">
                <label class="mr-5" for="role">Peran</label>
                <div class="form-check-inline">
                    <label for="Administrator">
                        <input type="radio" id="admin" name="role" value="Administrator" checked> Administrator
                    </label>
                </div>
                <div class="form-check-inline">
                    <label for="Penindak Lanjut">
                        <input type="radio" id="p-lanjut" name="role" value="Penindak Lanjut"> Penindak Lanjut
                    </label>
                </div>
            </div>
            <div class="form-group p-lanjut-field collapse">
                <label for="id_pegawai">ID Pegawai</label>
                <input type="text" name="id_pegawai" class="form-control">
            </div>
            <div class="form-group p-lanjut-field collapse">
                <label for="bidang">Bidang</label>
                <input type="text" name="bidang" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mb-4" name="btn-submit">Registrasi</button>
            <button type="reset" class="btn btn-danger mb-4">Hapus</button>
        </form>
    </div>
    <div class="col-sm-0 col-md-2 col-lg-3"></div>
</div>
