<?php
function getAllGenre(){
    $link = new PDO('mysql:host=localhost;dbname=pw22091','root','');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM genre ORDER BY name";

    $result = $link->query($query);

    return $result;

}

function addGenre($name){
    $link = new PDO('mysql:host=localhost;dbname=pw22091','root','');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO genre(name) VALUES(?)";

    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$name,PDO::PARAM_STR);
    if ($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }

    $link = null;
}