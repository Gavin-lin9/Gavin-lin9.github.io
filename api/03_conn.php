<?php
    $server_name = 'localhost';
    $dbms_username = 'root1';
    $dbms_password = 'xx7488366';
    $db_name = 'db1';

    $conn = new mysqli($server_name, $dbms_username, $dbms_password, $db_name);
    if($conn->connect_error) {
        echo "连接失败。";
        return;
    }