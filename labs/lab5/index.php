<?php
$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we will be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

// Establishing a connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

function getMaleAuthors(){
$sql = "SELECT * FROM q_author WHERE gender = 'M'";
global $dbConn;

$stmt = $dbConn -> prepare ($sql); 
//  $stmt -> execute (  array ( ':id' => '1')  );
$stmt -> execute();
$records = $stmt -> fetchAll();
// foreach($records as $record) {
//     echo $record['firstName'] . "  " . $record['lastName'] . "<br />";
// }
// print_r($records);
  
while ($row = $stmt -> fetch())  {
    echo  $row['firstName'] . ", " . $row['lastName'] . $row['gender'] .  '</br>';}
}
//Below works but it is very time consuming because you are retrieving all of the quotes, but then only 
//disoplaying one...it is not very efficient
// function getRandomQuotes(){
//     // $sql = "SELECT * FROM q_author WHERE gender = 'M'";
// global $dbConn;
// $sql = "SELECT quote FROM q_quote";
// $stmt = $dbConn -> prepare ($sql); 
// //  $stmt -> execute (  array ( ':id' => '1')  );
// $stmt -> execute();
// $records = $stmt -> fetchAll();
// foreach($records as $record) {
//     echo $record['firstName'] . "  " . $record['lastName']. $row['quote'] .  '</br>';
// }
// shuffle($records);
// echo $records[0]['quote'];
// // print_r($records);
  
// while ($row = $stmt -> fetch())  {
//     echo  $row['firstName'] . ", " . $row['lastName'] . $row['quote'] .  '</br>';}
// }

function getRandomQuotes(){
 
global $dbConn;

//retrieve all quote ids
//select one id randomy
//get the quote for that quote id
$stmt = "SELECT quoteId FROM q_quote ";


//step 1: generating a random quote


$sql = "SELECT quote FROM q_quote";
$stmt = $dbConn -> prepare ($sql); 
//  $stmt -> execute (  array ( ':id' => '1')  );
$stmt -> execute();
$records = $stmt -> fetchAll();

// $randomIndex = rand(0, count($records) - 1) ;
// Above and below do the same thing
$randomIndex = array_rand($records);
echo ($records[$randomIndex]['quoteId']);

$quoteId = $records[$randomIndex]['quoteId'];

//step 2: retreiving quite based on random quote Id

$sql = "SELECT *
FROM q_quote
WHERE quoteId = $quoteId";
$tmt = $dbConn -> prepare ($sql);
$stmt -> execute();
$records = $stmt -> fetch(); //using fetch() because its expected to get ONLY ONE record

echo $record['quote'];

// foreach($records as $record) {
//     echo $record['firstName'] . "  " . $record['lastName']. $row['quote'] .  '</br>';
// }
// shuffle($records);
// echo $records[0]['quote'];
// // print_r($records);
  
// while ($row = $stmt -> fetch())  {
//     echo  $row['firstName'] . ", " . $row['lastName'] . $row['quote'] .  '</br>';}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Quote Generator</title>
    </head>
    <body>


<?= getRandomQuotes()?>

    </body>
</html>