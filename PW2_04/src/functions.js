function deleteGenre(id) {
    var com = window.confirm("yakin Delete?")
    if (com){
        window.location = "index.php?menu=genre&delcom=1&id=" + id;
    }
}

function updateGenre(id) {
    window.location = "index.php?menu=genre_update&id=" + id;
}