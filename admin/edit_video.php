<?php ob_start(); ?>
<?php include('include/header.php'); ?>

<div class="row">
    <div class=" col-sm-12 col-md-12">
        <?php
        include('../inc/myconnect.php');
        include('../inc/function.php');
        //lấy một phần tử có id băng $id;

        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
            $id = $_GET['id'];
        } else {
            header('location: list_video.php');
            exit();
        }
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $link = $_POST['link'];
            $ordernum = $_POST['ordernum'];
            $status = $_POST['status'];
            $update = db_execute("UPDATE tblvideo SET title='$title',link='$link',ordernum='$ordernum',status='$status' WHERE id={$id}");
            if($update){
                echo "Cập nhật thành công";
                header("location: list_video.php");
            }else {
                echo "Cập nhật thất bại";
            }
        }
        $query_id = db_select_row("SELECT * FROM tblvideo WHERE id = {$id}");
        ?>

        <form action="" method="POST" name="frmadd_video">
            <?php if(isset($message)) {
                echo $message;
            } ?>
            <h3>Edit video :<?php if(isset($query_id['title'])) { echo $query_id['title']." id = " .$query_id['id']; }?></h3>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $query_id['title'] ;?>" class="form-control" placeholder="title">
                <?php if(isset($error) && in_array('title', $error)) {
                    echo "<p class='required'>title is empty</p>";
                } ?>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" value="<?php echo $query_id['link'] ;?>" class="form-control" placeholder="video">
            </div>
            <div class="form-group">
                <label>Thu tu</label>
                <input type="number" name="ordernum" value="<?php echo $query_id['ordernum'] ;?>" class="form-control" placeholder="num">
            </div>
            <div class="form-group">
                <label style="display: block;">status</label>
                    <?php if (isset($status) == 1) { ?>
                <label class="radio-inline"> <input checked="checked" type="radio" name="status" value="1">Hien thi</label>
                <label class="radio-inline"> <input type="radio" name="status" value="0">Khong hien thi</label>
                <?php } else { ?>
                        <label class="radio-inline"> <input type="radio" name="status" value="1">Hien thi</label>
                        <label class="radio-inline"> <input checked="checked" type="radio" name="status" value="0">Khong hien thi</label>
                   <?php } ?>
            </div>
            <input type="submit" name="submit" value="Edit" class="btn btn-success">
        </form>
    </div>
</div>


<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>