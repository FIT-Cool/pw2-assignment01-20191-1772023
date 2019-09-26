<?php
function getAllBook(){
    $link = createMySQLConnection();

    $query = "SELECT isbn,title,author,publisher,publish_date,cover,synopsis, genre.name as 'genre', id
              FROM pw22091.book JOIN genre ON book.genre_id=id; ";

    $result = $link->query($query);

    return $result;

}

function addBook($isbn,$title,$author,$publisher,$publisher_date,$cover,$synopsis,$genre_id){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = "INSERT INTO book(isbn,title,author,publisher,publish_date,
                cover,synopsis,genre_id) VALUES(?,?,?,?,?,?,?,?)";

    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$isbn,PDO::PARAM_STR);
    $stmt->bindParam(2,$title,PDO::PARAM_STR);
    $stmt->bindParam(3,$author,PDO::PARAM_STR);
    $stmt->bindParam(4,$publisher,PDO::PARAM_STR);
    $stmt->bindParam(5,$publisher_date,PDO::PARAM_STR);
    $stmt->bindParam(6,$cover,PDO::PARAM_STR);
    $stmt->bindParam(7,$synopsis,PDO::PARAM_STR);
    $stmt->bindParam(8,$genre_id,PDO::PARAM_INT);
    if ($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }

    $link = null;
}
