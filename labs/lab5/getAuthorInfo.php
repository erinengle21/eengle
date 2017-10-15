<?php

include '../../../dbConnection.php';

$conn = getDatabaseConnection();

$sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch();

echo $record['firstName'] . "  " . $record['lastName'] . ": " .$record['biography']. "  " . "<img id='photo' src='" . $record['picture'] . "'>";

?>

<!DOCTYPE html>
<html>
    <head>
      
        <title> Author Info </title>
           <link  href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body style="background-color: rgba(255, 255, 255, 0) !important;">





    </body>
</html>