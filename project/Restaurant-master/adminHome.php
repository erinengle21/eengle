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
      $sql = "SELECT partyName, COUNT(partyName), guests
  FROM r_reservation WHERE day = CURDATE() - 1
 GROUP BY  partyName";
 
 
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    echo "<h4>Tonight's Reservations: </h4>";
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
     
          echo "<h4> Party Name: " .  $record['partyName']  . "<br> amount of guests: " .   $record['guests'] ."</h4><br>";
    
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
     
            echo "<h4> Amount of reservations: " .  $record['COUNT(partyName)'] . "<br>Total amount of guests: " .  $record['COUNT(guests)'] . "</h4>";
    
}
 
}



?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Restaurant</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
  
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Pluto's Place</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href="adminHome.php">Admin Home</a></li>
                             <li><a class="color_animation"  href="editMenu.php">EDIT MENU</a></li>
                             <li><a class="color_animation"  href="insertItem.php">INSERT NEW MENU ITEM</a></li>
                             <li><a class="color_animation" action="logout.php" href="r_menu.php"> LOG OUT</a></li>
  
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                   <h2 class="top-title"><?php echo "<h1 style='color: white;'>Hello " . $_SESSION['username'] . "!</h1>";?></h2>
 <div class="row">
  <div id="itemVotes" class="col-md-6 "style="border: solid grey; width: 300px;  background-color: rgba(255, 255, 255, .6);">
 <?=voteCount();?>
</div> 
<div id="reservationTotal" class="col-md-6 col-md-offset-3 "style="border: solid grey; width: 300px;  background-color: rgba(255, 255, 255, .6);">
  <?=reservationCount();?>
    <?=reservationInfo();?>
  
</div>
    
 </div>
 

    
                    <hr>
                </div>
            </div>
        </div>




       <!-- ============ Pricing  ============= -->


       
        
     
     


       

      
        <footer class="sub_footer">
           
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>

    </body>
</html>