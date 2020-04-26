<?php
require_once "../../class/wb_model.php";
require_once "../../class/wb_controller.php";
require_once "../../class/model/User.php";
require_once "../../class/controller/UserController.php";
require_once "../../class/model/Mahasiswa.php";
require_once "../../class/controller/MahasiswaController.php";

$_POST['alamat'] = $_POST['alamat'] == '' ? 'NULL' : $_POST['alamat'];
$_POST['no_telp'] = $_POST['no_telp'] == '' ? 'NULL' : $_POST['no_telp'];

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

    $user = $userCt->where($userEmail)->selectOne();

    $mhs = new Mahasiswa();
    $mhs->setAllValues($_POST);
    $mhs->setUserId($user->getId());

    $mhsCt = new MahasiswaController();
    $mhsCt->insert($mhs);

    // setcookie('user_nama', $user->getNama(), 0, "/");
    // setcookie('user_id', $user->getId(), 0, "/");
    // setcookie('user_role', $user->getRole(), 0, "/");

    setcookie('submit-berhasil', 'hasil', time() + 2, "/");
    setcookie('submit-pesan', 'Pendaftaran Akun Mahasiswa berhasil. Silakan Login.', time() + 2, "/");


} else {
    setcookie('submit-gagal', 'gagal', time()+2, "/");
    setcookie('submit-pesan', 'Pendaftaran Akun Mahasiswa gagal.', time() + 2, "/");
}

header("Location: ../../index.php?view=home");

?>
