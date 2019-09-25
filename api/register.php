<?php
    // echo "注册成功";
    //从请求中取得用户名和密码
    $user = $_POST['username'];
    $pw = $_POST['password'];

    include "./03_conn.php";
    //  1. 检查用户名是否存在
    $sql = "
        SELECT `id` FROM `tb1`
        WHERE `tb1`.`username`='$user'
    ";

    $ret = $conn->query($sql);
    if($ret->num_rows > 0) {
        // 用户名存在
        echo "用户名已经存在";
    } else {
        //  2. 如果不存在，则将该用户名和密码插入到表中
        $sql = "
            INSERT INTO `tb1`
            (`id`, `username`, `password`, `tel`, `age`, `gender`)
            VALUES
            (NULL, '$user', '$pw', '13333333333', '18', 'female')
        ";
        $ret = $conn->query($sql);
        if($ret) {
            //注册成功
            // echo "注册成功";
            header("Location: http://localhost/site1/html/login.html");
        } else {
            //注册失败
            echo "注册失败";
        }
    }