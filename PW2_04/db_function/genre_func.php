<?php
function getAllGenre(){
    $link = createMySQLConnection();

    $query = "SELECT * FROM genre ORDER BY name";

    $result = $link->query($query);

    return $result;

}

function addGenre($name){
    $link = createMySQLConnection();
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

function deleteGenre($id){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = "DELETE FROM genre WHERE id=?";

    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$id,PDO::PARAM_INT);
    if ($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }

    $link = null;

}

function updateGenre($id,$name){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = "UPDATE genre SET name = ?  WHERE id=?";

    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$name,PDO::PARAM_STR);
    $stmt->bindParam(2,$id,PDO::PARAM_INT);
    if ($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }

    $link = null;

}

function getGenre($id){
    $link = createMySQLConnection();

    $query = "SELECT * FROM genre WHERE id = ? LIMIT 1";

    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$id,PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();

    $link=null;

    return $result;

}