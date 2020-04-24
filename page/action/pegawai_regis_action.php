<?php

if (isset($_POST['btn-submit'])) {

    require_once "../../class/wb_controller.php";
    require_once "../../class/wb_model.php";
    require_once "../../class/model/User.php";
    require_once "../../class/controller/UserController.php";
    require_once "../../class/model/PenindakLanjut.php";
    require_once "../../class/controller/PenindakLanjutController.php";

    $user = new User();
    $user->setEmail($_POST['email']);

    $userCt = new UserController();
    $findUser = $userCt->where($user)->selectOne();

    $findUser->setAllValues($_POST);
    $findUser->setPassword(md5($_POST['password']));

    $user->setEmail(NULL);
    $user->setId($findUser->getId());

    $userCt->update($findUser);

    if ($findUser->getRole() == "Penindak Lanjut"){
        $pLanjut = new PenindakLanjut();
        $pLanjut->setAllValues($_POST);
        $pLanjut->setUserId($user->getId());

        $pLanjutCt = new PenindakLanjutController();
        $pLanjutCt->insert($pLanjut);
    }

    header("Location: ../../index.php?view=home");
}
