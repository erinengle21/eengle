<?php

   include '../../dbConnection.php';
   $conn = getDatabaseConnection();
   
   function displayCountryOptions() {
       global $conn;
       $sql = "SELECT DISTINCT(country) 
                FROM `q_author` 
                ORDER by country";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            echo "<option ";
            if ( $record['country'] == $_GET['country']){
                echo "selected";
            } 
         echo ">" . $record['country'] . "</option>";
        }
        
   }
   
   
    function displayCategoryOptions() {
       global $conn;
       $sql = "SELECT DISTINCT(category)
                FROM `q_category` 
                ORDER BY category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            echo "<option";
               if ( $record['category'] == $_GET['category']){
                echo "selected";
            }
            
            echo ">" . $record['category'] . "</option>";
        
        }
        
   }
   
   function displayQuotes(){
       global $conn;
       $sql = "SELECT firstName, lastName, quote, country
                FROM q_author
                NATURAL JOIN q_quote
                NATURAL JOIN q_category
                WHERE 1";
                
        $namedParameters = array();
        
        if (!empty($_GET['content'])) { //user typed something for quote content      
           
           //The following sql works BUT it allows SQL Injection!!
           //$sql = $sql . " AND quote LIKE '%".$_GET['content']."%'";
           
           //Preventing SQL injection
           $sql = $sql . " AND quote LIKE :quoteContent"; //using named parameters to avoid SQL injection
           $namedParameters[":quoteContent"] = "%" . $_GET['content'] . "%";
        }
        
        
        if (isset($_GET['gender'])) { //gender was checked by the user
            
            $sql = $sql . " AND gender = :gender ";
            $namedParameters[':gender'] = $_GET['gender'];
            
            
        }
        
        
        if (isset($_GET['orderBy'])) {
        
            if ($_GET['orderBy'] == 'orderByAuthor') {
                
               $sql = $sql . " ORDER BY lastName";
               
            } else {
                
                $sql = $sql . " ORDER BY quote";
            }
        
        }
            if (isset($_GET['country'])) {
            
            $sql = $sql . " AND country = :country ";
            $namedParameters[':country'] = $_GET['country'];
            
            
        }
                 if (isset($_GET['category'])) {
            
            $sql = $sql . " AND category = :category ";
            $namedParameters[':category'] = $_GET['category'];
            
            
        }
                
        //echo $sql . "<br><br>";    
        
        
                
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<div id='quoteSection'>";
            echo "<em>" . $record['quote'] . "</em> <br /> &mdash; " . $record['firstName'] . " " . $record['lastName'] . "<br />";
            echo "</div>";
        }                
                
       
       
   }
     
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6: Quote Finder</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Quote Finder</h1>
        <div class="row">
            <div class="col-md-4">
                <h2> Please enter some <br>quote guidelines:</h2>
        <form method="get">
                <strong>Quote Content:</strong>
                <input type="text" name="content" value="<?=$_GET['content']?>"><br/>
                <strong>Author's Gender:</strong>
                <input type="radio" name="gender" id="female" value="F"
                <?php
                if ($_GET['gender'] == 'F'){
                echo " checked";                    
                }?>
                 >
                <label for="female">Female</label>
                <input type="radio" name="gender" id="male" value="M" 
                <?php
                if ($_GET['gender'] == 'M'){
                echo " checked";                    
                }?>
                >
                <label for="male">Male</label><br/>
                <strong>Author's Birthplace:</strong>
                <select name="country">
                    <option value="">Select a Country</option>
                    <?=displayCountryOptions()?>
                </select><br/>
                <strong>Category:</strong>  
                <select name="category">
                    <option value="">Select a Category</option>
                    <?=displayCategoryOptions()?>
                </select><br/>
                
                Order by: 
                 <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor"
                   <?php
                if ($_GET['orderBy'] == 'orderByAuthor'){
                echo " checked";                    
                }?>>
                <label for="orderByAuthor">Author</label>
                 <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote"
                    <?php
                if ($_GET['orderBy'] == 'orderByQuote'){
                echo " checked";                    
                }?>>
                <label for="orderByQuote">Quote</label>   <br />             
                <input type="submit" value="Filter" name="submit">
        </form>     
       </div>

    
        <div id="quotes" class="col-md-8">
            <h2>Quotes:</h2>
            <?=displayQuotes()?>
            
            
        </div>
        </div>
<footer>
        &copy; Erin Engle
    </footer>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>