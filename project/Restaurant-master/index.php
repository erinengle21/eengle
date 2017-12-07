<?php

   include 'dbConnection.php';
   $conn = getDatabaseConnection();
function voteResults(){
    global $conn;
      $sql = "SELECT dishTitle, COUNT(dishTitle)
  FROM votes
 GROUP BY  dishTitle
 ORDER BY COUNT(dishTitle) DESC LIMIT 1";
  


  
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo "<h2> " .  $record['dishTitle'] ."</h2>";
      }

}




?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Erin's Restaurant</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Pluto's Place</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href="#top">WELCOME</a></li>
                            <li><a class="color_animation" href="r_menu.php">VIEW MENU</a></li>
                            <li><a class="color_animation" data-toggle="modal" data-target="#reservationModal">MAKE A RESERVATION</a></li>
                            <li><a class="color_animation" data-toggle="modal" data-target="#logInModal">ADMIN LOG IN</a></li>
  
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                      <h2 class="top-title">Pluto's Place</h2>
                    <h2 class="white second-title">" Best in the city "</h2>
                    <hr>
                </div>
            </div>
        </div>

        <!-- ============ Most popular ============= -->

        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">
                    <h1>Most Popular Dish</h1>
                    <div class="fa fa-cutlery fa-2x"></div>
                    <p class="desc-text" >Based off votes from those who have eaten here at<br> our restaurant, the most popular item this week is:<br>
                    <?=voteResults();?></p>
                </div>
                <div class="col-md-6">
                    <div class="img-section">
                       <img src="images/kabob.jpg" width="250" height="220">
                       <img src="images/limes.jpg" width="250" height="220">
                       <div class="img-section-space"></div>
                       <img src="images/radish.jpg"  width="250" height="220">
                       <img src="images/corn.jpg"  width="250" height="220">
                   </div>
                </div>
            </div>
        </section>



<!--------------------------------------------------------------------------MODAL FOR AJAX RESERVATION------------------------>
 <!-- Modal -->
  <div class="modal fade" id="reservationModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Make Reservation</h4>
        </div>
        <div class="modal-body">
          <form onSubmit="return false">
           Reservation Name: <input type="text" name="partyName" id="partyName"> 
          Reservation Date: <input type="date" name="partyDate" id="partyDate"> 
           Reservation Time: <input type="time" name="partyTime" id="partyTime"> 
           Amount of people: <input type="number" name="amountPeople" id="amountPeople"> 
          Is this for an event?: <input type="radio" name="event" value="yes"
                            id="eventYes"/><label for="eventYes">yes</label>
                            <input type="radio" name="event" value="no"
                            id="eventNo"/><label for="eventNo">No</label><br/>
         Additional Notes?: <input type="textarea" name="notes" id="notes"> 
          
           <input type="submit" value="Set Reservation!" onClick="setReservation();">  
          </form>
          <span id="madeFor"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--------------------------------------------------------------------------END MODAL FOR AJAX RESERVATION------------------------>
  
  <!-------------------------------------------------------------------------- MODAL FOR LOG IN------------------------>
   <!-- Modal -->
  <div class="modal fade" id="logInModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Admin Log In</h4>
        </div>
        <div class="modal-body">
         				<form id="login-form" action="loginProcess.php" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
											    Admin log in: <br>
											    Username: admin <br>
											    Passwords: secret <br>
												<div class="text-center">
											
												</div>
											</div>
										</div>
									</div>
								</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <!--------------------------------------------------------------------------END MODAL FOR LOG IN------------------------>
       
      
       


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
          function setReservation() {
              var event = "";
if ($('#eventYes').is(':checked')){
    event = "yes";
}
else if ($('#eventNo').is(':checked')){
    event = "no";
}
           
            $.ajax({

                type: "GET",
                url: "reservation.php",
                dataType: "json",
                data: { 
                 
                  "partyName": $("#partyName").val(),
                  "partyDate": $("#partyDate").val(),
                  "partyTime": $("#partyTime").val(),
                  "amountPeople": $("#amountPeople").val(),
                  "event": event,
                  "notes": $("#notes").val()
                  
                },
                success: function(data, status) {

                    //alert(data.city);
           

                },
                complete: function(data, status) { //optional, used for debugging purposes
                    // alert(status);
                    // alert("Your reservation has been made!");
                     JSON.stringify(data);
                    // $("#madeFor").html(data.responseText);
                    $('#reservationModal').modal('hide');
                    // $('body').html("Your reservation has been made!");
                    alert("Your reservation has been made!");
                    // console.log(data.responseText);
                }

            }); //ajax

        } //getCity()
</script>
    </body>
</html>