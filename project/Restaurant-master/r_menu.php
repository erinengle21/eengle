<?php
 include 'dbConnection.php';
     $conn = getDatabaseConnection();
     
        function searchItems(){
       global $conn;
       $sql = "SELECT dishTitle, ingredients, description, meat, dairy, gluten, vegetarian, price 
        FROM r_menu
                WHERE 1 ";
                 $namedParameters = array();
     
        
        if (!empty($_GET['searchItem'])) {     
           
      
           
           //Preventing SQL injection
           
          $sql = $sql . "AND description LIKE :searchedItem OR ingredients LIKE :searchedItem OR dishTitle LIKE :searchedItem";
           $sql = $sql . "AND description LIKE :searchedItem OR ingredients LIKE :searchedItem OR dishTitle LIKE :searchedItem";
           
           $namedParameters[":searchedItem"] = "'%" . $_GET['searchedItem'] . "%'";
           echo  $_GET['searchedItem'];
         }
              
        if (isset($_GET['dishType'])) {
        
            if ($_GET['dishType'] == 'appetizer') {
                
               $sql = $sql . " AND type = 'appetizer'";
               
            }
            else if ($_GET['dishType'] == 'mainEntre'){
                
                $sql = $sql . " AND type = 'mainEntre'";
            } 
            else if ($_GET['dishType'] == 'side'){
                
                $sql = $sql . " AND type = 'side'";
            }
            else if ($_GET['dishType'] == 'appetizer'){
                
                $sql = $sql . " AND type = 'appetizer'";
            }
        
        }
      
      
         if (isset  ($_GET['noMeat']) && isset  ($_GET['noDairy']) && isset  ($_GET['noGluten'])){
   
    $sql = $sql . "AND meat = 'no' AND dairy = 'no' AND gluten = 'no'  ";
    } 
     
   else if (isset  ($_GET['noMeat']) && isset  ($_GET['noDairy'])){
   
      $sql = $sql . "AND meat = 'no' AND dairy = 'no'"; 
    }
  
   else if (isset  ($_GET['noDairy']) && isset  ($_GET['noGluten'])){
   
          $sql = $sql . "AND dairy = 'no' AND gluten = 'no'";   
    } 
  else  if (isset  ($_GET['noMeat']) && isset  ($_GET['noGluten'])){
   
           $sql = $sql . "AND meat = 'no' AND gluten = 'no'";   
    } 
   else if (isset  ($_GET['noDairy'])){
   
         $sql = $sql . "AND dairy = 'no'"; 
    }
   else if (isset  ($_GET['noGluten'])){
   
      $sql = $sql . "AND gluten = 'no'";  
    }
       else  if (isset  ($_GET['noMeat'])){
   
    $sql = $sql . "AND meat = 'no'";   
    }   
      if (isset($_GET['cost'])) {
        
            if ($_GET['cost'] == 'highlow') {
                
               $sql = $sql . " ORDER BY price DESC";
               
            } else {
                
                $sql = $sql . " ORDER BY price ASC";
            }
        
        }
        
        // global $namedParameters;
              $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
          echo "<div id='searchResults'>";
            
     global $conn;
     
    //  $sql = "SELECT dishTitle, ingredients, description, meat, dairy, gluten, vegetarian, price 
    //  FROM r_menu";
     
          $stmt = $conn->prepare($sql);
     $stmt->execute();
    
     

       
        echo "<table id='menuTable' >";
            echo "<tr>";
            echo "<th>" . $record['dishTitle'] . "</th>";
            echo "<th>";
              if ($record['meat'] == yes){
       echo "<img src='images/meat.png'>";
   }
   if ($record['vegetarian'] == yes){
       echo "<img src='images/vegetarian.png'>";
   }
   if ($record['dairy'] == yes){
       echo "<img src='images/dairy.png'>";
   }
   if ($record['gluten'] == yes){
       echo "<img src='images/gluten.png'>";
   }
            
           echo "</th>";
            echo "<th> <h3> $" . $record['price'] . " </h3></th>";
             echo "</tr>";
             echo "<tr>";
              echo "<td>" . $record['description'] . "</td>";
              echo "</tr>"; 
              echo "<tr>";
              echo "<td>" . $record['ingredients'] . "</td>";
              echo "</tr>";
              echo "</table>";
       
      
      }
     
            echo "</div>";
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
                            <li><a class="color_animation" href="index.php">WELCOME</a></li>
                            <li><a class="navactive  color_animation" href="r_menu.php">VIEW MENU</a></li>
                    
  
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                   <h2 class="top-title">Menu</h2>
                   <div id="pollArea" class="col-md-10 col-md-offset-4">

