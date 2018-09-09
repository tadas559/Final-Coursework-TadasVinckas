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
        
        $data = $conn->query("SELECT * FROM category WHERE id=$edit");
        
        if ($data && $data->num_rows > 0) {
            $row     = $data->fetch_assoc();
            $image   = $row['image'];
            $content = $row['content'];
            $name    = $row['name'];
            $map     = $row['map'];
            $title   = $row['title'];
            $link    = $row['link'];
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
        $image   = isset($_POST['image']) ? $_POST['image'] : '';
        $map     = isset($_POST['map']) ? $_POST['map'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $link    = isset($_POST['link']) ? $_POST['link'] : '';
        $title   = isset($_POST['title']) ? $_POST['title'] : '';
        $success = isset($_GET['success']) ? $_GET['success'] : '';
        $error   = array(
            "database" => ""
        );
    }
    
    
    if ($_POST) {
        
        $conn = new mysqli('localhost', 'id6847947_tadas', '322559', 'id6847947_vilniusdata');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $name    = $conn->real_escape_string($name);
        $image   = $conn->real_escape_string($image);
        $title   = $conn->real_escape_string($title);
        $link    = $conn->real_escape_string($link);
        $content = $conn->real_escape_string($content);
        $map     = $conn->real_escape_string($map);
        
        
        if (is_numeric($edit)) {
            
            $saved = $conn->query("UPDATE category SET name='$name', image='$image', title='$title', content ='$content', map='$map', link='$link' WHERE id='$edit'");
        }
        
        else {
            $saved = $conn->query("INSERT INTO category (name,image,title,link,content,map) VALUES ('$name','$image', '$title','$link','$content','$map')");
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
                    <label for="image">Image:</label>
                    <input type="text" class="form-control" placeholder="Enter image" name="image" value ="<?php
            echo $image;
?>"/>

                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="Enter title" name="title" value ="<?php
            echo $title;
?>"/>
                </div>

                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" placeholder="Enter link" name="link" value ="<?php
            echo $link;
?>"/>
                </div>

                <div class="form-group">
                    <label for="content">Content: </label>
                    <input type="text" class="form-control" placeholder="Enter content" name="content" value ="<?php
            echo $content;
?>"/>
                </div>

                <div class="form-group">
                    <label for="image2">Map: </label>
                    <input type="text" class="form-control" placeholder="Enter map" name="map" value ="<?php
            echo $map;
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