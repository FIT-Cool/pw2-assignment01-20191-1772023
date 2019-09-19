<?php
//Fetch Data  Function
$id = filter_input(INPUT_GET,'id');
if (isset($id)){
    $genre = getGenre($id);
}



//Update Function
$submitted = filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $name = filter_input(INPUT_POST,'txtName');
    updateGenre($genre['id'],$name);
    header("Location: ?menu=genre");
    exit;

}
?>
<form method="post">
    <p>UPDATE GENRE :</p>
    ID Genre :<input readonly type="text" name="txtID" value="<?php echo $genre['id']; ?>">
    Genre Name :<input type="text" name="txtName" value="<?php echo $genre['name']; ?>">
    <input name="btnSubmit" type="submit" value="Update Genre">
</form>
<br>




