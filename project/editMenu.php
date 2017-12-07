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
        <title> Edit Menu </title>
             <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 
    </head>
    <body>

<h1>Edit Menu page</h1>
  <a href="adminHome.php"><button>Return to Admin Home Page</button></a>
                <?php
echo "<h2>Hello " . $_SESSION['username'] . "!</h2>";
?>

       <form align="center" action="logout.php">
    <input type="submit" value="Logout" />
</form>
<div id="menuArea">
<?= displayMenu()?>
</div>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this author?");
            }
        </script>
    </body>
</html>
