<?php
session_start(); //starts or resumes an existing session


//print_r($_POST); //displays values passed from login form

//validates the username and password
include 'dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);

//echo $password;



        
$sql = "SELECT *
        FROM bq_user
        WHERE username = :username 
        AND   password = :password";   

$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    
  echo "Wrong credentials!";  
  
} else {
    
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
   // echo $_SESSION['adminFullName'];
   //echo "Successful login!";
   header('Location: index.php'); //redirects users to admin page
   
}


    $sql = "INSERT INTO bq_user
            ( password, username)
            VALUES 
            ( :password, :username)";
     $np = array();
    //  $np[":fName"]  = $_POST['firstName'];
    //  $np[":lName"]  = $_POST['lastName'];
     $np[":password"]  = sha1($_POST['password']);
     $np[":username"]  = $_POST['username'];
    
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "You are registered";
     



//still need to add validation at end...dont just take to another page..put in same page

?>


<!--for submit register button: name is: register-submit-->