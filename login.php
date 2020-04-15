<?php
$page_title = "Halaman Login";
require "page/component/header.php";
?>

<main class="container mt-5">
    <div class="row">
        <div class="col-lg-4 col-md-2"></div>
        <div class="col-lg-4 col-md-8 col-sm-12 text-center bg-light rounded p-4">
            <form method="post" action="login.php">
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
        <div class="col-lg-4 col-md-2"></div>
    </div>
</main>

<?php

if (isset($_POST['btn-submit'])) {

    require_once "class/wb_controller.php";
    require_once "class/controller/UserController.php";
    require_once "class/model/User.php";

    $user = new User();
    $userCt = new UserController();

    $user->setEmail($_POST['email']);

    $user = $userCt->where($user)->select();

    if (!is_null($user) && $user->getPassword() == md5($_POST['password'])){
        setcookie('user_nama', $user->getNama());
        setcookie('user_id', $user->getUserId());
        header("Location: index.php");
    } else {
        echo '<script>alert("Email atau Password salah")</script>';
    }

}

?>

<?php require "page/component/footer.php" ?>
