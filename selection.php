<?php 

/* select from db */
function select($selection,$db) {

		$conn = new mysqli('localhost','id6847947_tadas','322559',$db);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$result = $conn->query($selection);
	return $result;
}

/* select default order everything */
function select_default($db,$table) { 

	$conn = new mysqli('localhost','id6847947_tadas','322559',$db);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$selection= "SELECT * FROM " . $table . " ORDER BY id ASC";
	return $result = $conn->query($selection);
}

/* create category link with information */
function categorylink($db, $table, $titles,$page) { 
	$i = 0;
	$link = $page . '?';
	foreach($titles as $value) {
		if($i!=0) {
			$link .=		'&';
		}	
		$link.= 'titles[]=' . $value;  

		$i=1;	} 

	$link .= '&table=' . $table . '&db=' . $db;

	return $link;
}

/* get name by email */
function getname($username,$db,$name) {

	$selection = "SELECT $name FROM users WHERE email='$username'";
	$result = select($selection,$db);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
	}
	return ucfirst($row[$name]); /* uppercase first letter */

}

/* get all info line about review */
function getinfoline($username,$db,$date) {
	echo getname($username,$db,'firstname') . ' ' . getname($username,$db,'lastname') .  ' | ' . $date;
}

/* rows count in db */
function rowscount($db) {
	$selection = "SELECT * FROM bands";
	
	$result = select($selection,$db);

	return mysqli_num_rows($result);
}
?>