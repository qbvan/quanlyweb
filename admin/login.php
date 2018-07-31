<?php session_start(); ?>
<?php include ('../inc/myconnect.php');

            $name = $email = $password = '';
            if(isset($_POST['submit'])) {
            //             $name = $_POST['name'];
            //             $email = $_POST['email'];
            //             $password = $_POST['password'];
                $error = array();
                if (empty($_POST['email'])) {
                    $error[] = 'email';
                } else {
                    $email = $_POST['email'];
                }
                if (empty($_POST['password'])) {
                    $error[] = 'password';
                } else {
                    $password= md5($_POST['password']);
                }

                if(empty($error)) {
                    $kq = db_select_list("SELECT * FROM tbluser WHERE email = '".$email."' AND matkhau= '".$password."' ");
                    if ($kq != NULL) {
                        //$name = $kq['hoten'];
                        $_SESSION['hoten'] = $email;
                        $_SESSION['success'] = "đăng nhập thành công nhưng chưa chuyển trang";
                        header("location: index.php");
                    } else {
                        $_SESSION['failed'] = "đăng nhập thất bại và đéo hiểu tại sao không chuyển trang được";
                    }
                }

            }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label >Email address</label>
                    <input name="email" class="form-control" type="text" value="<?php echo $email; ?>">
                    <?php if (isset($error) && in_array('email', $error))
                        echo "<p style='color: red;'>email is empty;</p>";
                    ?>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input name="password" class="form-control"  type="password">
                    <?php if (isset($error) && in_array('password', $error))
                        echo "<p style='color: red;'>password is empty;</p>";
                    ?>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                         <input class="form-check-input" type="checkbox"> Remember Password</label>
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success">
                                <strong>Success: </strong> <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['failed'])) { ?>
                            <div class="alert alert-danger">
                                <strong>Failed: </strong> <?php echo $_SESSION['failed']; unset($_SESSION['failed']);?>
                            </div>
                        <?php } ?>
                        <?php var_dump($_SESSION['hoten']);?>
                    </div>
                </div>
                <div class="col-sm-10">
                    <input class="btn btn-primary" type="submit" name="submit" value="Log In">
                </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.php">Register an Account</a>
                <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
