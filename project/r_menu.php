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
        <title>Menu </title>
             <link rel="stylesheet" type="text/css" href="css/r_menu.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
        <div id="backButton"><a href="index.php"><button type="button" class="btn btn-warning">Welcome Screen</button></a></div>
<div id="menuHeader">Menu</div>
<div class="row">
    <div id="pollArea" class="col-md-4 col-md-offset-8">

<div id="votingArea" style="border: solid blue">
    <form onSubmit="return false">
         Vote on your favorite dish: <br>
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
                <strong>Search:</strong>
                <input type="text" name="searchedItem" value="<?=$_GET['searchedItem']?>"><br /><br />
                <?php     echo  $_GET['searchedItem']; ?>
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


</div>
</div>
</div>


        <hr />
  
 



     
            <?=searchItems()?>
       

</div>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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



<!--EXAMPLE OF HOW TO GET RADIO VALUE-->
<!--$("input[name="dishTitle"]:checked").val();--> 