<div id="votingArea" style="border: solid grey; width: 300px;  background-color: rgba(255, 255, 255, .6);">
    <form onSubmit="return false">
        <h3> Vote on your favorite dish:</h3> 
       <?php
        function dishVote($record){
            
        global $conn;
        $sql = "SELECT dishTitle FROM `r_type`  WHERE dishType = 'mainEntre'";
                    $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
           
   
   echo      '<input type="radio" id="' .  $record['dishTitle'] . '" name="dishPoll" value="'. $record['dishTitle'] .'"';
   echo     'id="'. $record['dishTitle'] . '"/><label for="'. $record['dishTitle'] .'">'. $record['dishTitle'] . '</label> <br>';
        $dishTitlePHP = '"' .  $record['dishTitle'] . '"'; 
        }
        }
        ?>

        <?=dishVote($record)?>
        
        
        
        
         <input type="submit"  value="Vote" class="btn btn-warning" name="submit" onClick="recordVote();">
        </form>
        <span id="voteScore"></span>
      </div>                      


</div>
    
                    <hr>
                </div>
            </div>
        </div>




       <!-- ============ Pricing  ============= -->


        <div class="container">
 <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Advanced Search</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"
        
       
        
        
       
      
    </div>
        
        </div>
       <form method="get">
                <!--<strong>Search:</strong>-->
                <!--<input type="text" name="searchedItem" value="<?=$_GET['searchedItem']?>"><br /><br />-->
                <!--<?php     echo  $_GET['searchedItem']; ?>-->
                <strong>Search by Price:</strong> <br>
                 
                <input type="radio" name="cost" id="highlow" value="highlow"
                
                <?php 
                
                 if ($_GET['cost'] == 'F') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
               <label for="highlow">HighLow</label>
               
                <input type="radio" name="cost" id="lowhigh" value="lowhigh"
                
                <?php 
                
                 if ($_GET['cost'] == 'lowhigh') {
                     echo " checked";
                 }
                 
                 ?>
                
                > <label for="lowHigh">LowHigh</label><br>
                <strong>Search by Meal Type:</strong><br>
                <input type="radio" name="dishType" id="appetizer" value="appetizer"
                
                <?php 
                
                 if ($_GET['dishType'] == 'appetizer') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
                <label for="highlow">Appetizer</label>
               
                <input type="radio" name="dishType" id="side" value="side"
                
                <?php 
                
                 if ($_GET['dishType'] == 'side') {
                     echo " checked";
                 }
                 
                 ?>
                
                >      
                 <label for="side">Side</label>
                <input type="radio" name="dishType" id="mainEntre" value="mainEntre"
                
                <?php 
                
                 if ($_GET['dishType'] == 'mainEntre') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
                <label for="mainEntre">Main Entree</label>
                
                <input type="radio" name="dishType" id="dessert" value="dessert"
                
                <?php 
                
                 if ($_GET['dishType'] == 'dessert') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
                <label for="dessert">Dessert</label>
                <br><br><strong>Show Me:</strong><br>
                <label for="noMeat">Meals with out meat</label>
                
                     <input type="checkbox" name="noMeat" id="noMeat" value="noMeat" 
                       <?php 
                
                 if ($_GET['noMeat'] == 'noMeat') {
                     echo " checked";
                 }
                 
                 ?>
                ><br>
                <label for="noDairy">Meals with out Dairy</label>
                
                     <input type="checkbox" name="noDairy" id="noDairy" value="noDairy"
                       <?php 
                
                 if ($_GET['noDairy'] == 'noDairy') {
                     echo " checked";
                 }
                 
                 ?>
                > <br>    
                <label for="noGluten">Meals with out Gluten</label>
                
                     <input type="checkbox" name="noGluten" id="noGluten" value="noGluten"
                       <?php 
                
                 if ($_GET['noGluten'] == 'noGluten') {
                     echo " checked";
                 }
                 
                 ?>
                ><br>
                </div>
               
  <input type="submit" value="filter" class="btn btn-warning" name="submit">
        </form>
        
        
     
            <?=searchItems()?>


</div>
</div>
</div>
       

      
        <footer class="sub_footer">
           
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
<script>

    function recordVote() {


var voteResult = $("input[name='dishPoll']:checked").val();

                 

            $.ajax({
                

             url: "voteAjax.php",
               dataType: "json",
               type: "GET",
              data: {
                  
                  "voteResult": voteResult
                 
                
// var voteItem = element = document.getElementById(json.dishPoll);

//  var voteResult = voteItem.prop('checked');
                
              },
             success: function(data, status) {
                   //alert(data);
        //With this, append avg score and count to page...like do select statement with count, and avg score, and append to page.
 
        //   var score = $("#testScore").find(":score").text();
        $("#testScore").html();

                },
                complete: function(data, status) { //optional, used for debugging purposes
                   //alert(status);
                    
       JSON.stringify(data);
                   
        $("#voteScore").html(data.responseText);
              }
                

     }); //ajax
}
</script>
    </body>
</html>