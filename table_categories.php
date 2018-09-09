<?php

session_start();

if ($_SESSION['access'] == 1) {
    
    $bands_titles = array(
        "ID",
        "Name",
        "Info",
        "Youtube",
        "Spotify",
        "All info",
        "Image1",
        "Image2",
        "Day"
    );
    
    $categories_titles = array(
        "ID",
        "Image",
        "Date",
        "Name",
        "Map",
        "Title",
        "Link"
    );
    
    $askForBands = 'bands_titles';
    $askForCateg = 'bands_titles';
    
    $db     = 'id6847947_vilniusdata';
    $table1 = 'bands';
    $table2 = 'category';
    
    include('selection.php');
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style></style>
</head>
<body>
  <!--selection links-->
    <?php
    echo $bands = '<a href="' . categoryLink($db, $table1, $bands_titles, 'management_info.php') . '">Bands</a></br>';
    echo $categories = '<a href="' . categoryLink($db, $table2, $categories_titles, 'management_info.php') . '">Categories</a>';
?>
   </br>    <a href="index.php">Get back to the page</a>
</body>
</html>


<?php
}

/* if not logged in */
else {
    header('Location: login.php');
}
?>