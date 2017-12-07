
<?php

 session_start();
 if (isset($_GET['addItem'])) { //checks if form was submitted
     
     include 'dbConnection.php';
     $conn = getDatabaseConnection();
     
     //echo "Form was submitted!";
     
     $sql = "INSERT INTO r_menu
            (dishTitle, ingredients, description, price, meat, dairy, gluten, vegetarian )
            VALUES 
            (:dishTitle, :ingredients, :description, :price, :meat, :dairy, :gluten, :vegetarian)";


                    
     $np = array();
     $np[":dishTitle"]  = $_GET['dishTitle'];
     $np[":ingredients"]  = $_GET['ingredients'];
     $np[":description"]  = $_GET['description'];
     $np[":price"]  = $_GET['price'];
     $np[":meat"]  = $_GET['meat'];
     $np[":dairy"]  = $_GET['dairy'];
     $np[":gluten"]  = $_GET['gluten'];
     $np[":vegetarian"]  = $_GET['vegetarian'];
  
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "New Item Added!";
     
      $sql = "INSERT INTO r_type
            (dishTitle, dishType)
            VALUES 
            (:dishTitle, :dishType)";
     $type = array();
     $type[":dishTitle"]  = $_GET['dishTitle'];
     $type[":dishType"]  = $_GET['dishType'];
        $stmt = $conn->prepare($sql);
     $stmt->execute($type);
 }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Insert New Item</title>
           <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
        <a href="adminHome.php"><button>Return to Admin Home Page</button></a>
        <?php
        echo "<h2>Hello " . $_SESSION['username'] . "!</h2>";
        ?>

        <h1> Insert New Item</h1>
        
        <fieldset>
                      <form align="center" action="logout.php">
    <input type="submit" value="Logout" />
</form> 

            <form method="GET">
                
                Dish Title: <input type="text" name="dishTitle"/> <br />
                Ingredients: <input type="text" name="ingredients"/><br/>
                Description: <br /> <textarea name="description" cols="55" rows="5"></textarea><br>
                Price: <input type="number" name="price"><br/>
                
                Contains Meat?: <input type="radio" name="meat" value="yes"
                            id="meatYes"/><label for="meatYes">yes</label>
                            <input type="radio" name="meat" value="no"
                            id="meatNo"/><label for="meatNo">No</label><br/>
                            
                Contains Dairy?: <input type="radio" name="dairy" value="yes"
                            id="dairyYes"/><label for="dairyYes">yes</label>
                            <input type="radio" name="dairy" value="no"
                            id="dairyNo"/><label for="dairyNo">No</label><br/>
                            
                Contains Gluten?: <input type="radio" name="gluten" value="yes"
                            id="glutenYes"/><label for="glutenYes">yes</label>
                            <input type="radio" name="gluten" value="no"
                            id="glutenNo"/><label for="glutenNo">No</label><br/>
                            
                Vegetarian?: <input type="radio" name="vegetarian" value="yes"
                            id="vegYes"/><label for="vegYes">yes</label>
                            <input type="radio" name="vegetarian" value="no"
                            id="vegNo"/><label for="vegNo">No</label><br/>
                         
             
              Dish Type: 
              <input type="radio" name="dishType" value="appetizer"
                            id="appetizer"/><label for="appetizer">Appetizer</label>
                            <input type="radio" name="dishType" value="mainEntre"
                            id="mainEntre"/><label for="mainEntre">Main Entre</label><br/>
                            <input type="radio" name="dishType" value="dessert"
                            id="dessert"/><label for="dessert">Dessert</label><br/>
                            <input type="radio" name="dishType" value="side"
                            id="side"/><label for="side">side</label><br/>
              
                <input type="submit" value="Insert Item" name="addItem">
            </form>
            
        </fieldset>
        
        
          <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>