<?php
  include "./03_conn.php";

  $sql = "
    SELECT `username` ,`password` FROM `tb1`
    WHERE`tb1`.`age` > 18 AND `tb1`.`gender` = 'male'
  ";

  $ret = $conn->query($sql);
  if($ret){
    if($ret->num_rows>0){
      $row = $ret->fetch_assoc();
      while($row !=null){
        echo $row['username'].'<br>';
        echo $row['password'].'<br>';
        $row = $ret->fetch_assoc();
      }
    }
  }



  $conn->close();