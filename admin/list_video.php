tota<?php include('include/header.php');?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12">
            <h3>Danh sach video</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ma</th>
                        <th>title</th>
                        <th>link</th>
                        <th>thu tu</th>
                        <th>status</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //db_connect();
                        //db_select_list($query);
                        //$query = "SELECT id, title, link, ordernum, status FROM tblvideo";
                        //$result = mysqli_query($conn, $query);
                        //while($data = mysqli_fetch_assoc($result)) {
                        $data = db_select_list("SELECT id, title, link, ordernum, status FROM tblvideo");
                        foreach($data as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['title']; ?></td>
                        <td><?php echo $item['link']; ?></td>
                        <td><?php echo $item['ordernum']; ?></td>
                        <td><?php if($item['status'] == 1) {
                                echo "ON";
                            } else {
                                echo "OFF";
                            } ?>
                        </td>
                        <td><a href="edit_video.php?id=<?php echo $item['id'];  ?>" class="btn btn-info">edit</a></td>
                        <td><a onclick="confirm('ban co muon xoa muc nay khong')"; href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('include/footer.php');?>
