<?php
include('../inc/myconnect.php');
include('../inc/function.php');
?>
<?php
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $id = $_GET['id'];
    //$query = "DELETE FROM tblslider WHERE id={$id}";
    //$result = mysqli_query($conn, $query);
    //delete picture from upload folder;
    $anh_row = db_select_row("SELECT anh FROM tblslider WHERE id={$id}");
    $query_a = mysqli_query($conn, $anh_row);
    $anhinfo = mysqli_fetch_assoc($query_a);//lay ban ghi trong muc anh
    unlink('../upload/'.$anhinfo['anh']);//xoa anh theo duong dan den upload folder;

    //xoa du lieu anh tu database;
    $kq = db_execute("DELETE FROM tblslider WHERE id={$id}");
    $result = mysqli_query($conn, $kq);
    //kt_query($result, $query);
    header('location: list_picture.php');
} else {
    header('location: list_picture.php');
}


?>