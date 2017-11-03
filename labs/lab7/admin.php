<?php
session_start();

if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
    
    header("Location: index.php"); //redirects users to login page
    exit;
    
}

function authorList(){
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
             <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this author?");
            }
        </script>
    </head>
    <body>

        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>
        
        <br ><br >

<form action="addAuthor.php">
    <input type="submit" value="Add New Author" />
</form>

<form action="logout.php">
    <input type="submit" value="Logout" />
</form>


<br >

        <?php 
        
        $authors =authorList();
        
        foreach($authors as $author) {
                echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
                // echo "[<a href='deleteAuthor.php?authorId=".$author['authorId']."'>Remove</a>] ";
        echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                   <input type='hidden' name='authorId' value='" . $author['authorId']."'>
                    <input type='submit' value='Delete'>
                  </form>";
            
        
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        
        ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>