<?php
    //取得user
    $username = $_GET['username'];

    include "./03_conn.php";

    $sql = "
        SELECT `id` FROM `tb1`
        WHERE `tb1`.`username`='$username'
    ";

    $ret = $conn->query($sql);

    if($ret->num_rows > 0) {
        //用户名存在，不可用
        echo "不可用";
    } else {
        echo "可用";
    }
    $conn->close();

?>