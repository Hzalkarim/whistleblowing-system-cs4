<?php

if (isset($_POST['btn-submit'])) {

    require_once "../../class/wb_controller.php";
    require_once "../../class/wb_model.php";
    require_once "../../class/model/User.php";
    require_once "../../class/controller/UserController.php";

    $user = new User();
    $user->setEmail($_POST['email']);

    $userCt = new UserController();
    $findUser = $userCt->where($user)->selectOne();
    echo "<pre>";
    print_r($findUser);

    $findUser->setAllValues($_POST);
    $findUser->setPassword(md5($_POST['password']));
    print_r($findUser->getAllValues());

    $user->setEmail(NULL);
    $user->setId($findUser->getId());

    $userCt->update($findUser);

    header("Location: ../../index.php?view=home");
}
