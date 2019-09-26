<?php

function login($username,$password){
    $link = createMySQLConnection();
    $query = "SELECT id, username, name FROM user WHERE username=? AND password=MD5(?)";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$username,PDO::PARAM_STR);
    $stmt->bindParam(2,$password,PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $link=null;
    return $result;
}