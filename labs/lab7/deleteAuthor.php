<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}
       include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM q_author WHERE authorID = " . $_GET['authorId'];
echo $sql;
$stmt = $conn->prepare($sql);
$stmt->execute();

// header('Location:admin.php');

   echo  ' <form action="admin.php">';
echo     '<input type="submit" value="List of Authors" />';
echo '</form>';
?>