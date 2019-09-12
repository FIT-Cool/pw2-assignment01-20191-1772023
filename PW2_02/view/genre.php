<?php
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
        </tr>
    </thead>

    <tbody>
        <?php
            $genres = getAllGenre();
            foreach ($genres as $genre) {
                echo '<tr>';
                echo '<td>' . $genre['id'] . '</td>';
                echo '<td>' . $genre['name'] . '</td>';
                echo '</tr>';
            }

        ?>
    </tbody>
</table>

