<?php include('include/header.php'); ?>

   <div class="row">
        <div class=" col-sm-12 col-md-12">
            <?php
            include('../inc/myconnect.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $error = array();
                if(empty($_POST['title'])) {
                    $error[]= 'title';
                } else {
                    $title = $_POST['title'];
                }
                if(empty($_POST['link'])) {
                    $error[]= 'link';
                } else {
                    $link = $_POST['link'];
                }
                if(empty($_POST['ordernum'])) {
                    $ordernum = 0;
                } else {
                    $ordernum = $_POST['ordernum'];
                }
                $status = $_POST['status'];
                if(empty($error)) {
                    db_connect();
                    $query = "INSERT INTO tblvideo (title, link, ordernum, status) VALUES ('{$title}', '{$link}', $ordernum , $status)";
                    $result = mysqli_query($conn, $query) or die ('cannot insert into database' .mysqli_error($conn));
                    if (mysqli_affected_rows($conn) == 1) {
                        $message = "<p class='success'>them moi thanh cong</p>";
// header('location: thietkeweb/admin/list_video.php');
                    } else {
                        $message = "<p class='required'>them moi khong thanh cong </p>";
                    }
                    $_POST['title'] = '';
                    $_POST['link'] = '';
                    $_POST['ordernum'] = '';


                } else {
                    $message = '<h4 class="required">ban hay nhap day du thong tin yeu cau .</h4>';
                }

            }

            ?>

            <form action="" method="POST" name="frmadd_video">
                <?php if(isset($message)) {
                    echo $message;
                } ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title'];} ?>" class="form-control" placeholder="title">
                    <?php if(isset($error) && in_array('title', $error)) {
                        echo "<p class='required'>title is empty</p>";
                    } ?>
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" value="<?php if (isset($_POST['link'])) { echo $_POST['link'];} ?>" class="form-control" placeholder="video">
                    <?php if(isset($error) && in_array('link', $error)) {
                        echo "<p class='required'>title is empty</p>";
                    } ?>
                </div>
                <div class="form-group">
                    <label>Thu tu</label>
                    <input type="text" name="ordernum" value="<?php if (isset($_POST['ordernum'])) { echo $_POST['ordernum'];} ?>" class="form-control" placeholder="num">
                    <?php if(isset($error) && in_array('', $error)) {
                        echo "<p class='required'>thứ tự không đựơc để trống:</p>";
                    } ?>
                </div>
                <div class="form-group">
                    <label style="display: block;">status</label>
                    <label class="radio-inline"> <input checked="checked" type="radio" name="status" value="1">Hien thi</label>
                    <label class="radio-inline"> <input type="radio" name="status" value="0">Khong hien thi</label>
                </div>
                <input type="submit" value="Add" class="btn btn-success">
            </form>
        </div>
   </div>


<?php include('include/footer.php'); ?>
