<?php

session_start();

/* if admin */
if ($_SESSION['access'] == 1) {
    
    $edit = isset($_GET['edit']) ? $_GET['edit'] : '';
    $db   = isset($_GET['db']) ? $_GET['db'] : '';
    
    $fetch_error = false;
    
    
    if (is_numeric($edit) && !$_POST && strlen($db) > 0) {
        
        $conn = new mysqli('localhost', 'id6847947_tadas', '322559', $db);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $data = $conn->query("SELECT * FROM bands WHERE id=$edit");
        
        if ($data && $data->num_rows > 0) {
            $row     = $data->fetch_assoc();
            $name    = $row['name'];
            $info    = $row['info'];
            $youtube = $row['youtube'];
            $spotify = $row['spotify'];
            $allinfo = $row['allinfo'];
            $image1  = $row['image1'];
            $image2  = $row['image2'];
            $day     = $row['day'];
            $success = isset($_GET['success']) ? $_GET['success'] : '';
            $error   = array(
                "database" => ""
            );
        }
        
        else {
            $fetch_error = true;
        }
    }
    
    else {
        $name    = isset($_POST['name']) ? $_POST['name'] : '';
        $info    = isset($_POST['info']) ? $_POST['info'] : '';
        $youtube = isset($_POST['youtube']) ? $_POST['youtube'] : '';
        $spotify = isset($_POST['spotify']) ? $_POST['spotify'] : '';
        $allinfo = isset($_POST['allinfo']) ? $_POST['allinfo'] : '';
        $image1  = isset($_POST['image1']) ? $_POST['image1'] : '';
        $image2  = isset($_POST['image2']) ? $_POST['image2'] : '';
        $day     = isset($_POST['day']) ? $_POST['day'] : '';
        $success = isset($_GET['success']) ? $_GET['success'] : '';
        $error   = array(
            "title" => "",
            "author" => "",
            "content" => "",
            "database" => ""
        );
    }
    
    
    if ($_POST) {
        $conn = new mysqli('localhost', 'id6847947_tadas', '322559', 'id6847947_vilniusdata');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $name    = $conn->real_escape_string($name);
        $info    = $conn->real_escape_string($info);
        $youtube = $conn->real_escape_string($youtube);
        $spotify = $conn->real_escape_string($spotify);
        $allinfo = $conn->real_escape_string($allinfo);
        $image1  = $conn->real_escape_string($image1);
        $image2  = $conn->real_escape_string($image2);
        $day     = $conn->real_escape_string($day);
        
        if (is_numeric($edit)) {
            
            $saved = $conn->query("UPDATE bands SET name='$name' , info='$info', youtube='$youtube', spotify='$spotify', allinfo='$allinfo', image1='$image1', image2='$image2', day='$day' WHERE id='$edit'");
        }
        
        else {
            $saved = $conn->query("INSERT INTO bands (name,info,youtube,spotify,allinfo,image1,image2,day) VALUES ('$name','$info','$youtube','$spotify','$allinfo','$image1','$image2','$day')");
        }
        
        if ($saved) {
            header('Location: table_categories.php');
        }
        
        else {
            $error['database'] = "Error when saving";
        }
        
        print_r($conn->error);
    }
    if (strlen($success) == 0) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>PHP create</h2>
            <?php
        if ($fetch_error == false) {
            
            if ($edit != "") {
                $path = $_SERVER['PHP_SELF'] . '?edit=' . $edit;
            } else {
                $path = $_SERVER['PHP_SELF'];
            }
?>
           <form method="post" action = "<?php
            echo $path;
?>">


                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value ="<?php
            echo $name;
?>"/>

                </div>
                <div class="form-group">
                    <label for="info">Info:</label>
                    <input type="text" class="form-control" placeholder="Enter info" name="info" value ="<?php
            echo $info;
?>"/>

                </div>
                <div class="form-group">
                    <label for="youtube">Youtube:</label>
                    <input type="text" class="form-control" placeholder="Enter youtube" name="youtube" value ="<?php
            echo $youtube;
?>"/>
                </div>

                <div class="form-group">
                    <label for="spotify">Spotify:</label>
                    <input type="text" class="form-control" placeholder="Enter spotify" name="spotify" value ="<?php
            echo $spotify;
?>"/>
                </div>

                <div class="form-group">
                    <label for="allinfo">All info:</label>
                    <input type="text" class="form-control" placeholder="Enter all info" name="allinfo" value ="<?php
            echo $allinfo;
?>"/>
                </div>

                <div class="form-group">
                    <label for="image1">Image1:</label>
                    <input type="text" class="form-control" placeholder="Enter image1" name="image1" value ="<?php
            echo $image1;
?>"/>
                </div>

                <div class="form-group">
                    <label for="image2">Image2:</label>
                    <input type="text" class="form-control" placeholder="Enter image2" name="image2" value ="<?php
            echo $image2;
?>"/>
                </div>

                <div class="form-group">
                    <label for="day">Day:</label>
                    <input type="text" class="form-control" placeholder="Enter day" name="day" value ="<?php
            echo $day;
?>"/>
                </div>

                <button type="submit" class="btn btn-default">Save</button>
                <?php
            echo $error['database'];
?>
           </form>    
            
        </div>
           
            <?php
        } else {
?>
           <p>Error fetching updatable content</p>
        <?php
        }
?>
   </body>
</html>
<?php
    } else {
        print "Ok";
    }
}

else {
    header('Location: login.php');
}
?>