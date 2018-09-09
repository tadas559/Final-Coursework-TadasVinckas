<?php

if(!isset($_SESSION)) { 
session_start(); 
} 
    
$id = isset($_GET['id']) ? $_GET['id'] : "";

include 'selection.php';

$db = 'id6847947_vilniusdata';

$count = rowscount($db);

/* selecting one band */
if (is_numeric($id)) {
    
    $selection = "SELECT * FROM bands WHERE id=" . $id;
    $result    = select($selection, $db);
    
    if (mysqli_num_rows($result) == 0) {
        
        $selection = "SELECT * FROM bands WHERE id=" . $id;
        $result    = select($selection, $db);
        
        $row = $result->fetch_assoc();
    }
    
    
    else {
        $row = $result->fetch_assoc();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>    
        <title>Vilnius Alt Fest</title>
        <link rel="shortcut icon" href="Images/logo4.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/style.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/bandstyle.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    </head>
    <script>

        $(window).load(function() {
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
 
            <section class="bandtop">
                <div class="bandwrap">
                    <div class="bandhead">
                       <!--band image-->
                        <img src="Images/<?php
    echo $row['image2'];
?>" alt="">				<!--set list button-->
                        <a href="index.php#lineupanc"><button type="button" id = "btnfirst" class="btn page"><i class="fas fa-chevron-left"></i>Set list</button></a>
                        <h2><?php
    echo $row['name'];
?></h2>					<!--next band button-->
                        <?php
    if ($row['id'] + 1 > $count) {
        echo '<a href="band.php?id=1"><button type="button" id = "btnsecond" class="btn page">Next band<i class="fas fa-chevron-right"></i></button></a>';
    }
    
    else {
        
        echo '<a href="band.php?id=' . ($row['id'] + 1) . '"><button type="button" id = "btnsecond" class="btn page">Next band<i class="fas fa-chevron-right"></i></button></a>';
    }
?>            </div>
                </div>
            </section>

            <section id = "bandbody">
                <div class="bandtext">
                    <p><?php
	/* info about band */
    echo $row['allinfo'];
?><br><br>
                        <span class = "meet">Meet them in Vingis park at <?php
    echo $row['info'];
?></span></p>
                </div>
                <div class="media">
                  <!-- youtube-->
                    <div class="videoWrapper">
                        <div class="video-container"><iframe src="http://www.youtube.com/embed/<?php
    echo $row['youtube'];
?>"></iframe></div>
                    </div>
                  <!--spotify-->
                    <div class="spotify">
                        <iframe src="https://open.spotify.com/embed/<?php
    echo $row['spotify'];
?>" style="border: 0; width: 100%; height: 380px;" allowfullscreen></iframe>
                    </div>
                </div>
            </section>

            </div>
    </body>
    <div class="se-pre-con"></div>
    <footer>
        <?php
    include('Views/footer.php');
?>
   </footer>
</html>
<?php
}
?>