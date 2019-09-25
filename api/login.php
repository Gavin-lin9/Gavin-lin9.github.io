<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "./03_conn.php";

    $password = ($password);
    
    $sql = "
        SELECT `id` FROM `tb1`
        WHERE `tb1`.`username`='$username' AND `tb1`.`password`='$password'
    ";
    $ret = $conn->query($sql) ;

    if($ret->num_rows>0){
      $userid = $ret->fetch_assoc()["id"];
      header("set-cookie:userid=$userid;path=/");
      echo"{\"result\":ture}";
    }else{
      echo"{\"result\":false}";
    }

?>