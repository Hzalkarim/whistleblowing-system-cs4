<div class="row">
    <div class="col-lg-4 col-md-2"></div>
    <div class="col-lg-4 col-md-8 col-sm-12 text-center bg-light rounded p-4">
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
    <div class="col-lg-4 col-md-2"></div>
</div>

<?php

if (isset($_POST['btn-submit']) && $_POST['email'] != '' && $_POST['password'] != ''){
    $getParam = "&p=" . md5($_POST['password']) . "&e=" . md5($_POST['email']);
    $link = "index.php?view=pegawai_regis{$getParam}";

    echo $link;
}

?>
