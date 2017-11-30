<?php
session_start();


include 'dbConnection.php';


$conn = getDatabaseConnection();

  
     
     
function averageScore(){
    global $conn, $np;
      $sql = "SELECT AVG(score), COUNT(username) FROM bq_user 
      WHERE username = :username";
  

    $np[":username"]  = $_SESSION['username'];

  
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo "<h1> Average: " . $record["AVG(score)"] . " 
          and Count: " .   $record['COUNT(username)'] ."</h1>";
      }

}
averageScore();



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


  
  
  