<?php

      
         function displaySymbol($randomValue, $pos){
         
        //  //to generate a random symbol:
        //  $randomNumber = rand(1, 5); //will generate random number from 0-5
      
        
        // if ($randomNumber == 1) {
        // $symbol = "<img src='img/seven.png' alt='Seven' width='70px;' title='Seven' height='70px;'/>";
      
        // }
        // else if ($randomNumber == 2) {
        //      $symbol = "<img src='img/cherry.png' alt='Cherry' width='70px;' title='Cherry' height='70px;'/>";
            
        // }
        //   else if ($randomNumber == 3) {
        //      $symbol = "<img src='img/lemon.png' alt='lemon' width='70px;' title='lemon' height='70px;'/>";
            
        // }
        //   else if ($randomNumber == 4) {
        //      $symbol = "<img src='img/orange.png' alt='orange' width='70px;' title='Orange' height='70px;'/>";
            
        // }
        //   else if ($randomNumber == 5) {
        //      $symbol = "<img src='img/grape.png' alt='grape' width='70px;' title='grape' height='70px;'/>";
          
        // }
        // echo $symbol;
       
        switch($randomValue){
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "grape";
            break;
            case 2: $symbol = "cherry";
            break;
            case 4: $symbol = "lemon";
            break;
            case 5: $symbol = "orange";
            break;
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' width='70px;' title='" . ucfirst($symbol) . "' height='70px;'/>";
         }
         

       
       
       function displayPoints($randomValue1, $randomValue2, $randomValue3){
            
          
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1)
          {
           case 0: $totalPoints = 1000;     
           echo "<h1> Jackpot!</h1>";
           break;
           case 1: $totalPoints = 500;
           break;
           case 2: $totalPoints = 250;
           break;
            }
            echo "<h2>You Won $totalPoints points! </h2>";
                
        }
        else {
            echo "<h2> Try again!</h3>";
        }
        echo "</div>";
            
        }
           function play(){
     
      for ($i = 1; $i < 4; $i++){ //Without this for loop, images would not display.
            ${"randomValue" . $i} = rand (0, 2);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        
        displayPoints($randomValue1, $randomValue2, $randomValue3); //must call function right after for loop.
 };


?>