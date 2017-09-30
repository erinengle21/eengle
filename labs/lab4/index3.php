<?php
//API call here:
include 'api/pixabayAPI.php';
if (isset ($_GET['keyword'])){
    echo "keyword types:" . $_GET['keyword'] . "<br />";
    echo "layout selected:" . $_GET['layout'] . "<br />";
     echo "category selected:" . $_GET['category'] . "<br />";
    
    $keyword = $_GET['keyword'];
    
    if(!empty($_GET['category'])){
        $keyword = $_GET['category'];
    }
     if (isset($_GET['layout'])) {
        $imageURLs = getImageURLs($keyword, $_GET['layout']);
    } else {
         $imageURLs = getImageURLs($keyword);
    }
    
    echo "You searched for: " .$_GET['keyword'];
    
    $imageURLs = getImageURLs($_GET['keyword']);
  $backgroundImage = $imageURLs[array_rand($imageURLs)];
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pixabay Lab 4 </title>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br /><br/>

        <form>
            <input type="text" name="keyword" placeholder="keyword"/>
            <!--<input type="text" value="Submit"/>-->
            <div id="layoutDiv">
             <input id="lhorizontal" type="radio" name="layout"  value="horizontal"/>
           <label for="lhorizontal">Horizontal</label>
            <input id="lvertical" type="radio" name="layout" value="vertical"/>
            <label for="lvertical">Vertical</label>
            </div>
             <select name="category">
               <option value="">Select one</option>
                    <option value="sea">sea</option>
                         <option value="forrest">forrest</option>
                              <option value="snow">snow</option>
                              <option value="mountain">mountain</option>
                              <option value="outerspace">outerspace</option>
                 <input type="submit" name="Search!"/>
           </select>
          
        </form>
        
        <?php
          
        if (!isset($_GET["keyword"])) { //asking: is there any parameter called "keyword" in the URL
            echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
        } else {
             if(empty($_GET['keyword']) && empty($_GET['category'])){
            echo "<h2> ERROR you must select a category or type a keyword </h2>";
      return;
      exit;
             }
        }
        
        ?>
        <?php
        if (!isset($imageURLs)){
            echo "<h2> Type a keyword to display a slideshow <br /> with random images
            from Pixabay.com </h2>";
            
        }
            else {
     
                
                
                
                ?>
               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<?php
for ($i = 0; $i < 7; $i++){
    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
    echo ($i == 0)?" class='active'" : "";
    echo "></li>";
}
?>
 </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <!--<div class="item active">-->
      <!--<img src="<?=$imageURLs[0]?>" alt="...">-->
      <!--<div class="carousel-caption">-->
      <!--  ...-->
      <!--</div>-->
    <!--</div>-->\
    <?php
//     for ($i = 0; $i < 7; $i++){
//     echo "<div class='item'>";
//       echo '<img src="' . $imageURLs[0] . '">';
//      echo  '<div class="carousel-caption">';
        
//     echo  "</div>";
//  echo  "</div>";
// }
       //     //display carousel here
                for ($i = 0; $i < 7; $i++){
                    // echo "img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200'>";
              do {
                  $randomIndex = rand(0, count($imageURLs));
              }
              while(!isset($imageURLs[$randomIndex]));
            //   echo "<img src='" . $imageURLs[$randomIndex] . "' width='200' >";
                
                echo '<div class="item';
                echo ($i == 0)?"active": "";
                echo '">';
                echo '<img src="' . $imageURLs[$randomIndex] . '">';
                echo '</div>';
                unset($imageURLs[$randomIndex]); 
                }
    
    ?>
    
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
<?php
} //endElse statement
?>
        <br> 
        
        <br /><br />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    </body>
</html>