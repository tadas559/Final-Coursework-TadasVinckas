<?php

$error = array(
    "name" => "",
    "lname" => "",
    "email" => "",
    "password" => "",
    "passwords_eq" => "",
    "symbol" => "",
    "exist" => ""
);

function checkValue($postArray, $key)
{
    return isset($postArray[$key]) ? $postArray[$key] : null;
}


function emailSymbol($email)
{
    return (strpos($email, '@') > 0);
}

function passwordValid($password)
{
    return (strlen($password) > 0 && notLong($password));
}

function notLong($value)
{
    return (strlen($value) < 256);
}

function passwordsSame($password, $password_again)
{
    return $password == $password_again;
}

function valid($value)
{
    if (notLong($value) && strlen($value) > 0) {
        return true;
    } else {
        return false;
    }
}

$name = checkValue($_POST, 'name');

$lname = checkValue($_POST, 'lname');

$email = checkValue($_POST, 'email');

$password = checkValue($_POST, 'password');

$password_again = checkValue($_POST, 'password_again');

$database_error = "";

if (valid($name) && valid($lname) && passwordValid($password) && passwordsSame($password, $password_again) && valid($email) && emailSymbol($email)) {
    
    $conn = new mysqli('localhost', 'id6847947_tadas', '322559', 'id6847947_vilniusdata');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email            = $conn->real_escape_string($email);
    $name             = $conn->real_escape_string($name);
    $lname            = $conn->real_escape_string($lname);
    $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
    
    $saved = $conn->query("INSERT INTO users (firstname,lastname, email, password) 
        VALUES ('$name','$lname','$email','$encrypt_password')");
    
    $database_error = $conn->errno === 1062 ? 'Email exists' : '';
    
    if ($database_error == 'Email exists') {
        $error['exist'] = "Email exists";
    }
    
    else {
        header('Location: login.php');
    }
    
}


elseif ($_POST) {
    if (!valid($name)) {
        $error["name"] = "Name must be filled";
    }
    
    
    if (!valid($lname)) {
        $error["lname"] = "Last name must be filled";
    }
    
    
    if (!passwordValid($password)) {
        $error["password"] = "Password must be filled";
    }
    
    
    if (!passwordsSame($password, $password_again)) {
        $error["passwords_eq"] = "Passwords must be equal";
    }
    
    if (!emailSymbol($email)) {
        
        $error["symbol"] = "Email must have @";
    }
    
    if (!valid($email)) {
        $error["email"] = "Email must be filled";
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
        <link rel="stylesheet" type="text/css" href="Styles/registration.php"/>
        <link rel="stylesheet" type="text/css" href="Styles/footer.css"/>
        <link rel="stylesheet" type="text/css" href="Styles/login.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/botstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" href="images/icon.png"/>
    </head>
    <body>
        <header>
            <?php
include 'Views/nav.php';
?>
       </header>

        <section id = "login">

            <div class="sectiontitle"><h2>Join us</h2></div>
            <form method="post" action="<?php
echo $_SERVER['PHP_SELF'];
?>">
                <label for="nam">First name:</label>
                <input type="text" id="nam" name="name" placeholder="Your first name.." value = "<?php
echo $name;
?>">
                <div class="error"><?php
echo $error["name"];
?></div>
                <label for="lnam">Last name:</label>
                <input type="text" id="lnam" name="lname" placeholder="Your last name.." value = "<?php
echo $lname;
?>">
                <div class="error"><?php
echo $error["lname"];
?></div>
                <label for="nam">Email:</label>
                <input type="text" id="nam" name="email" placeholder="Your email.." value = "<?php
echo $email;
?>">
                <div class="error"><?php
echo $error['exist'];
?></div>
                <div class="error"><?php
echo $error['symbol'];
?></div>
                <div class="error"><?php
echo $error['email'];
?></div>
                <label for="passw">Password:</label>
                <input type="password" id="passw" name="password" placeholder="Your password.." value = "<?php
echo $password;
?>">
                <div class="error"><?php
echo $error["password"];
?></div>
                <label for="passwag">Password again:</label>
                <input type="password" id="passwag" name="password_again" placeholder="Your password again.." value = "<?php
echo $password_again;
?>">
                <div class="error"><?php
echo $error["passwords_eq"];
?></div>
                <input type="submit" value="Login">
                

            </form>

        </section>
        <footer>
            <?php
include('Views/footer.php');
?>
       </footer>
        <script>
            $(document).ready(function() { 
                $(".nav li").removeClass('active');
                $(".nav .loginli").addClass('active');
            });

            $(document).ready(function() { 
                $("#categnav .list a li").removeClass('active');
                $("#categnav .list .<?php
echo isset($_GET['filter']) ? $_GET['filter'] : '';
?> li").addClass('active');
            });
        </script>
    </body>
</html>