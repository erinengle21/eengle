
<?php

/*$deck = array();

for($i=1; $i<53; $i++){
  $deck[$i] = $i;
} 
*/

$deck = range(1,41);
shuffle($deck);

$totalPoints = 0;

function displayHand() {
    global $deck, $totalPoints;
    $handPoints = 0;
    $handAces = 0;
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 13;
        $cardSuit;
        if($lastCard <= 13) {
            $cardSuit = "clubs";
        } else if($lastCard > 13 && $lastCard <= 26) {
            $cardSuit = "diamonds";
        } else if($lastCard > 26 && $lastCard <= 39) {
            $cardSuit = "hearts";
        } else if($lastCard > 39) {
            $cardSuit = "spades";
        }
        if($cardValue == 0) {
            $cardValue = 13;
        }
        if ($cardValue == 1) {
            echo "<img class='ace' src='img/$cardSuit/$cardValue.png' alt='Ace' />";
       $handAces = $handAces + 1;
       //or $handAces++; does same thing <--this is usually better, lets be honest
        }
        else {
            echo "<img src='img/$cardSuit/$cardValue.png' alt='Ace' />";
        }
        // echo " points " . $handPoints;
        // echo " Acs: " . $handAces;
        // echo $lastCard % 13 . " ";
        $handPoints = $handPoints + $cardValue;
        //$handPoints += $cardValue;   shortcut to add value
        
        //  echo "<img class='ace' src='img/$cardSuit/$cardValue.png' alt='Ace' />";
    } //ending for loop
    
    echo '<div class="pointStyle">' . "Points: " . $handPoints . '</div>';
    
    $totalPoints = $totalPoints + $handPoints;
    
    return $handAces;
    
}

function identifyWinner(){
    global $player1Aces, $player2Aces;
    
      if ($player1Aces > $player2Aces){
        echo "Player 1";
    }
    else if ($player1Aces < $player2Aces) {
        echo "Player 2";
    } else {
        echo "Nobody";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
     <link  href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <div id="content">
    <h1>Ace Poker</h1>
    <h2>Player with more aces wins all points</h2>
    <div id="game">
   <p>Player 1</p>
    <?php
    
   $player1Aces = displayHand();
    ?>
    <br>
      <p>Player 2</p>
    <?php
   $player2Aces =  displayHand();
    ?>
     <h2>
    <?php 
identifyWinner($player1Aces, $player2Aces);
    ?>
    
   Wins:
    <?=$totalPoints?> points!
    
    </h2>
    </div>
</div>
    </body>
</html>