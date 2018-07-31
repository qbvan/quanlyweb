<?php
    include('../inc/myconnect.php');
    include('../inc/function.php');
?>
<?php
    if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $id = $_GET['id'];
        $vd = db_execute("DELETE FROM tblvideo WHERE id={$id}");
        $result = mysqli_query($conn, $vd);
        header('location: list_video.php');
    } else {
        header('location: list_video.php');
    }


?>