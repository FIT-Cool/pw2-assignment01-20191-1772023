<?php
$submitted = filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $isbn = filter_input(INPUT_POST,'txtISBN');
    $title = filter_input(INPUT_POST,'txtTitle');
    $author = filter_input(INPUT_POST,'txtAuthor');
    $pub = filter_input(INPUT_POST,'txtPub');
    $pubdate = filter_input(INPUT_POST,'txtPubDate');
    $cover = filter_input(INPUT_POST,'txtCover');
    $synopsis = filter_input(INPUT_POST,'txtSynopsis');
    $genreId = filter_input(INPUT_POST,'txtGenreID');
    addBook($isbn,$title,$author,$pub,$pubdate,$cover,$synopsis,$genreId);
}
?>
<table id="insertBook" class="display">
    <form method="post">
        <p>INSERT NEW BOOK :</p>
        ISBN :<input type="text" name="txtISBN" id="name"><br>
        Title :<input type="text" name="txtTitle" id="name"><br>
        Author :<input type="text" name="txtAuthor" id="name"><br>
        Publisher :<input type="text" name="txtPub" id="name"><br>
        Publish Date :<input type="date" name="txtPubDate" id="name"><br>
        Cover :<input type="text" name="txtCover" id="name"><br>
        Synopsis :<input type="text" name="txtSynopsis" id="name"><br>
        Genre :
        <?php
        $genres = getAllGenre();
        echo '<select name="txtGenreID">';
        foreach ($genres as $genre) {
            echo '  <option ';
            echo ' value="'.($genre['id']).'">'.($genre['name']);
            echo '</option>';
        }
        echo '<select>';

        ?><br>
        <input name="btnSubmit" type="submit" value="submit">
    </form>
</table>
<br> <br> <br>
<table id="book" class="display">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Publisher Date</th>
            <th>Cover</th>
            <th>Sypnosis</th>
            <th>Genre</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $books = getAllBook();
            foreach ($books as $book) {
                $tgl = date_create($book['publish_date']);
                echo '<tr>';
                echo '<td>' . $book['isbn'] . '</td>';
                echo '<td>' . $book['title'] . '</td>';
                echo '<td>' . $book['author'] . '</td>';
                echo '<td>' . $book['publisher'] . '</td>';
                echo '<td>' . date_format($tgl,'d M Y ').'</td>';
                echo '<td>' . $book['cover'] . '</td>';
                echo '<td>' . $book['synopsis'] . '</td>';
                echo '<td>' . $book['genre'] . '</td>';
                echo '</tr>';
            }

        ?>
    </tbody>
</table>
