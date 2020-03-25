<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <?php require "page/component/upper_bs.php" ?>

    <link rel="stylesheet" href="style/wbstyle.css">
    <title>Login</title>
</head>
<body>
    <?php require "page/component/header.php" ?>
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

    <?php require "page/component/lower_bs.php" ?>
    <script src="js/sidebar.js"></script>
</body>
</html>
