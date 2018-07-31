<?php
include('include/header.php');
include('../inc/myconnect.php');
session_start();
?>
    <?php
        if(isset($_POST['submit'])) {
            $password = $_POST['password'];
            $newpass = $_POST['newpassword'];
            $query = db_select_list("SELECT email,matkhau FROM tbluser WHERE email = '".$email."' AND matkhau='".md5($password)."' ");
            if(mysqli_num_rows($query) == '') {
                $message = "<p class='success'>ton tai mat khau cu</p>";
            } else {
                $message = "<p class='required'>mat khau cu khong dung</p>";
            }
        }

    ?>


        <div class="col-md-12 col-sm-12">
             <h3>ĐỔI MẬT KHẨU</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $_SESSION['hoten']; ?>" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="">Password </label>
                    <input type="password" name="password" value="">

                    <?php if (isset($message)) { echo $message;} ?>
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" name="newpassword" value="">
                </div>
                <div class="form-group">
                    <label for="">Re New Password</label>
                    <input type="password" name="renewpassword" value="">
                </div>
                <input type="submit" name="submit" value="change password" class="btn btn-primary">

            </form>
        </div>


<?php include('include/footer.php'); ?>