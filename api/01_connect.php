<?php
$conn = new mysqli("localhost","root","xx7488366","db1");
if($conn->connect_errno){
  echo "connect false".$conn->connect_errno;
  return;
}

$conn->close();