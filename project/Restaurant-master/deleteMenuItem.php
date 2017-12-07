<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: editMenu.php");
    exit;
}
       include 'dbConnection.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM r_menu WHERE dishTitle = '" . $_GET['dishTitle'] . "'";
echo $sql;
$stmt = $conn->prepare($sql);
$stmt->execute();

// header('Location:admin.php');

  echo  ' <form action="editMenu.php">';
echo     '<input type="submit" value="Menu Items" />';
echo '</form>';
?>