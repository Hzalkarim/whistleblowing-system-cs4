<?php
require_once "../class/wb_model.php";
require_once "../class/wb_controller.php";
require_once "../class/model/User.php";
require_once "../class/controller/UserController.php";
// require_once "class/model/Mahasiswa.php";
// require_once "class/controller/MahasiswaController.php";

$user = new User();
$user->setAllValues($_POST);
$user->setPassword(md5($_POST['password']));
$user->setUserId($_POST['nama'] . "-ID");
$user->setRole("Mahasiswa");

$userCt = new UserController();
if ($userCt->insert($user)){
    setcookie('user_nama', $user->getNama(), 0, "/");
    setcookie('user_id', $user->getUserId(), 0, "/");
} else {
    echo '<script>alert("Gagal")</script>';
}

header("Location: ../index.php");

?>
