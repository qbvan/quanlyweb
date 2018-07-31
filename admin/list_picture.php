<?php include('include/header.php');?>
<?php include('../inc/myconnect.php'); ?>
    <div class="col-sm-12 col-md-12">
        <h3>LIST PICTURES</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>anh</th>
                    <th>link</th>
                    <th>thu tu</th>
                    <th>trang thai</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    //đặt số bản ghi hiển thị
                 $limit = 3; //số bản ghi trên một trang ;
                 if(isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' =>1))) {
                     $start = $_GET['s'];
                 } else {
                     $start = 0;
                 }
                 if(isset($_GET['p']) && filter_var($_GET['p'], FILTER_VALIDATE_INT, array('min_range' =>1))) {
                     $per_page = $_GET['p'];
                 } else {
                     $query_p = db_select_list("SELECT COUNT(id) FROM tblslider");
                     list($record) = mysqli_fetch_array($query_p,  MYSQLI_NUM);
                     //tim so trang bang cach chia so du lieu ban ghi cho limit ;
                     if($record > $limit) {
                         $per_page = ceil($record/$limit);
                     } else {
                         $per_page = 1;
                     }
                 }
                     $data = db_select_list("SELECT id, anh, title, link, ordernum, status FROM tblslider ORDER BY id ASC LIMIT {$start}, {$limit}");
                     foreach($data as $item) {
                 ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['title']; ?></td>
                            <td><img width="80px" src="../upload/<?php echo $item['anh']; ?>"></td>
                            <td><?php echo $item['link']; ?></td>
                            <td><?php echo $item['ordernum']; ?></td>
                            <td><?php echo $item['status']; ?></td>
                            <td><a href="edit_picture.php?id=<?php echo $item['id'];?>" class="btn btn-info">edit</a></td>
                            <td><a href="delete_picture.php?id=<?php echo $item['id'];?>" onclick="return confirm('Do you want delete it ?')" class="btn btn-danger" >delete</a></td>

                        </tr>

                <?php } ?>
            </tbody>
        </table>
        <?php
            echo "<ul class='pagination'>";
            if($per_page > 1 ) {
                $current_page = ($start/$limit) + 1;
                //k phải là trang đầu thì hiển thi trang trước nos;
                if($current_page != 1) {
                    echo "<li><a href='list_picture.php?s=".($start - $limit)."&p={$per_page}'>back</a></li>";
                }
                for($i=1; $i <= $per_page; $i++ ){
                    if ($i != $current_page) {
                        echo "<li><a href='list_picture.php?s=".($limit *($i - 1))."&p={$per_page}'>{$i}</a></li>";
                    }
                    else {
                        echo "<li class='active'><a href=''>{$i}</a></li>"  ;
                    }
                }
                //nếu không phải là trang cuối thi hiển thị ra nút next. trang cuối thì hiển thị next
                if($current_page != $per_page) {
                    echo "<li><a href='list_picture.php?s=".($start + $limit)."&p={$per_page}'>next</a></li>";
                }

            }
            echo "</ul>"
        ?>
    </div>



<?php include('include/footer.php');?>
