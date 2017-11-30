<?php
session_start();
//Will be checking score in this, posting new score,

include 'dbConnection.php';
// include 'index.php';

$conn = getDatabaseConnection();
// //make this an entire function just for log in, then call function in other file..dont forget to make $conn global.
//     $sql = "SELECT username 
//             FROM bq_user
//             WHERE username = :username";
            
//     $stmt = $conn -> prepare ($sql);
//     $stmt -> execute( array(":username"=>$_GET['username']) );
//     $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
//     //print_r($record);
    
//     echo json_encode($record);


// $_SESSION['username'];
  
     
     
function averageScore(){
    global $conn;
      $sql = "SELECT AVG(score) FROM bq_user 
      WHERE username = 'eengle'";
    //   $_SESSION['username'];

  $stmt = $conn->prepare($sql);
     $stmt->execute();
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo "<h1 style='red'>" . $record["AVG(score)"] . "</h1>";
      }

}
averageScore();
//   echo "<h1 style='color:red'>" . TESTING . "</h1>";

    $sql = "INSERT INTO bq_user
            (score, username)
            VALUES 
            (:score, :username)";
     $np = array();
     $np[":score"]  = $_GET['score']; 
     $np[":username"]  = $_SESSION['username'];
 
    
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    //   $record = $stmt -> fetch(PDO::FETCH_ASSOC);
     
         echo json_encode($record);

  
?>


  
  
  