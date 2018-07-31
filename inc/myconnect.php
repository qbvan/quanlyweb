<?php
    //ket noi csdl
    $conn = null;
    function db_connect() {
        global $conn;
        $conn = mysqli_connect('localhost', 'root', 'root', 'thietkeweb');
        if(!$conn) {
            echo "connect failed: " .mysqli_error($conn);
        } else {
            mysqli_set_charset($conn, 'utf-8');
        }
    }

    function db_select_list($query) {
        db_connect();
        global $conn;
        $data = array();
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function db_select_row($sql) {
        db_connect();
        global $conn;
        $result = mysqli_query($conn, $sql);
        $row = array();
        if (mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_assoc($result);
        }
        return $row;
    }

    //function thuc hien cac chuc nang edit, update, delete;
    function db_execute($sql) {
        db_connect();
        global $conn;
        return mysqli_query($conn, $sql);
    }


?>