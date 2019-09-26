<?php
//Delete Function
$deleteCommand = filter_input(INPUT_GET,'delcom');
if(isset($deleteCommand) && ($deleteCommand == 1)){
    $id = filter_input(INPUT_GET,'id');
    deleteGenre($id);
}


//Insert Function
$submitted = filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $name = filter_input(INPUT_POST,'txtName');
    addGenre($name);
}
?>
<form method="post">
    <p>INSERT NEW GENRE :</p>
    Genre Name :<input type="text" name="txtName" id="name">
    <input name="btnSubmit" type="submit" value="submit">
</form>
<br>
<table id="genre" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $genres = getAllGenre();
            foreach ($genres as $genre) {
                echo '<tr>';
                echo '<td>' . $genre['id'] . '</td>';
                echo '<td>' . $genre['name'] . '</td>';
                echo '<td><button onclick="deleteGenre(' . $genre['id'] . ')">Delete</button></td>';
                echo '<td><button onclick="updateGenre(' . $genre['id'] . ')">Update</button></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>



