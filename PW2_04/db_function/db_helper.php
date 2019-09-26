<?php

function createMySQLConnection(){
    $link = new PDO('mysql:host=localhost;dbname=pw22091','root','');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

    return $link;

}