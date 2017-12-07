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
          echo "<h1>Most Popular Dish: " .  $record['dishTitle'] ."</h1>";
      }

}
voteResults();



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page </title>
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    </head>
    <body>
        
  <a href="r_menu.php"><button type="button" class="btn btn-info btn-lg" >Menu</button></a>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#reservationModal">Make Reservation</button><!--modal for this with ajax-->
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#logInModal">Log in</button>
 
 
 
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