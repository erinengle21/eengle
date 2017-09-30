<?php
$backgroundImage = "img/sea.jpg";
 
    //   if (isset($_GET["keyword"]) ) { // is there a parameter called "keyword" as part of the URL
    //      //echo  "keyword typed: " . $_GET["keyword"];
         
    //      include 'api/pixabayAPI.php';
    //      $imageURLs = getImageURLs($_GET['keyword']);
    //      print_r($imageURLs);
         
    //      //do a for loop 1 0 to 5 and display the last 5 images in the array:
         
    //      for ($i = 0; $i < count; $i++) {
    //          $imageName = array_pop($imageURLs);
    //          echo "<img src='$imageURLs.jpg'>";
    //      }
         
    //   }
       
       
    //     if (!isset($imageURLs)) {  //if form hasnt been submitted
            
    //       echo "<h2> Type a keyword to display a slideshow 
    //             with random images from Pixabay.com </h2>" ;   
            
    //     } 
        // ----------old stuff from original index above
// function getImages() {

if ( isset($_GET['keyword']) ) {
    
    echo "keyword typed: " .  $_GET['keyword'] . "<br />";
     echo "layout selected: " .  $_GET['layout'] . "<br />";
     echo "category selected:" . $_GET['category'] . "<br />";

    include 'api/pixabayAPI.php';
   
   if (!empty($_GET['category'])){//an option was selected in drop down menu
       $keyword = $_GET['category'];
   }
   
    //  $imageURLs = getImageURLs($_GET['keyword'], "horizontal");   
    //print_r($imageURLs);
    
    if (isset($_GET['layout'])){
         $imageURLs = getImageURLs($_GET['keyword'],  $_GET['layout']);

    }
    else {
        $imageURLs = getImageURLs($_GET['keyword']); 
    }
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        
        
        <form>
            <!--//every form element must have a name-->
            <input type="text" name="keyword"/>
            <input id="lhorizontal" type="radio" name="layout"  value="horizontal"/>Horizontal
           <label for="lhorizontal">Horizontal</label>
           <label for="lvertical">Vertical</label>
            <input id="lvertical" type="radio" name="layout" value="vertical"/>   Vertical
           <select name="category">
               <option value="">Select one</option>
                    <option value="ocean">sea</option>
                         <option value="">forrest</option>
                              <option value="">snow</option>
               
           </select>
           
           
            <input type="submit" name="Search!"/>
            
        </form>
        
        <?php
        
       
        
        
        
        if (!isset($_GET["keyword"])) { //asking: is there any parameter called "keyword" in the URL
            echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
        } else {
             if(empty($_GET['keyword']) && empty($_GET['category'])){
            echo "<h2 style='color: 'red'> ERROR you must select a category or type a keyword </h2>";
       return;
       exit;
        }
        
            
            //user has submitted the form!
            
            //echo "carousel of images should be displayed here!";
            
            //getImages();
            
            // shuffle($imageURLs);
            
            echo "<img src='$imageURLs[0]' width='200'>";
            echo "<img src='$imageURLs[1]' width='200'>";
            echo "<img src='$imageURLs[2]' width='200'>";
            
            
        }
        
        ?>
        
                     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?=$imageURLs[0]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                <div class="item">
                  <img src="<?=$imageURLs[1]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                <div class="item">
                  <img src="<?=$imageURLs[2]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>                
                ...
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    </body>
</html>