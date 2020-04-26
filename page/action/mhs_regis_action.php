<?php
require_once "../../class/wb_model.php";
require_once "../../class/wb_controller.php";
require_once "../../class/model/User.php";
require_once "../../class/controller/UserController.php";
require_once "../../class/model/Mahasiswa.php";
require_once "../../class/controller/MahasiswaController.php";

$user = new User();
$user->setAllValues($_POST);
$user->setPassword(md5($_POST['password']));
$user->setRole("Mahasiswa");

// $i = 0;
// do {
//     $user->setId(rand(1, 10000));
// } while (!$userCt->insert($user) && ++$i < 3);

$userCt = new UserController();
$result = $userCt->insert($user);

date_default_timezone_set("Asia/Bangkok");
if ($result) {
    $userEmail = new User();
    $userEmail->setEmail($user->getEmail());

    $user = $userCt->where($userEmail)->select();

    $mhs = new Mahasiswa();
    $mhs->setAllValues($_POST);
    $mhs->setUserId($user->getId());

    $mhsCt = new MahasiswaController();
    $mhsCt->insert($mhs);

    setcookie('user_nama', $user->getNama(), 0, "/");
    setcookie('user_id', $user->getId(), 0, "/");
    setcookie('user_role', $user->getRole(), 0, "/");

} else {
    echo '<script>alert("Gagal")</script>';
}


// if ($userCt->insert($user)){
//     setcookie('user_nama', $user->getNama(), 0, "/");
//     setcookie('user_id', $user->getUserId(), 0, "/");
// } else {
//     echo '<script>alert("Gagal")</script>';
// }

header("Location: ../index.php");

?>
