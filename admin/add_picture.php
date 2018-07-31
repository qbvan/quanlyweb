<?php include('include/header.php'); ?>
    <div class="row">
        <div class=" col-sm-12 col-md-12">
      <?php
            include('../inc/myconnect.php');
            if(isset($_POST['submit'])) {
                //the path to store the upload file;
                $target = "../upload/".basename($_FILES['profile']['name']);
                $title = $_POST['title'];
                $image = $_FILES['profile']['name'];
                $link = $_POST['link'];
                $ordernum = $_POST['ordernum'];
                $status = $_POST['status'];
                $query = db_execute("INSERT INTO tblslider (title, anh, link, ordernum, status) VALUES ('{$title}', '{$image}' , '{$link}', $ordernum, $status)");
//                $result = mysqli_query($conn, $query);
                if(move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
                    $message = "<p class='success'>them anh thanh cong</p>";
                    header("location: list_picture.php");
                }else {
                    $message = "<p class='required'>them anh that bai</p>";
                }
            }

            ?>

            <form action="" method="POST" name="frmadd_video" enctype="multipart/form-data">
                <?php if(isset($message)) {
                    echo $message;
                } ?>
                <h4>Thêm ảnh cho blog:</h4>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title'];} ?>" class="form-control" placeholder="title">
                    <?php if(isset($error) && in_array('title', $error)) {
                        echo "<p class='required'>title is empty</p>";
                    } ?>
                </div>
                <div class="form-group">
                    <label>Profiles</label> <br>
                    <input type="file" name="profile" value="">

                </div>


                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" value="<?php if (isset($_POST['link'])) { echo $_POST['link'];} ?>" class="form-control" placeholder="link pic">
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
                <input type="submit" name="submit" value="Add picture" class="btn btn-success">
            </form>
        </div>
    </div>


<?php include('include/footer.php'); ?>