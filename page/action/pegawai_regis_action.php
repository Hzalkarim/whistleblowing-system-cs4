<?php

if (isset($_POST['btn-submit'])) {

    require_once "../../class/wb_controller.php";
    require_once "../../class/wb_model.php";
    require_once "../../class/model/User.php";
    require_once "../../class/controller/UserController.php";
    require_once "../../class/model/PenindakLanjut.php";
    require_once "../../class/controller/PenindakLanjutController.php";

    // $user = new User();
    // $user->setEmail($_POST['email']);

    $userCt = new UserController();
    $c = "email = '{$_POST['email']}'";
    $findUser = $userCt->where($c)->selectOne();

    $findUser->setAllValues($_POST, true);
    $findUser->setPassword(md5($_POST['password']));

    // $user->setEmail(NULL);
    // $user->setId($findUser->getId());

    $userCt->update($findUser);

    if ($findUser->getRole() == "Penindak Lanjut"){
        $pLanjut = new PenindakLanjut();
        $pLanjut->setAllValues($_POST, true);
        $pLanjut->setUserId($findUser->getId());

        $pLanjutCt = new PenindakLanjutController();
        $pLanjutCt->insert($pLanjut);
    }

    date_default_timezone_set("Asia/Bangkok");
    setcookie('submit-berhasil', 'hasil', time() + 2, "/");
    setcookie('submit-pesan', 'Pendaftaran Akun '. $findUser->getRole() .' berhasil. Silakan Login.', time() + 2, "/");

    header("Location: ../../index.php?view=home");
}
