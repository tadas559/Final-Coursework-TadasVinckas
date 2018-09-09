<?php

if(!isset($_SESSION)) { 
session_start(); 
} 

$category = isset($_GET['name']) ? $_GET['name'] : "";

include 'selection.php';

$db = 'id6847947_vilniusdata';

$sel1 = "'$category'";

$category_selection = "SELECT * FROM category WHERE name =" . $sel1;

$category = select($category_selection, $db);

$all_categories_selection = "SELECT * FROM category";

$all_categories = select($all_categories_selection, $db);

if (mysqli_num_rows($category) != 0) {
    $category_info = $category->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
    <head>    
<title>Vilnius Alt Fest</title>
<link rel="shortcut icon" href="Images/logo4.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Styles/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/style.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/info.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    </head>
    <script>    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    </script>
    <body>

        <header>
            <?php
    include 'Views/nav.php';
?>
       </header>
	  <!--answers section-->
        <section id = "answers">
          <!--answers head-->
            <div id="answhead">
                <div class="wrap">
                    <div class="sectionh"><h2>Festival info</h2></div>
                    <div id="categnav">
                        <ul class = "list">
                            <?php
    if (mysqli_num_rows($all_categories) != 0) {
        while ($all_categories_info = mysqli_fetch_array($all_categories)):
?>

                            <a class = "<?php
            echo $all_categories_info['name']; // category name
?>" href="<?php
            echo $all_categories_info['link']; // category link
?>"><li class = "active"><?php
            echo $all_categories_info['title']; // category title
?></li></a>
                            <?php
        endwhile;
    }
    ;
?>
                       </ul>
                    </div>
                </div>
            </div>
        </section>
       <!--answers body-->
        <section id = "answersbody"> 
            <div class="aboutleft infoblock">
                <div class="infocontent">
                   <!--category name-->
                    <h2><?php
    echo $category_info['name'];
?></h2>
                    <p><?php
    echo nl2br($category_info['content']);
?></p>            
                </div>
            </div>
            <div id = "mapsection" class="aboutright infoblock">
                <div class="infocontent">

                    <?php
	/* if no map in category */
    if ($category_info['name'] != 'location') {
        echo '<img class = "infoimg" src="Images/' . $category_info['image'] . '" alt="">';
    }
    
    else {
        
        echo '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d18452.0506418055!2d25.22062737834687!3d54.68311704739711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1slt!2slt!4v1534674806947" frameborder="0" style="border:0" allowfullscreen></iframe>';
    }
?>

                </div>
            </div>
        </section>
        <footer>
        <?php
    include('Views/footer.php');
?>
       </footer>
        <script>
        $(document).ready(function() { 
                $(".nav li").removeClass('active');
                $(".nav .infoli").addClass('active');
            });

            $(document).ready(function() { 
                $("#categnav .list a li").removeClass('active');
                $("#categnav .list .<?php
    echo $category_info['name'];
?> li").addClass('active');
            });
        </script>
    </body>
    <div class="se-pre-con"></div>
</html>

<?php
}
?>