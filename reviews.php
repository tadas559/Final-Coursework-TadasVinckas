<?php

session_start();

/* editing post ID */
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';

$db     = 'id6847947_vilniusdata';
$onerew = '';

include 'selection.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$entries_per_page = 6;

$all    = '';
$id     = '';
$filter = '';

$title   = isset($_POST['title']) ? $_POST['title'] : ''; // post title
$content = isset($_POST['content']) ? $_POST['content'] : '';

$error = array(
    "title" => "",
    "content" => "",
    "database" => ""
);
if (isset($_GET['id']) || isset($_GET['filter'])) {
    
    if (is_numeric($edit) && !$_POST) {
        
        $conn = new mysqli('localhost', 'id6847947_tadas', '322559', 'id6847947_vilniusdata');
        
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $data = $conn->query("SELECT * FROM reviews WHERE id=$edit");
        
        if ($data && $data->num_rows > 0) {
            $row     = $data->fetch_assoc();
            $title   = $row['title'];
            $content = $row['content'];
            $error   = array(
                "title" => "",
                "content" => "",
                "database" => ""
            );
        }
        
        else {
            $fetch_error = true;
        }
    }
    
    /* if user chose to see one post */
    elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
        
        $id = $_GET['id'];
        
        $review_sel = "SELECT * FROM reviews WHERE id=" . $id;
        $rev        = select($review_sel, $db);
        if (mysqli_num_rows($rev) != 0) {
            $onerew = $rev->fetch_assoc();
        }
        
        else {
            $onerew = '';
        }
    }
    
    else {
        $onerew = '';
    }
    
    
    if ($_POST) {
        
        /* if title or content is empty */
        if (strlen($title) == 0 || strlen($content) == 0) {
            
            if (strlen($title) == 0) {
                $error['title'] = 'Error: invalid data in title';
            }
            
            elseif (strlen($content) == 0) {
                $error['content'] = 'Error: invalid data in content';
            }
        }
        
        else {
            
            
            $conn = new mysqli('localhost', 'id6847947_tadas', '322559', 'id6847947_vilniusdata');
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $title   = $conn->real_escape_string($title);
            $content = $conn->real_escape_string($content);
            
            if (is_numeric($edit)) {
                $saved = $conn->query("UPDATE reviews SET title='$title', content='$content' WHERE id='$edit'");
                print_r($conn->error);
            }
            
            else {
                $username = $_SESSION['username'];
                $saved    = $conn->query("INSERT INTO reviews (username,title,content) VALUES ('$username','$title','$content')");
            }
            
            if ($saved) {
            header('Location: ' . $_SERVER['PHP_SELF'] . '?filter=allrew');
            }
            
            else {
                $error['database'] = "Error when saving";
            }
            
            print_r($conn->error);
        }
    }
    
    /* if filter */
    elseif (isset($_GET['filter'])) {
        
        $filter = $_GET['filter'];
        /* if filter is all reviews */
        if ($filter == 'allrew') {
            $all_sel         = "SELECT * FROM reviews";
            $all             = select($all_sel, $db);
            $all_reviews_sel = "SELECT * FROM reviews ORDER BY date DESC LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
            $all_reviews     = select($all_reviews_sel, $db);
            
        }
        /* if filter is new first */
        elseif ($filter == 'newfirst') {
            $all_sel         = "SELECT * FROM reviews";
            $all             = select($all_sel, $db);
            $all_reviews_sel = "SELECT * FROM reviews ORDER BY date DESC LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
            $all_reviews     = select($all_reviews_sel, $db);
            
        } /* if show old first */ elseif ($filter == 'oldfirst') {
            $all_sel         = "SELECT * FROM reviews";
            $all             = select($all_sel, $db);
            $all_reviews_sel = "SELECT * FROM reviews ORDER BY date ASC LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
            $all_reviews     = select($all_reviews_sel, $db);
            
        } /* if filter is my reviews */ elseif ($filter == 'myrev') {
            
            if ($_SESSION['loggedin'] == "false") {
                header('Location: login.php');
            }
            
            $all_reviews_sel = "SELECT * FROM reviews WHERE username='" . $_SESSION['username'] . "'";
            $all             = select($all_reviews_sel, $db);
            $all_reviews_sel = "SELECT * FROM reviews WHERE username='" . $_SESSION['username'] . "' LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
            
            /*    $all_reviews_sel = "SELECT * FROM reviews WHERE username=" . $_SESSION['username'] . " LIMIT " . ($page-1)*$entries_per_page . ", " . $entries_per_page;
             */
            $all_reviews = select($all_reviews_sel, $db);
        }
        
    }
    
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
        <link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" href="images/icon.png"/>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=pri70llqajux2eny6eez2c5hxdmwlgepxrm3c2abr441tgz0"></script>
        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>    
        <link rel="stylesheet" type="text/css" href="Styles/reviews.css"/>
        <script>tinymce.init({ selector:'#tiny' });</script>
        <script>
            tinymce.init({
                selector: '#editor',
                plugins: 'image', // added image plugin
                toolbar: 'undo redo | link image',
                // enable title field in the Image dialog
                image_title: true, 
                // enable automatic uploads of images represented by blob or data URIs
                automatic_uploads: true,
                // add custom filepicker only to Image dialog
                file_picker_types: 'image',
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();

                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            // call the callback and populate the Title field with the file name
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                }
            });
        </script>
    </head>
    <body>
         	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script>
			/* loading gif */
			$(window).load(function() {
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
        <header>
            <?php
    include 'Views/nav.php';
?>
       </header>
    <!--reviews section-->
        <section id = "answers">
            <div id="answhead">
                <div class="wrap">
                    <div class="sectionh"><h2>Event reviews</h2></div>
                    <div id="categnav">
                    <!--links for filters-->
                        <ul class = "list">
                            <a class = "allrew" href="reviews.php?filter=allrew"><li>All reviews</li></a>
                            <a class = "newfirst" href="reviews.php?filter=newfirst"><li>Newest first</li></a>
                            <a class = "oldfirst" href="reviews.php?filter=oldfirst"><li>Oldest first</li></a>
                                        <!--shows my reviews and create review only if user is logged in-->
                        <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        echo '<a class = "myrev" href="reviews.php?filter=myrev"><li>My posts</li></a>';
        echo '<a class = "createrev" href="reviews.php?filter=createrev"><li>Create review</li></a>';
    }
?>
                               <img src="" alt="">
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!--articles section-->
        <section id = "articles">
            <!--section's header-->
        <div class="header">
            <div class="sectiontitle">
                                <!--if filter is set-->
                <?php
    if ($filter == 'allrew' || $filter == 'oldfirst' || $filter == 'newfirst') {
        echo '<h2>All reviews</h2>';
    } elseif ($filter == 'createrev') {
        echo '<h2>Create review</h2>';
    } elseif (isset($_GET['id'])) {
        echo '<h2>Review</h2>';
    }
    
    else {
        echo '<h2>My reviews</h2>';
    }
?>
           </div>
            </div>
                        <!--if filter is not create review (using this to avoid showing texteditor for other filters)-->
            <?php
    if ($filter != 'createrev' && !isset($_GET['id'])) {
        echo '<div class="articleswrap articleswr">';
    }
    
    else {
        echo '<div class="articleswrap">';
    }
?>

                <?php
    if ($all != '' && $filter != 'createrev') {
        if (mysqli_num_rows($all_reviews) != 0) {
            while ($review = mysqli_fetch_array($all_reviews)):
?>
                   <!--checking what to show - articles blocks or one selected article-->
        
            <?php
                if ($filter != 'createrev' && !isset($_GET['id'])) {
                    echo '<article class = "artblock">';
                } else {
                    echo '<article>';
                }
?>
                   <!--linked article title-->
                    <a href="?id=<?php
                echo $review['id'];
?>"><h3><?php
                echo $review['title'];
?></h3></a>
                    <!--short info about article - author firstname, lastname and creation date-->
            
                    <p class = "info">by <?php
                if ($review['username']) {
                    getinfoline($review['username'], $db, $review['date']);
                }
?> </p>
                            <!--article content-->
                    <div class="articlep">
                        <?php
                echo nl2br($review['content']);
?>
                   </div>
                </article>

<?php
            endwhile;
        }
    }
?>
       <!--if filter is one review-->
                <?php
    if ($onerew != '') {
?>
               <article>
                    <h3><?php
        echo $onerew['title'];
?></h3>
                        <!--info line-->
                        <p class = "info">by <?php
        if ($onerew['username']) {
            getinfoline($onerew['username'], $db, $onerew['date']);
        }
?> </p>        
                        <!--if user is logged in and he is author of the post - he can see edit, delete buttons-->
        
           <?php      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
            if($onerew['username'] == $_SESSION['username'] || $_SESSION['access'] == 1) {
            echo '<a href="delete_review.php?id=' . $onerew['id'] . '" rel="modal:open"><button type="button" id = "btnfirst" class="btn page">Delete review</button></a>';
            echo '<a href="reviews.php?filter=createrev&edit=' . $onerew['id'] . '"><button id = "btnfirst" type="button" class="btn page">Edit review</button></a>';
            /*one article content*/
        }
        }
	    ?>
           
                    <div class="onearticlecont">
                        <?php
        echo nl2br($onerew['content']);
?>
                   </div>

                </article>

                <?php
    }
