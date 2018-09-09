<?php 

include('selection.php');

$deleteid = isset($_GET['id']) ? $_GET['id'] : '';
$checked = isset($_GET['checked']) ? $_GET['checked'] : null;

if(isset($_GET['titles']) && isset($_GET['db']) && isset($_GET['table'])) {
$titles = $_GET['titles'];
$db = $_GET['db'];
$table = $_GET['table'];
}
	
if($deleteid != null && is_numeric($deleteid) && $checked == "OK") {
	
$conn = new mysqli('localhost','id6847947_tadas','322559',$db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$deleted = $conn->query("DELETE FROM " . $table . " WHERE id=" . $deleteid);

	if($deleted) {
		header('Location:' . categorylink($db,$table,$titles,'management_info.php'));
	}
}

else if($deleteid != null && is_numeric($deleteid)) { 
	print "Do you want to remove entry with ID" . $deleteid . "?";
	print '<a href ="' . categorylink($db,$table,$titles,'delete.php') . '&id=' . $deleteid . '&checked=OK">Remove</a>';
}
?>