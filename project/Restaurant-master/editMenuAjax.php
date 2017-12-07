<?php

session_start();


include 'dbConnection.php';
$conn = getDatabaseConnection();

function getItemInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM r_menu
            WHERE dishTitle = " . $_GET['dishTitle'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateMenu'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE r_menu SET 
	            dishTitle = :dishTitle,
	            description = :description,
	            ingredients = :ingredients,
	            price = :price,
	            meat = :meat,
	            dairy = :dairy,
	            gluten = :gluten,
	           vegetarian = :vegetarian
            WHERE dishTitle  = :dishTitle";
    
    $namedParameters = array();
    $namedParameters[':dishTitle'] = $_GET['dishTitle'];
    $namedParameters[':description'] = $_GET['description'];
    $namedParameters[':ingredients'] = $_GET['ingredients'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':meat'] = $_GET['meat'];
    $namedParameters[':dairy'] = $_GET['dairy'];
    $namedParameters[':vegetarian'] = $_GET['vegetarian'];
    $namedParameters[':gluten'] = $_GET['gluten'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";

    
}


if (isset($_GET['dishTitle'])) {
    
    $menuInfo = getmenuInfo();  
    
    
    
}




?>


