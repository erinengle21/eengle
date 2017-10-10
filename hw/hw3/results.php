<?php
// --------END LAB 4 EXAMPLE
// names on other page are:
//     height, gender, color, dayOfWeek, firstName, lastName, email, mileTime]
function getGender(){
    $gender = $_POST["gender"];
    if ($gender == male){
        echo "Unfortunately Womens Lacrosse has completely different rules from mens lacrosse. We apologize, but you cannot play with us. Goodbye!";
    }
    else {
        function mileTime(){
    $mileTime = $_POST['mileTime'];
   if ($mileTime <= 7){
       echo "Wow Youre Fast! you should be a midfielder!";
   }
   else if ($mileTime > 7 && $mileTime <=9.5){
       echo "Youre pretty Fast! you should play defense!";
   }
   else {
       echo "We think you would be a pretty good goalie!";
   }
}
function dayOfWeek(){
    //dayOfWeek
    $dayOfWeek = $_POST['dayOfWeek'];
    // if (!isset $dayOfWeek == "tuesday" && $dayOfWeek == "thursday"){
    if ($dayofWeek != "thursday" && dayofWeek != "thursday"){
     echo "You cannot play with us because you are not available";   
    }
}
function colorStick(){
    //favoritecolor
 $color = $_POST['color'];
 echo "<img src='img/" .$color . ".jpg' height='300px' width='250px'>";
}
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
   }
}



?>

 <!DOCTYPE html>
<html>
    <head>
        <title> Results</title>
    </head>
    <body>
<?php echo $_POST['firstName'];
echo $_POST['lastName'];
echo $_POST['gender'];
echo $_POST['height'];
echo $_POST['dayOfWeek'];

getGender();
mileTime();
colorStick();

 ?>
 
 <br>
<p>Hello <?=getName()?>!</p>
    </body>
</html>