?>

                <?php
    if ($filter == 'createrev') {
        
        if ($_SESSION['loggedin'] == false) {
            header('Location: login.php');
        }
        
        if ($edit != '') {
            $path = $_SERVER['PHP_SELF'] . '?filter=createrev&edit=' . $edit;
        } else {
            $path = $_SERVER['PHP_SELF'] . '?filter=myrev';
        }
        
?>
               <form action="<?php
        echo $path;
?>" method="post">
                    <label for="fname">Review title: </label>
                    <input type="text" name="title" placeholder="Enter review title.." value="<?php
        echo $title;
?>">
                    <label for="fname">Review content: </label>
                    <textarea id="editor" placeholder="Enter review" name="content"><?php
        echo nl2br($content);
?></textarea>
                    <input type="submit" value="Submit">
                </form>

                </br>
            <?php
    }
?>
           </div>
        </section>
                <?php
    if (!isset($_GET['id']) && $filter != 'createrev') {
        /* pagination, 6 posts on page */
        if (mysqli_num_rows($all) > 6) {
            $max_page = ceil($all->num_rows / $entries_per_page);
            echo '<div class = "numswrap">';
            
            for ($n = 1; $n <= $max_page; $n++) {
                $active  = ($page == $n) ? "classname='active'" : "";
                $activea = ($page == $n) ? "activenum" : "";
                echo '<a class = "pagenum ' . $activea . '" href="reviews.php?filter=' . $filter . '&page=' . $n . '" ' . $active . '>' . $n . '</a>';
            }
            echo '</div>';
        }
    }
?>
   </section>
    <footer>
        <?php
    include('Views/footer.php');
?>
   </footer>
    
    <script>
        /* setting active classes */
        $(document).ready(function() { 
            $(".nav li").removeClass('active');
            $(".nav .reviewsli").addClass('active');
        });

        $(document).ready(function() { 
            $("#categnav .list a li").removeClass('active');
            $("#categnav .list .<?php
    echo isset($_GET['filter']) ? $_GET['filter'] : '';
?> li").addClass('active');
        });
    </script>
        <!--loading-->
<div class="se-pre-con"></div>
    </body>
</html>

<?php
}
?>
