
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
                   <h2 class="top-title">Insert New Menu Item!</h2>
                   
    
                    <hr>
                </div>
            </div>
        </div>




       <!-- ============ Pricing  ============= -->


  <form method="GET" style="text-align: center; margin-top: 10px;">
                
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
                            <input type="radio" name="dishType" value="mainEntree"
                            id="mainEntre"/><label for="mainEntre">Main Entre</label><br/>
                            <input type="radio" name="dishType" value="dessert"
                            id="dessert"/><label for="dessert">Dessert</label><br/>
                            <input type="radio" name="dishType" value="side"
                            id="side"/><label for="side">side</label><br/>
              
                <input type="submit" value="Insert Item" name="addItem">
            </form>
            
        </fieldset>
        
    
 
      
        <footer class="sub_footer">
           
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
        
    </body>
</html>