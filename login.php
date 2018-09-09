<?php

    session_start();

   $_SESSION['loggedin'] = false;

$db = 'id6847947_vilniusdata';

include 'selection.php';

$email = checkValue($_POST,'email');
$password = checkValue($_POST,'password');

$login_error = "";

function checkValue($postArray,$key){
	return isset($postArray[$key]) ? $postArray[$key] : null;
}

function emailValid($email){
	return strpos($email,'@') > 0;
}

function GenerateRandomToken(){
	$token = openssl_random_pseudo_bytes(16);
	$token = bin2hex($token);
	return $token;
}

function storeTokenForUser($user, $id, $token, $conn){

	$conn->query("INSERT INTO tokens (user_id,token) VALUES ('$id','$token')");
	print $conn->error;
}

function onLogin($user,$id,$conn) {
	$secret_key = "SECRET";
	$token = GenerateRandomToken(); 
	storeTokenForUser($user,$id, $token, $conn);
	$cookie = $user . ':' . $token;
	$mac = hash_hmac('sha256', $cookie, $secret_key);
	$cookie .= ':' . $mac;
	setcookie('rememberme', $cookie, time() + (87600 * 30));
}

function onLoginNoRemember($user,$id,$conn) {
	setcookie('rememberme');
}

if($_POST && emailValid($email)){
	
$conn = new mysqli('localhost','id6847947_tadas','322559','id6847947_vilniusdata');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$email = $conn->real_escape_string($email);
	$result = $conn->query("SELECT * FROM users WHERE email='$email'");
	
	print $conn->error;
	if($result->num_rows > 0){
		$user = $result->fetch_assoc();
		if(password_verify($password,$user['password'])){
			$_SESSION['username'] = $email;
		    $_SESSION['loggedin'] = "true";
			$_SESSION['name'] = checkValue($user,'name');
			$_SESSION['access'] = $user['access'];
			if(isset($_POST['remember'])) { 
				onLogin($email,$user['id'], $conn);
				header('Location: index.php');
				exit;
			}

			else { 
				onLoginNoRemember($email,$user['id'], $conn);
				header('Location: index.php');
				exit;
			}
		} else {
			$login_error = "Error: wrong password";
		}
	} else {
		$login_error = "Error in login";
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
		<link rel="stylesheet" type="text/css" href="Styles/reviews.css"/>
		<link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
				<link rel="stylesheet" type="text/css" href="Styles/login.css"/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

	</head>
	<script>	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	</script>
	<body>
		<header>
			<?php include 'Views/nav.php';?>
		</header>
		<section id = "login">
			<div class="sectiontitle"><h2>Log in</h2></div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<label for="nam">Email:</label>
				<input type="text" id="nam" name="email" value = "<?php echo $email; ?>" placeholder="Your email..">
				<div class="error"><?php print ($_POST && !emailValid($email)) ? "Error: email must be filled" : ""; ?></div>
				<label for="passw">Password:</label>
				<input type="password" id="passw" name="password" placeholder="Your password..">
				<div class="error"><?php echo $login_error; ?></div>
				<label for="check">Remember me:</label>
				<input type="checkbox" id = "check" name="remember">

				<input type="submit" value="Login">
				<a id = "reg" href="registration.php">Haven't registered yet?</a>
			</form>
		</section>
		<footer>
				<?php include('Views/footer.php'); ?>
		</footer>
		<script>
			$(document).ready(function() { 
				$(".nav li").removeClass('active');
				$(".nav .loginli").addClass('active');
			});

			$(document).ready(function() { 
				$("#categnav .list a li").removeClass('active');
				$("#categnav .list .<?php echo isset($_GET['filter']) ? $_GET['filter'] : ''; ?> li").addClass('active');
			});
		</script>
	</body>
	<div class="se-pre-con"></div>
</html>