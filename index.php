<?php 

if(!isset($_SESSION)) 
{ 
session_start(); 
} 
        
$db = 'id6847947_vilniusdata';

include 'selection.php';

/* separating bands by days */
$selection1 = 'SELECT * FROM bands WHERE day = 1';
$selection2 = 'SELECT * FROM bands WHERE day = 2';

function getbands($day,$selection1,$selection2,$db) { 
	if($day == 1) { 
		return select($selection1,$db);
	}

	else if($day == 2) {
		return select($selection2,$db);
	}
}

$var = 0;

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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Styles/normalize.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/style.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script>
			/* loading gif */
			$(window).load(function() {
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>

	</head>
	<body>
		<!--nav-->
		<header style="top: 0;">
			<?php include 'Views/nav.php';?>
		</header>
		<!--front section-->
		<section id = "front">
			<img id = "bal" src="Images/balionai.png" alt="many baloons"/>
			<img id = "bubble" src="Images/burbul.png" alt="buy tickets here"/>
			<img id = "frontimg" src="Images/front.png" alt="Vilnius alt fest"/>
			<img id="onebal" src="Images/balionas.png" alt="one baloon"/>
			<span class="anchor" class="space"></span>
		</section>

		<!--using anchors because of fixed nav-->
		<span class="anchor" id="aboutanc"></span>
		<section id = "about">
			<div class="aboutleft infoblock">
				<div class="infocontent">
					<h2>About the event</h2>
					<p>There is no one-size-fit-all video solution. Every business video must be made carefully to deliver your message perfectly.<br><br>

						Be it explainer video, motion graphics spot, corporate presentation or even a TV commercial, we never compromise on quality as we don’t just aim to do one project, but to start long term relationships.<br><br>

						Everything produced here is bespoke and carefully crafted from scratch.</p>
				</div>
			</div>
			<div class="aboutright infoblock">
				<div class="infocontent infocontentright">
					<ul>
						<a href="index.php#lineupanc"><li>Trendy bands</li></a>
						<a href="index.php#agendaanc"><li>Various concerts</li></a>
						<a href="info.php?name=activities"><li>Many activities</li></a>
						<a href="gallery.php?years=2018"><li>Great atmosphere</li></a>
						<a href="http://www.tiketa.lt"><li>Cheap tickets</li></a>
					</ul>
				</div>
			</div>
			</div>
		</section>

	<!--line up day one-->
	<span class="anchor" id="lineupanc"></span>
	<section class = "day" id = "lineupone">
		<div class="sectiontitle"><h2>Day one</h2></div>
		<div class="panels-container">
			<?php $bandsdayone = getbands(1,$selection1,$selection2, $db); if(mysqli_num_rows($bandsdayone) != 0) { while($row = mysqli_fetch_array($bandsdayone)):?>
			<div class="panel-block">
				<a href="band.php?id=<?php echo $row['id']; ?>">
					<!--band image-->
					<img src="Images/<?php echo $row['image1']?>" alt="<?php echo $row['name']; ?>">
					<!--band name-->
					<div class="imgband"><?php echo $row['name']; ?></div>
					<!--band time-->
					<div class="bandinfo"><?php echo $row['info']; ?></div>
				</a>
			</div>

			<?php endwhile; 
																												  };
			?>
		</div>
	</section>

	<!--line up day two-->
	<section class = "day" id = "lineuptwo">
		<div class="sectiontitle"><h2>Day two</h2></div>
		<div class="panels-container">
			<?php $bandsdaytwo = getbands(2,$selection1,$selection2, $db); if(mysqli_num_rows($bandsdaytwo) != 0) { while($row = mysqli_fetch_array($bandsdaytwo)):?>
			<div class="panel-block">
				<a href="band.php?id=<?php echo $row['id']; ?>">
					<!--band image-->
					<img src="Images/<?php echo $row['image1']; ?>" alt="<?php echo $row['name']; ?>">
					<!--band name-->
					<div class="imgband"><?php echo $row['name']; ?></div>
					<!--band time-->
					<div class="bandinfo"><?php echo $row['info']; ?></div>
				</a>
			</div>

			<?php endwhile; 
																												  };
			?>
		</div>
	</section>

	<!--map-->
	<section id = "map">
		<div id="mapside" class="aboutleft infoblock">
			<div class="infocontent">
				<h2>Event location</h2>
				<div id="locmap">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d18452.0506418055!2d25.22062737834687!3d54.68311704739711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1slt!2slt!4v1534674806947" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<!--location info-->
		<div  id ="locinf" class="aboutright infoblock">
			<div class="infocontent">
				<h2>Vilnius alt fest location</h2>
				<p>
					Positivus is an annual three-day music festival taking place in Latvia, Salacgrīva since 2007. It offers its visitors a wide array of amazing performers, plentiful entertainment options and a lively atmosphere, creating an unforgettable experience.
					<br><br>
					The idyllic location and beautiful coastal region, located 110 km from Riga are praised both by the festival visitors as well as the performing artists.
					<br><br>
					Apart from an exciting music experience, the festival goers also have the opportunity to participate in and enjoy various activities throughout the festival.
				</p>
			</div>
		</div>
	</section>	

	<!--agenda day one-->
	<span class="anchor" id="agendaanc"></span>
	<div id="agenda">
		<div class="sectiontitle"><h2>Day one agenda</h2></div>
		<div class="timeline" id = "timeline">
			<?php $bandsdayone = getbands(1,$selection1,$selection2, $db); if(mysqli_num_rows($bandsdayone) != 0) { while($row = mysqli_fetch_array($bandsdayone)):?>
			<!--checked if number is even or odd-->
			<?php $var++; if($var%2!=0) {  ?>

			<!--left agenda-->
			<div class="containertl left">
				<a href="band.php?id=<?php echo $row['id']; ?>"><div class="agendablock"><?php echo $row['info']; ?><span class = "agendaname"><?php echo $row['name']?></span></div></a>
			</div>
			<?php }
																												   else {  ?>
			<!--right agenda-->																   
			<div class="containertl right">
				<a href="band.php?id=<?php echo $row['id']; ?>"><div class="agendablock"><?php echo $row['info']; ?><span class = "agendaname"><?php echo $row['name']?></span></div></a>
			</div>
			<?php  }
																												   endwhile; 
																												  };
			?>
		</div>
	</div>

	<!--agenda day two-->
	<div id="agenda">
		<div class="sectiontitle"><h2>Day two agenda</h2></div>
		<div class="timeline" id = "timeline">
			<?php $bandsdaytwo = getbands(2,$selection1,$selection2, $db); if(mysqli_num_rows($bandsdaytwo) != 0) { while($row = mysqli_fetch_array($bandsdaytwo)):?>
			<?php $var++; if($var%2!=0) { ?>

			<div class="containertl left">
				<a href="band.php?id=<?php echo $row['id']; ?>"><div class="agendablock"><?php echo $row['info']; ?><span class = "agendaname"><?php echo $row['name']?></span></div></a>
			</div>
			<?php }
																												   else {  ?>
			<div class="containertl right">
				<a href="band.php?id=<?php echo $row['id']; ?>"><div class="agendablock"><?php echo $row['info']; ?><span class = "agendaname"><?php echo $row['name']?></span></div></a>
			</div>
			<?php  }
																												   endwhile; 
																												  };
			?>
		</div>
	</div>
	<span class="anchor" id="galleryanc"></span>
	<!--past events-->
	<section id="pastevents">	
		<div class="sectiontitle"><h2>Past events</h2></div>
		<!--carousel-->
		<div class="carousel-container">
			<div id="myCarousel" data-interval="false" class="carousel slide" data-ride="carousel">
				<!-- indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- wrapper for slides -->
				<div class="carousel-inner">	
					<div class="item active">
						<img class = "carousel-image" src="Images/slider3.jpg" alt="2018 event"/>
						<div class="carousel-caption">
							<a href="gallery.php?years=2018" class="button">2018</a>
						</div>
					</div>

					<div class="item">
						<img class = "carousel-image" src="Images/slider2.jpg" alt="2017 event"/>
						<div class="carousel-caption">
							<a href="gallery.php?years=2017" class="button">2017</a>
						</div>
					</div>

					<div class="item">
						<img class = "carousel-image" src="Images/sl5.jpg" alt="2016 event"/>
						<div class="carousel-caption">
							<a href="gallery.php?years=2016" class="button">2016</a>
						</div>
					</div>
				</div>

				<!-- left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</section>

	<!--sponsors-->
	<span class="anchor" id="sponsorsanc"></span>
	<div id="sponsors">
		<div class="sectiontitle"><h2>Sponsors</h2></div>
		<!--sponsors wrap-->
		<div class="sponsorswrap">
			<div class = "sponsorblock"><a href="http://www.vilnius-events.lt/en/">
				<img class="imgsponsors" src="https://vilnius.lt/wp-content/themes/vilnius/layout/images/logo.png"
					 alt="Vilnius Logo"/>
				</a></div>

			<div class = "sponsorblock"><a href="https://lympo.io/">
				<img class="imgsponsors" src="https://lympo.io/wp-content/themes/lympoio/svg/logo.svg"
					 alt="Lympo Logo"/>
				</a></div>

			<div class = "sponsorblock"><a href="https://bcgateway.eu/">
				<img class="imgsponsors" src="https://bcgateway.eu/wp-content/uploads/2018/02/Blockchain-Centre-Vilnius-logo-e1518009727576.png"
					 alt="BLOCKCHAIN Vilnius Logo"/>
				</a></div>

			<div class = "sponsorblock"><a href="https://www.telia.lt/privatiems">
				<img class="imgsponsors" src="https://www.telia.lt/_ui/responsive/theme-teo/images/telia-logo.svg"
					 alt="Telia Logo"/>
				</a></div>

			<div class = "sponsorblock"><a href="https://www.codeacademy.lt/">
				<img class="imgsponsors" src="https://www.codeacademy.lt/wp-content/uploads/2017/05/logo.png"
					 alt="CodeAcademyLogo"/>
				</a></div>


			<div class = "sponsorblock"><a href="https://www.bttcloud.com/lt/pagrindinis">
				<img class="imgsponsors" src="https://uploads-ssl.webflow.com/5a8536047152ef000134b584/5aa12f19a722600001c13d1e_main_logo.svg"
					 alt="BTT Cloud Logo"/>
				</a></div>
		</div>
	</div>
	<span class="anchor" id="footanc"></span>
	<footer>
		<?php include('Views/footer.php'); ?>
	</footer>
	<div class="se-pre-con"></div>
	</body>

<script>
	/*setting active classes*/
	$(document).ready(function() { 
		$(".nav li").removeClass('active');
		$(".nav li:first-child").addClass('active');
		$(".dropdown-menu li:first-child").removeClass('active');
	});
</script>
</html>


