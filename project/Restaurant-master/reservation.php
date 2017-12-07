<?php

include 'dbConnection.php';
$conn = getDatabaseConnection();


     
     
function nameReservation(){
    global $conn, $np;
    
      $sql = "SELECT partyName FROM r_reservation WHERE partyName = :partyName";
  
  $namedParameters = array();
     $namedParameters[":partyName"]  = $_GET['partyName']; 
  
     $stmt = $conn->prepare($sql);
     $stmt->execute($namedParameters);
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo "<h3> Your reservation has been made for: " . $record["partyName"] . "</h3>";
      }

}
nameReservation();



    $sql = "INSERT INTO r_reservation 
            (partyName,	day, time,	guests,	event,	notes)
            VALUES 
            (:partyName, :partyDate, :partyTime, :amountPeople, :event, :notes)";
            
     $np = array();
     $np[":partyName"]  = $_GET['partyName']; 
     $np[":partyDate"]  = $_GET['partyDate']; 
     $np[":partyTime"]  = $_GET['partyTime']; 
     $np[":amountPeople"]  = $_GET['amountPeople']; 
     $np[":event"]  = $_GET['event']; 
     $np[":notes"]  = $_GET['notes']; 
  
     
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
      $record = $stmt -> fetch(PDO::FETCH_ASSOC);
     
         echo json_encode($record);

  


?>