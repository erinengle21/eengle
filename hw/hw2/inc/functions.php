<?php

//it will be array.push each time a player wins a round.
//create array for human for points
//create array for computer for points
//human will display one random
//computer will display one random
//

function displayItem($humPlay, $comPlay){
$gameArray = array("rock", "paper", "scissors");
 
    echo "<img  src='img/" . $gameArray[rand(0,2)] . ".jpg' alt=' $gameArray' height='150px;'/>";

}


displayItem($humPlay, $comPlay);




playGame($humPlay, $comPlay);

function displayScore($humPlay, $comPlay){
   



$humScore = array("");
$comScore = array("");


echo '<div id=#computer>' . print_r($humScore) .'</div>';
echo '<div id=#computer>' . print_r($comScore) .'</div>';

if ($humPlay == rock && $comPlay == scissors) {
array_push($humScore,"X"); //human gets points

}
else if ($humPlay == rock && $comPlay == paper) {
array_push($comScore,"X"); //computer gets points

}
else if ($humPlay == scissors && $comPlay == paper) {
array_push($humScore,"X"); //human gets point

}

}



function playGame($humPlay, $comPlay){
if (count($comScore)  > 2){
echo "Computer Wins!";
}
else if ( count($humScore) > 2) {
echo "Human Wins!";
}
else {
echo "It's a tie! Try again.";
}

   for ($i = 1; $i < 2; $i++){ //Without this for loop, images would not display.
            ${"value" . $i} = rand (1, 3);
            displayItem(${"value" . $i}, $i);
        }


}

?>