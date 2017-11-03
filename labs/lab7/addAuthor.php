<?php

if (isset($_GER['addForm'])){//checks if form was submitted
    include '../../dbConnection.php';
$conn = getDatabaseConnection();

    echo "Form was submitted!"; 
    
    $sql = "INSERT INTO `q_author` ( firstName, lastName,
    gender, dob, dod, 
    profession, country,
    picture, biography) VALUES 
    (:fName, :lName, :gender, :dob, :dod, :profession, :country, :picture, :biograhpy)";


$np = array();
$np[":fName"] = $_GET['firstName'];
$np[":lName"] = $_GET['lastName'];
$np[":gender"] = $_GET['gender'];
$np[":dob"] = $_GET['dob'];
$np[":dod"] = $_GET['dod'];
$np[":country"] = $_GET['country'];
$np[":profession"] = $_GET['profession'];
$np[":picture"] = $_GET['picture'];
$np[":biograhpy"] = $_GET['biograhpy'];
$stmt = $conn->prepare($sql);
$stmt->execute($np);

    echo "Author Added!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add new authors </title>
             <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
<h1>Add new author</h1>
<fieldset>
    <legend>Adding New Author</legend>
      <form>
                First Name: <input type="text" name="firstName"/> <br />
                Last Name: <input type="text" name="lastName"/> <br />  
                Gender:  
             <label>Male   <input type="radio" id="genderM" name="gender" id="male" value="M" ></label>
                <label>Felamle  <input type="radio" id="genderF" name="gender" id="female" value="F" ></label><br />
                Country: 
               <select name="country">
                    <option value="">Select a Country</option>
                   <option>France</option>
                   <option>England</option>
                   <option>USA</option>
                   <option>Germany</option>
                   <option>China</option>
                   <option>Poland</option>
                   <option>Other</option>
                </select>
                Profession: <input type="text" name="profession"/> <br />
                Day of Birth: <input type="date" name="dob"/> <br />
                Day of Death: <input type="date" name="dod"/> <br />
                Picture:<input type="text" name="picture"/> <br />
                Biography:<textarea name="biography" cols="20" rows="5"></textarea>
                <input type="submit" value"Add Author" name="addForm">
                </form>
</fieldset>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>