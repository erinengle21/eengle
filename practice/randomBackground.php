<?php
function displayRandomColor(){
    
    return "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", " . (rand(0, 10)/10) . ") }";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta chartset= "utf-8">
        <title>Random Background Color </title>
        
        <style>
            body {
                /*background-color: rgba(200, 15, 15, .6);*/
                <?php
                // $red = rand(0, 255);
                // $green = rand(0, 255);
                // $blue =  rand(0, 255);
            //   $alpha =  (rand(0, 10)/10);
                
                
                // echo "background-color: rgba($red, $green, $blue, $alpha);" //THIS WAY IS MUCH BETTER!!
                // OR
                    //  echo "background-color: rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", " . (rand(0, 10)/10) . ")";
                   echo "background-color: " . displayRandomColor() . ";";            
                     
                    
                ?>
            }
            h1{
                <?php 
                //  echo "color: rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", " . (rand(0, 10)/10) . ") }";
                 echo "color: " . displayRandomColor() . ";";  
                ?>
                
            }
            h2 {
                background-color: <?=displayRandomColor()?>;
                color: <?=displayRandomColor()?>;
            }
        </style>
    </head>
    <body>
<h1>Welcome!</h1>
<h2>hello</h2>
    </body>
</html>