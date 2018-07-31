
    <?php
    include ('../inc/myconnect.php');
    if (isset($_SESSION['hoten'])) {
        echo "<script>alert('ban da co tai khoan'); location.href='index.php'</script>";
    }



        $name = $email = $password = '';
         if(isset($_POST['submit'])) {
//             $name = $_POST['name'];
//             $email = $_POST['email'];
//             $password = $_POST['password'];
             $error = array();
             if(empty($_POST['name'])) {
                 $error[] = 'name';
             } else {
                 $name = $_POST['name'];
             }
             if (empty($_POST['email'])) {
                 $error[] = 'email';
             }
             else {
                 $kq = db_select_list("SELECT * FROM tbluser WHERE email = '".$email."' ");
                 if ($kq != null) {
                     $error['email'] = 'email already exist';
                 } else {
                     $email = $_POST['email'];
                 }
             }
             if (empty($_POST['password'])) {
                 $error[] = 'password';
             } else {
                 $password= md5($_POST['password']);
             }
             if (empty($error)) {
                 $query = db_execute("INSERT INTO tbluser (hoten, email, matkhau) VALUES ('".$name."', '".$email."', '".$password."')");
                    //'".$name."', '".$email."', '".$password."'
//                 $result = mysqli_query($conn, $query);
                 	
                 if ($query != 0) {
                    $_SESSION['success'] = 'Đăng ký thành công nhưng đếu chuyển ';
                     header("location: login.php");
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
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form method="POST">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <strong>Success</strong><?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input  name="name" class="form-control" type="text" value="<?php echo $name; ?>">
                            <?php if (isset($error) && in_array('name', $error))
                                echo "<p style='color: red;'>name is empty;</p>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input name="email" class="form-control" type="text" value="<?php echo $email; ?>">
                    <?php if (isset($error) && in_array('email', $error))
                        echo "<p style='color: red;'>email is empty;</p>";
                    ?>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label >Password</label>
                            <input name="password" class="form-control"  type="password">
                            <?php if (isset($error) && in_array('password', $error))
                                echo "<p style='color: red;'>password is empty;</p>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <input class="btn btn-primary" type="submit" name="submit" value="Register">
                </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="login.php">Login Page</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
