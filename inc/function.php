<?php
    //ket qua tra ve co dung hay khong
    function kt_query($result, $query) {
        if (!$result) {
            global $conn;//la bien toan cuc
            die("query {$query} <br> mysql_error : " .mysqli_error($conn));
        }
    }
    function db_close() {

    }
//cách kiểm tra email có hợp lệ hay không dùng hàm filter ,
//    if(filter_var(($_POST['email'],FILTER_VALIDATE_EMAIL) == TRUE) {
//        $email = mysqli_real_escape_string($conn, $_POST['email']);
//    }
?>