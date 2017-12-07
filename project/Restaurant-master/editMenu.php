<?php
session_start();
 include 'dbConnection.php';
     $conn = getDatabaseConnection();
     
     function displayMenu(){
     global $conn;
     
     $sql = "SELECT dishTitle, ingredients, description, meat, dairy, gluten, vegetarian, price 
     FROM r_menu";
     
          $stmt = $conn->prepare($sql);
     $stmt->execute();
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){

       
        echo "<table id='menuTable' >";
            echo "<tr>";
            echo "<th>" . $record['dishTitle'] . "</th>";
            echo "<th>";
              if ($record['meat'] == yes){
       echo "<img src='img/meat.png'>";
   }
   if ($record['vegetarian'] == yes){
       echo "<img src='img/vegetarian.png'>";
   }
   if ($record['dairy'] == yes){
       echo "<img src='img/dairy.png'>";
   }
   if ($record['gluten'] == yes){
       echo "<img src='img/gluten.png'>";
   }
            
           echo "</th>";
            echo "<th> <h3> $" . $record['price'] . " </h3></th>";
            echo "<th> ";
        //  <button id='" . $record['dishTitle'] ."'>Update </button>
         echo "<button><a href='update.php?r_menu=" . $record['dishTitle']."'>Update</a> </button>";   
         echo "<form style='display:inline' action='deleteMenuItem.php' onsubmit='return confirmDelete()'>
                   <input type='hidden' name='dishTitle' value='" . $record['dishTitle']."'>
                    <input type='submit' value='Delete'>
                  </form>";
         echo "</th>";
             echo "</tr>";
             echo "<tr>";
              echo "<td>" . $record['description'] . "</td>";
              echo "</tr>"; 
              echo "<tr>";
              echo "<td>" . $record['ingredients'] . "</td>";
              echo "</tr>";
              echo "</table>";
       
      
      

      
      
      
     
      
       
       
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
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                         <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="color_animation" href="adminHome.php">Admin Home</a></li>
                             <li><a class="color_animation"  href="r_menu.php">VIEW MENU</a></li>
                             <li><a class="color_animation" action="logout.php" href="r_menu.php"> LOG OUT</a></li>
  
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                   <h2 class="top-title">Edit Menu</h2>
                   
    
                    <hr>
                </div>
            </div>
        </div>




       <!-- ============ Pricing  ============= -->

    
 <div id="menuArea">
<?= displayMenu()?>
</div>

      
        <footer class="sub_footer">
           
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this author?");
            }
        </script>
    </body>
</html>