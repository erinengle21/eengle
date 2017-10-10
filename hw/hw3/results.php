<?php
// names on other page are:
//     height, gender, color, dayOfWeek, firstName, lastName, email, mileTime]
function getGender(){
    $gender = $_POST["gender"];
    if ($gender ='male'){
        echo "<div id='gender'><h1>Unfortunately Womens Lacrosse has completely different rules from mens lacrosse. We apologize, but you cannot play with us.</div></h1>";
    }
    
 
     
    
}
function getName(){
   if (!isset($_POST['firstName'])){
       echo "Person";
   }
   else {
       $firstName = $_POST['firstName'];
       echo $firstName;
   }
}

   function mileTime(){
    $mileTime = $_POST['mileTime'];
   if ($mileTime <= 7){
       echo "You should be a midfielder! Midfielders are really fast.";
   }
   else if ($mileTime > 7 && $mileTime <=9.5){
       echo "you should play defense! Theyre pretty fast.";
   }
   else {
       echo "you would be a pretty good goalie!";
   }
}
function dayOfWeek(){
    $dayOfWeek = $_POST['dayOfWeek'];
    // if (!isset $dayOfWeek == "tuesday" && $dayOfWeek == "thursday"){
    if ($dayofWeek != "thursday" && dayofWeek != "tuesday"){
     echo "You cannot play with us because you are not available. We only practice on Tuesdays and Thursdays. Sorry.";   
    }
    else {
        echo "Yay! It looks like you are available to play. We practice 12-2 on Tuesdays and Thursdays";
    }
}
function colorStick(){
 $color = $_POST['color'];
 echo "<img src='img/" .$color . ".jpg' height='300px' width='250px'>";
}
    
    

?>

 <!DOCTYPE html>
<html>
    <head>
        <title> Results</title>
                      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--<link href="SmartWizard-master/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" /> -->
          <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="results">
<?php 



getGender();



 ?>
 
 <br>
<h3>Hello <?=getName()?>! Based on your height and speed, it looks like <?=mileTime()?> </br> If you feel like you would like to play on the team, and would like your
own stick, here is a nice one: <?= colorStick()?><br><?=dayOfWeek()?></h3>
</div>
    </body>
</html>