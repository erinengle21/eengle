<?php

session_start();

include 'dbConnection.php';
$conn = getDatabaseConnection();

function getMenuInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM r_menu
            WHERE dishTitle = '" .  $_GET['dishTitle'] . "'";  
            
            // $np = array();
            //  $np[':dishTitle'] = $_GET['dishTitle'];
           
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    // $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE r_menu SET 
	            dishTitle = :dishTitle,
	            ingredients = :ingredients,
	            description = :description,
	            price = :price
            WHERE dishTitle = :dishTitle";
    
    $namedParameters = array();
    $namedParameters[':dishTitle'] = $_GET['dishTitle'];
    $namedParameters[':ingredients'] = $_GET['ingredients'];
    $namedParameters[':description'] = $_GET['description'];
    $namedParameters[':price'] = $_GET['price'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";

    
}


if (isset($_GET['dishTitle'])) {
    
    $menuInfo = getMenuInfo();  
    
    //print_r($authorInfo);
    
}


?>


<!DOCTYPE html>
<html>
    <head>
          <a href="editMenu.php"><button>Return to Menu Page</button></a>
        <title> Update Author's Info </title>
           <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <h1> Updating Menu Item </h1>
                <?php
echo "<h2>Hello " . $_SESSION['username'] . "!</h2>";
?>
        <br/>
               <form align="center" action="logout.php">
    <input type="submit" value="Logout" />
</form>

         <br/>
        <fieldset>
            
            
            <form>
                
                
            Item: <?php echo $menuInfo['dishTitle'];?> <br><br>
                 
                Dish Title: <input type="text" name="dishTitle" value="<?=$menuInfo['dishTitle']?>" /> <br />
                Ingredients: <input type="text" name="ingredients" value="<?=$menuInfo['ingredients']?>"/> <br />
               Description: <input type="text" name="description" value="<?=$menuInfo['description']?>"/> <br />
               Price: <input type="text" name="price" value="<?=$menuInfo['price']?>"/> <br />
            
                <input type="submit" value="Update Item" name="updateForm">
            </form>
            
        </fieldset>
        
    </body>
</html> 