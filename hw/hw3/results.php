<?php
// names on other page are:
//     height, gender, color, dayOfWeek, firstName, lastName, email, mileTime]
function getGender(){
    $gender = $_POST["gender"];
    if ($gender == male){
        echo "Unfortunately Womens Lacrosse has completely different rules from mens lacrosse. We apologize, but you cannot play with us. Goodbye!";
    }
  
     
    
}
function getName(){
    //email
   //firstName
   //lastName
   //Dont need function for these...just want to get the info
   if (!isset($_POST['firstName'])){
       echo "Person";
   }
   else {
       $firstName = $_POST['firstName'];
       echo $firstName;
   }
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

echo $_POST['dayOfWeek'];

getGender();



 ?>
 
 <br>
<h3>Hello <?=getName()?>! Based on your mile time, it looks like <?=mileTime()?> </br> If you feel like you would like to play on the team, and would like your
own stick, here is a nice one: <?= colorStick()?></h3>
</div>
    </body>
</html>