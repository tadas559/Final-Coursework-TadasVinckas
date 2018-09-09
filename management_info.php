<?php

session_start();

if ($_SESSION['access'] == 1) {
    
    include 'selection.php';
    
    if (isset($_GET['titles']) && isset($_GET['db']) && isset($_GET['table'])) {
        $titles = $_GET['titles'];
        $db     = $_GET['db'];
        $table  = $_GET['table'];
        
        $page    = array();
        $page[0] = $db;
        $page[1] = $table;
    }
    
    $error = "";
    
	/* if search by id */
    if (isset($_POST['IDsubmit'])) {
        
        $id = isset($_POST['ID']) ? $_POST['ID'] : '';
        
        if (is_numeric($id)) {
            
            $selection = "SELECT * FROM " . $table . " WHERE id = " . $id;
            $result    = select($selection, $db);
            if (mysqli_num_rows($result) == 0) {
                $nofound = "SELECT * FROM" . $table;
                $result  = select($nofound, $db);
                $error   = 'id not found';
            }
        }
        
        else {
            $error   = 'id not found or is in bad format';
            $nofound = "SELECT * FROM " . $table;
            $result  = select($nofound, $db);
        }
    }
    
    /* if search */
    elseif (isset($_POST['submitsearch'])) {
        
        $conn = new mysqli('localhost', 'id6847947_tadas', '322559', $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $search    = isset($_POST['search']) ? $_POST['search'] : '';
        $search    = preg_replace("#[^0-9a-z]#i", "", $search);
        $selection = "SELECT * FROM " . $table . " WHERE name LIKE '%$search%'";
        $result    = select($selection, $db);
    }
	
    // select all posts
        elseif (isset($_POST['allposts'])) {
        
        $result = select_default($db, $table);
    }
    
    else {
        $result = select_default($db, $table);
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>

        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>    
        <style>
            .container { 
                margin-top: 10px;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 12px;
            }

            #add-btn-dlg-panel {
                display: none;
            }

            .table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            .table td, .table th {
                border: 1px solid #ddd;
                padding: 5px;
            }

            .table tr:nth-child(even){background-color: #f2f2f2;}


            .table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            .tablehead { 
                background-color: darkgray;
            }

            .container { 
                margin: 50px 20px;
            }

            table { table-layout: fixed; }
            table th, table td { overflow: hidden; }

        </style>
    </head>
    <body>
        <div class="container">

            <a href="table_categories.php">Go back to menu</a></br></br>
    <form action="<?php
    echo categoryLink($db, $table, $titles, "management_info.php");
?>" method="post">

        <div id="ex1" class="modal">
            <p>Thanks for clicking. That felt good.</p>
            <a href="#" rel="modal:close">Close</a>
        </div>

        <input type="text" name="ID" value=""><br><br>
        <input class = "button" type="submit" name="IDsubmit" value="confirm iD"><br><br>
        <p><?php
    echo $error;
?></p>
        <input type="text" name="search" value=""><br><br>
        <input class = "button" type="submit" name="submitsearch" value="search"><br><br>
        <input class = "button" type="submit" name="allposts" value="show all posts"><br><br>


        <table class = "table">
            <tr class = "tablehead">

                <?php
    foreach ($titles as $title) {
        echo '<td>' . $title . '</td>';
    }
?>
               <td>Edit</td>
                <td>Delete</td>
            </tr>
            <tr>
                <?php
    while ($row = mysqli_fetch_array($result)):
?>

                <?php
        for ($i = 0; $i < count($titles); $i++) {
            echo '<td>' . $row[$i] . '</td>';
        }
        if ($titles[1] == "Name") {
            echo '<td><a href="create_band.php?edit=' . $row['id'] . '&db=' . $page[0] . '">Edit</a></td>';
        }
        
        elseif ($titles[1] == "Image") {
            echo '<td><a href="create_category.php?edit=' . $row['id'] . '&db=' . $page[0] . '">Edit</a></td>';
        }
        echo '<td><a href="' . categorylink($db, $table, $titles, 'delete.php') . '&id=' . $row['id'] . '" rel="modal:open">Delete</a></td>';
?>

            </tr>
            <?php
    endwhile;
?>
       </table>
    </form>
    </div>
</body>
</html>

<?php
}

else {
    header('Location: login.php');
}
?>