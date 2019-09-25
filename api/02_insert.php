<?php
  $server_name = "localhost";
  $dbms_username = "root";
  $dbms_password ="xx7488366";
  $dbms_name = "db1";

  $conn= new mysqli($server_name,$dbms_username,$dbms_password,$dbms_name);

  if($conn->connect_error){
    echo "false!!!!!" . $conn->connect_error;
    return;
  }
  //添加数据
  $password = '43242423';
  $password = md5($password);
  $sql = "
  INSERT INTO `tb1`
  (`id`,`username`,`password`,`tel`)
  VALUES
  (null,'phgap132','$password',13999999999)";
  // INSERT INTO `tb1`(`id`, `username`, `password`, `tel`) VALUES (null,'phgap132',123123,13456789999)

  $ret = $conn->query($sql);
  if($ret){
    echo "done!!!!!!!!!";

  } else{
    echo "cuo la!!!!!";
  }


  $conn->close();