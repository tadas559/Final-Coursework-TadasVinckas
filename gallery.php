<?php

     if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
$years = isset($_GET['years']) ? $_GET['years'] : "";

include 'selection.php';

$sel = "'$years'";

$db = 'id6847947_vilniusdata';

$selection_year = "SELECT * FROM gallery WHERE years =" . $sel;
$selected_year  = select($selection_year, $db);

$selection_years = "SELECT DISTINCT years FROM gallery";
$all_years       = select($selection_years, $db);

/* selected year */
if (mysqli_num_rows($selected_year) != 0) {
?>


<!DOCTYPE html>
<html lang="en">
	<head>    
		<title>Vilnius fest 2018</title>    
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/normalize.css"/>
		<link href="dist/css/lightbox.min.css" rel="stylesheet">
		<link href="dist/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Styles/style.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/info.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
		<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/gallery.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

	</head>
	<body>

		<header>
			<?php
	include 'Views/nav.php';
			?>
		</header>
		<!--categories nav-->
		<section id = "answers">
			<div id="answhead">
				<div class="wrap">
					<div class="sectionh"><h2>Past events</h2></div>
					<!--list links-->
					<div id="categnav">
						<ul class = "list">
							<?php
	if (mysqli_num_rows($all_years) != 0) {
		while ($years_info = mysqli_fetch_array($all_years)):
							?>
							<a class = "years<?php
		echo $years_info['years'];
										?>" href="gallery.php?years=<?php
		echo $years_info['years'];
												  ?>"><li class = "active"><?php
		echo $years_info['years'];
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

		<!--images gallery-->
		<div class="tz-gallery">
			<?php
	if (mysqli_num_rows($selected_year) != 0) {
		while ($year_info = mysqli_fetch_array($selected_year)):
			?>
			<div class="imgblock">
				<!--lightbox-->
				<a class="lightbox" href="Festimages/<?php
		echo $year_info['image'];
										  ?>">
					<img class = "fimg" src = "Festimages/<?php
		echo $year_info['image'];
											   ?>" data-src="Festimages/<?php
		echo $year_info['image'];
															 ?>" alt="festival image"/>
				</a>    

			</div>
			<?php
		endwhile;
	}
			?>
		</div>
		<footer><?php
	include('Views/footer.php');
			?></footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
		<script>
			/*lightbox*/
			baguetteBox.run('.tz-gallery');

			/*setting active classes*/
			$(document).ready(function() { 
				$(".nav li").removeClass('active');
				$(".nav .agendali").addClass('active');
			});

			$(document).ready(function() { 
				$("#categnav .list a li").removeClass('active');
				$("#categnav .list .years<?php
	echo $years;
				  ?> li").addClass('active');
				  });

		</script>

		<script src="dist/lazyload.min.js"></script>
		<script>
			(function () {
				var ll = new LazyLoad({
					threshold: 0
				});
			}());
		</script>
	</body>
</html>

<?php
}
?>