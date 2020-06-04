<?php $page_title = "Halaman Login";

if (isset($_POST['btn-submit']) && isset($_POST['email']) && isset($_POST['password'])) {

    require_once "class/wb_controller.php";
    require_once "class/wb_model.php";
    require_once "class/controller/UserController.php";
    require_once "class/model/User.php";

    $userCt = new UserController();
    $user = $userCt->where("email = '".$_POST['email']."'")->selectOne();

    // echo implode(", ", $user->getValues()) . md5($_POST['password']);die;
    if (!is_null($user) && !is_null($user->getRole()) && password_verify($_POST['password'], $user->getPassword())){
        session_start();
        $_SESSION['user_nama'] = $user->getNama();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_role'] = $user->getRole();

        // setcookie('user_nama', $user->getNama(), 0, "/");
        // setcookie('user_id', $user->getId(), 0, "/");
        // setcookie('user_role', $user->getRole(), 0, "/");
        header("Location: index.php");
    } elseif (!is_null($user) && is_null($user->getRole()) && password_verify($_POST['password'], $user->getPassword())){
        $getParam = "&p=" . md5($user->getPassword()) . "&e=" . md5($user->getEmail());
        header("Location: index.php?view=pegawai_regis{$getParam}");
    } else {
        echo '<script>alert("Email atau Password salah")</script>';
    }

}

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
<?php require "page/component/footer.php" ?>
