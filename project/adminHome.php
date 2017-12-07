<?php
session_start();


include 'dbConnection.php';


$conn = getDatabaseConnection();

function voteCount(){
    global $conn;
      $sql = "SELECT dishTitle, COUNT(dishTitle)
  FROM votes
 GROUP BY  dishTitle
 ORDER BY dishTitle ASC";
  

    

  
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    echo "<h4>Dishes voted on: </h4>";
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
    
         
          echo "<h4> " .  $record['dishTitle']  . " Count: " .   $record['COUNT(dishTitle)'] ."</h4>";
    
}
 
}
//for reservation count
function reservationInfo(){
    global $conn;
      $sql = "SELECT COUNT(partyName), guests
  FROM r_reservation WHERE day = CURDATE() - 1
 GROUP BY  partyName";
 
 
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    echo "<h4>Tonight's Reservations: </h4>";
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
     
          echo "<h4> Party Name: " .  $record['partyName']  . " amount of guests: " .   $record['guests'] ."</h4>";
    
}
 
}
function reservationCount(){
    global $conn;
      $sql = "SELECT COUNT(partyName), COUNT(guests)
  FROM r_reservation WHERE day = CURDATE() - 1";
  
 
 
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    echo "<h4>Tonight's Reservations: </h4>";
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
     
            echo "<h4> Amount of reservations: " .  $record['COUNT(partyName)'] . "Total amount of guests: " .  $record['COUNT(guests)'] . "</h4>";
    
}
 
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home </title>
             <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
        <form align="center" action="logout.php">
    <input type="submit" value="Logout" />
</form>
            <?php
echo "<h2>Hello " . $_SESSION['username'] . "!</h2>";
?>

 <a href="editMenu.php"><button type="button" class="btn btn-info btn-lg" >Edit Menu Items</button></a>
 <a href="insertItem.php"><button type="button" class="btn btn-info btn-lg" >Insert New Menu Items</button></a>
 
 <div id="itemVotes">
    <?=voteCount();?>
    <?=reservationInfo();?>
    <?=reservationCount();?>
 </div>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>