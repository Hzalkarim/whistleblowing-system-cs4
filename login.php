<?php
$page_title = "Halaman Login";
require "page/component/header.php";
?>

<?php echo KABAR_SAYA; ?>
<main class="container">
    <div class="row mt-5">
        <div class="col-lg-4 col-md-2"></div>
        <div class="col-lg-4 col-md-8 col-sm-12 text-center bg-light rounded p-4">
            <form method="post" action="index.php">
                <div class="form-group">
                    <label for="user">User Name:</label>
                    <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-lg-4 col-md-2"></div>
    </div>
</main>

<?php require "page/component/footer.php" ?>
