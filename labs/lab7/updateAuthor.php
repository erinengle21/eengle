<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

         include '../../dbConnection.php';
$conn = getDatabaseConnection();
function getAuthorInfo(){
  global $conn;

 $sql = "SELECT *
        FROM q_author";   



$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($record);

// foreach($record as $records){
//     echo $records['firstName'] . $records['lastName'] ;
// }
   
}

if (isset($_GET['authorId'])){


    $authorInfo = getAuthorInfo();
    $sql = "UPDATE q_author SET 
   firstName = :fName, 
lastName = :lName,
gender = :gender, 
country = :country, 
dob = :dob,
dod = :dod,
picture = :picture,
biography = :biography,
profession = :profession
WHERE authorId = :authorId";     //need to update all of the fields
$namedParameters = array();
$namedParameters[':fName'] = $_GET['firstName'];
$namedParameters[':lName'] = $_GET['lastName'];
$namedParameters[':gender'] = $_GET['gender'];
$namedParameters[':country'] = $_GET['country'];
$namedParameters[':dob'] = $_GET['dob'];
$namedParameters[':dod'] = $_GET['dod'];
$namedParameters[':profession'] = $_GET['profession'];
$namedParameters[':picture'] = $_GET['picture'];
$namedParameters[':biography'] = $_GET['biography'];
$namedParameters[':authorId'] = $_GET['authorId'];
$stmt = $conn->prepare($sql);
$stmt -> execute($namedParameters);
echo "Record was Updated";
}

if (isset($_GET['updateForm'])){//Admin Submitted update form
    echo "Update form was submitted!";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Author Info </title>
             <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
<h1>Upadating Author`s Info</h1>
<fieldset>
    <legend>Adding New Author</legend>
      <form>
           Author ID: <input type="hidden" name="authorId"value="<?=$authorInfo['authorId']?>"/> <br />
          
                First Name: <input type="text" name="firstName"value="<?=$authorInfo['firstName']?>"/> <br />
                Last Name: <input type="text" name="lastName"value="<?=$authorInfo['lastName']?>"/> <br />  
                Gender:  
             <label>Male   <input type="radio" id="genderM" name="gender" id="male" value="M" 
             <?=(($authorInfo['gender']== "M")?"checkrf" : "")?>
             ></label>
                <label>Felamle  <input type="radio" id="genderF" name="gender" id="female" value="F" ></label><br />
                Country: 
               <select name="country"value="<?=$authorInfo['country']?>">
                    <option value="">Select a Country</option>
                   <option>France</option>
                   <option>England</option>
                   <option>USA</option>
                   <option>Germany</option>
                   <option>China</option>
                   <option>Poland</option>
                   <option>Other</option>
                </select>
                Profession: <input type="text" name="profession"value="<?=$authorInfo['profession']?>"/> <br />
                Day of Birth: <input type="date" name="dob"value="<?=$authorInfo['dob']?>"/> <br />
                Day of Death: <input type="date" name="dod"value="<?=$authorInfo['dod']?>"/> <br />
                Picture:<input type="text" name="picture"value="<?=$authorInfo['picture']?>"/> <br />
                Biography:<textarea name="biography" cols="20" rows="5"value="<?=$authorInfo['biography']?>"></textarea>
                <input type="submit" action="admin.php" value"Update Author" name="updateForm">
                </form>
</fieldset>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>