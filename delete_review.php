<?php 

$deleteid = isset($_GET['id']) ? $_GET['id'] : '';
$checked = isset($_GET['checked']) ? $_GET['checked'] : null;

if($deleteid != null && is_numeric($deleteid) && $checked == "OK") {
$conn = new mysqli('localhost','id6847947_tadas','322559','id6847947_vilniusdata');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$deleted = $conn->query("DELETE FROM reviews WHERE id=" . $deleteid);

	if($deleted) {
		header('Location: reviews.php?filter=myrev');
	}
}

else if($deleteid != null && is_numeric($deleteid)) { 
	print "Do you want to remove this review? ";
	print '<a href = "delete_review.php?id=' . $deleteid . '&checked=OK">Remove</a>';
}

?>