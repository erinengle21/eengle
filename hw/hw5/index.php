 <?php
 session_start();
include 'dbConnection.php';

// include 'hw5Ajax.php';
$conn = getDatabaseConnection();


 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homework 5 </title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <script>
//         function displayAjax() {
//             //alert($("#username").val());
//             $.ajax({
                

//               type: "GET",
//              url: "hw5Ajax.php",
//               dataType: "json",
//             //   data: { "username":$("#username").val()},
//               data: { },
//              success: function(data, status) {
//                   //alert(data);
//             //   $("body").html($_GET['username']);

//                 },
//                 complete: function(data, status) { //optional, used for debugging purposes
//                   //alert(status);
//               }

//      }); //ajax
     
        
//   }
//   displayAjax();
  
    </script>
    
    </head>
    <body>
<h3>Bear Quiz</h3>


<div id="container" class="row">
  
<form  onSubmit="return false">
    <span id="averageScore"></span>
   <span id='score'></span>
  
    
    <?php
echo "<h2>Hello " . $_SESSION['username'] . "!</h2>";
?>

 <span name="testScore" id="testScore"></span>
    <br>
    <label>Which of these is not a species of bear?</label>
    <br>
    <select name="species" id="speciesType" class="speciesName" type="text" form="species">
  <option value="asiaticBear">Asiatic Bear</option>
  <option value="giantPanda">Giant Panda</option>
  <option value="polarBear">Polar Bear</option>
  <option value="spectacledBear">Spectacled Bear</option>
  <option value="moonBear">Moon Bear</option>
  <option value="blackBear">Black Bear</option>
  <option value="brownBear">Brown Bear</option>
  <option value="sunBear">Sun Bear</option>
  <option value="slothBear">Sloth Bear</option>
</select>
  <p>Your input was: </p><span id="speciesBear"></span><!--Put answer here//hide until submit-->
<br>

 <label>How many species of bears exist?</label> 
    <input type="text" id="speciesNum" name="speciesNum"  maxlength="5" size="5"/> 
    <p>Your input was: </p><span id="speciesNumber"></span><!--Put answer here//hide until submit-->

<br>

 <label>
    Sow, is the name for a <input type="text" id="femaleName" name="bearName" maxlength="7" size="7"/> bear.
    
</label>
  <p>Your input was: </p><span id="bearName"></span><!--Put answer here//hide until submit-->

<br>
<label>What is the name for a young bear?</label>
<br>



<div id="radio">
 <input class="form-check-input" type="radio" name="youngBear" id="littleBear1"  value="joey" >
  Joey
  </label>
  <br> 
  <input class="form-check-input" type="radio" name="youngBear" id="littleBear2"  value="cub">
  Cub
  </label>
  <br> 
  <input class="form-check-input" type="radio" name="youngBear"id="littleBear3"  value="fawn" >
  Fawn
  </label>
  </div>
    <p>Your input was: </p><span id="babyBear"
    l></span><!--Put answer here//hide until submit-->
  <br>
  

  
  
  
  
    <label>What is the best way to escape a grizzly bear?</label>
    <br>
    <select id="escapeGrizzly" name="escapeGrizzly" form="escapeGrizzly">
  <option value="1">Climb up a tree</option>
  <option value="2">Do not run, and play Dead</option>
  <option value="3">Stand your ground, and fight back</option>
  </select>
  <br>
    <p>Your input was: </p><span id="grizzlyBear"></span><!--Put answer here//hide until submit-->
    <br>  
    <label>What is the best way to escape a black bear?</label>
    <br>
    <select id="escapeBlack" name="escapeBlack" form="escapeBlack">
  <option value="1">Do not run, and play Dead</option>
  <option value="2">Climb up a tree</option>
  <option value="3">Stand your ground, and fight back</option>
  </select>
  <br>
    <p>Your input was: </p><span id="blackBear"></span><!--Put answer here//hide until submit-->
    <br>
  
  

  <label>What day of the year (in 2017) Was National Bear Day?</label>
  <br>
  <input type="date" id="natDate" name="natBearDay">
    <p>Your input was: </p><span id="bearDay"></span><!--Put answer here//hide until submit-->
    
   <input type="submit" value="Check Answers" class="quizSubmit" onClick="checkAnswer(); ">
   <br>
     
<br>
<br>
</form>

</div>

 
<div id="url"><a href="http://www.kidzone.ws/lw/bears/facts.htm">To read more about bears, click on this link!</a></div>

 <script type="text/javascript" src="js/functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>



</script>
    </body>
</html>

