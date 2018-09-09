<?php


     if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        

?>

<!--bootstrap navbar-->
<nav class="navbar navbar-default navbar-fixed-top navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="Images/logo4.png" alt="Dispute Bills"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class = "home"><a href="index.php">Home</a></li>
                <!--if user is admin show another button-->
                <?php
if (isset($_SESSION['access']) && $_SESSION['access'] == 1) {
    echo '<li class="about"><a href="table_categories.php">Manage content</a></li>';
}

else {
    echo '<li class="about"><a href="index.php#aboutanc">About</a></li>';
}

?>

                <li><a href="http://www.tiketa.lt">Tickets</a></li>
                <li class="dropdown">
                <li class = "infoli"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Info
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="info.php?name=location">Location</a></li>
                        <li><a href="http://www.tiketa.lt">Tickets</a></li>
                        <li><a href="index.php#agendaanc">Agenda</a></li>
                        <li><a href="index.php#lineupanc">Line up</a></li>
                        <li><a href="info.php?name=accommodation">Accommodation</a></li>
                        <li><a href="info.php?name=rules">Festival rules</a></li>
                        <li><a href="info.php?name=activities">Activities</a></li>
                        <li><a href="gallery.php?years=2018">Past events</a></li>
                        <li><a href="index.php#sponsorsanc">Sponsors</a></li>
                    </ul>
                </li>
                <li><a href="reviews.php?filter=allrew">Reviews</a></li>
                <li><a href="index.php#footanc">Contact</a></li>
               <!-- if logged in-->
                <?php
if (!isset($_SESSION['username'])) {
?><li><a href="login.php">Log in</a></li><?php
} elseif (isset($_SESSION['username'])) {
?><li><a href="logout.php">Log out</a></li><?php
}
?>
           </ul>
        </div>
    </div>
</nav>