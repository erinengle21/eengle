<?php
session_start();


include 'dbConnection.php';


$conn = getDatabaseConnection();

  
     
     
function averageVote(){
    global $conn, $np;
      $sql = "SELECT dishTitle, COUNT(dishTitle) FROM votes
      WHERE dishTitle = :voteResult 
 ORDER BY dishTitle ASC";
  
 $np = array();
    $np[":voteResult"]  = $_GET['voteResult'];

  
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo "<h1>Your Vote: " .  $record['dishTitle'] ."</h1>";
      }

}
averageVote();



    $sql = "INSERT INTO votes
            (dishTitle)
            VALUES 
            (:voteResult)";
     $np = array();
     $np[":voteResult"]  = $_GET['voteResult']; 
  
 
    
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    //   $record = $stmt -> fetch(PDO::FETCH_ASSOC);
     
         echo json_encode($record);

  
?>


  
  
  