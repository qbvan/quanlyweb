<?php session_start(); //trươcs khi làm việc với session thì việc khai báo session là cần  ?>

    <?php include('include/header.php'); ?>
    <?php include ('../inc/myconnect.php'); ?>

    <div class="container-fluid">
        <!-- Breadcrumbs-->
<!--        <ol class="breadcrumb">-->
<!--            <li class="breadcrumb-item">-->
<!--                <a href="index.html">Dashboard</a>-->
<!--            </li>-->
<!--            <li class="breadcrumb-item active">Blank Page</li>-->
<!--            -->
<!--        </ol>-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?php if (isset($_SESSION['hoten'])) {
                    echo "welcome :" .$_SESSION['hoten']. "tro lai trang chu";
                } ?>
                <div class=""><h3>Trang chủ của <?php echo $_SESSION['hoten'];?></h3></div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php  include('include/footer.php'); ?>
