<?php

$backgroundImage = "img/sea.jpg";

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4. Pixabay Slideshow </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url('css/styles.css');
            
            body {
                background-image: url('<?=$backgroundImage?>');
            }
            
        </style>
        
    </head>
    <body>

       <?php
       
       if (isset($_GET["keyword"]) ) { // is there a parameter called "keyword" as part of the URL
         //echo  "keyword typed: " . $_GET["keyword"];
         
         include 'api/pixabayAPI.php';
         $imageURLs = getImageURLs($_GET['keyword']);
         print_r($imageURLs);
         
         //do a for loop 1 0 to 5 and display the last 5 images in the array:
         
         for ($i = 0; $i < count; $i++) {
             $imageName = array_pop($imageURLs);
             echo "<img src='$imageURLs.jpg'>";
         }
         
       }
       
       
        if (!isset($imageURLs)) {  //if form hasnt been submitted
            
          echo "<h2> Type a keyword to display a slideshow 
                with random images from Pixabay.com </h2>" ;   
            
        } 
        
        ?>



        <form method="GET">
            
            <input type="text" name="keyword" placeholder="Type keyword"/>
            <input type="submit" />
            
        </form>        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    </body>
</html> 