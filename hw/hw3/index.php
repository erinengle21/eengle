<!DOCTYPE html>
<html>
    <head>
        <title> HW3 Index</title>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="SmartWizard-master/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" /> 
          <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
       <h1> Lacrosse Sign Up!</h1>
        <form class="laxForm"  method="POST" action="results.php">
<div id="smartwizard">
    <ul>
        <li><a href="#step-1">Basic Info<br /></a></li>
        <li><a href="#step-2">Physical Info<br /></a></li>
        <li><a href="#step-3">Fun Info<br /></a></li>
      
    </ul>

    <div>
        <div id="step-1" class="">
        
  <div class="row">
    <div class="col-md-7  offset-md-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" name="firstName"  required>
    </div>
    </br>
    <div class="col-md-7 offset-md-3">
      <label for="validationServer02">Last name</label>
      <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" name="lastName" required>
    </div>
    </br>
    </br>
     <div class="col-md-7 offset-md-3">
      <label for="validationServer02">Email</label>
      <input type="text" class="form-control is-valid" id="validationServer03" placeholder="Email" name="email" required>
    </div>
  </div>
 

   
    <div class="form-check">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
  Female
  </label>
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
  Male
  </label>
</div>
 

        </div>
        <div id="step-2" class="">
           
          <h4> What is your mile time?</h4>
            <!--<form class="laxForm" method="POST" action="results.php">-->
            <select class="custom-select" name="mileTime" type="number">
  <option selected>Select amount of minutes</option>
  <option value="<5">< 5</option>
  <option value="5.5">5.5</option>
  <option value="6">6</option>
  <option value="6.5">6.5</option>
  <option value="7">7</option>
  <option value="7.5">7.5</option>
  <option value="8">8</option>
  <option value="8.5">8.5</option>
  <option value="9">9</option>
  <option value="9.5">9.5</option>
  <option value="10">10</option>
  <option value="10.5">10.5</option>
  <option value="11">11</option>
  <option value="11.5">11.5</option>
  <option value="12">12</option>
  <option value=">12">>12</option>
</select>

</br>
           <h4> What is your height?</h4> <!--another drop down--> 
            <select class="custom-select" name="height" type="number">
  <option selected>Select height</option>
  <option value="<5"> <5 feet</option>
  <option value="51">5 f 1 in</option>
  <option value="52">5 f 2 in</option>
  <option value="53">5 f 3 in</option>
  <option value="54">5 f 4 in</option>
  <option value="55">5 f 5 in</option>
  <option value="56">5 f 6 in</option>
  <option value="57">5 f 7 in</option>
  <option value="58">5 f 8 in</option>
  <option value="59">5 f 1 in</option>
  <option value="510">5 f 1 in</option>
  <option value="511">5 f 1 in</option>
  <option value=">6">>=6 feet</option>

</select>
 

        </div>
        <div id="step-3" class="">
            <!--<form class="laxForm" method="POST" action="results.php">-->
         <h4> What is your favorite color?</h4> <!--radio-->
            <select class="custom-select" name="color">
  <option selected>Select Color</option>
  <option value="red"> Red</option>
    <option value="orange"> Orange</option>
      <option value="yellow"> Yellow</option>
        <option value="green"> Green</option>
          <option value="blue"> Blue</option>
            <option value="purple"> Purple</option>
              <option value="pink"> Pink</option>
                <option value="white"> White</option>



</select>


</br></br>
            <!--checkbox-->
            <h4> What days of the week can you practice?</h4> <!--if not tues and thurs, cant practice-->
            <div class="form-check" name="dayOfWeek" >
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="sunday" value="sunday">
    Sunday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="monday" value="monday">
  Monday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="tuesday" value="tuesday">
   Tuesday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="wednesday" value="wednesday">
    Wednesday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="thursday" value="thursday">
    Thursday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="friday" value="friday">
    Friday
  </label>
   <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="saturday" value="saturday">
    Saturday
  </label>

</div>



        </div>
       
    </div>

</div>

</form>
<script type="text/javascript" src="SmartWizard-master/dist/js/jquery.smartWizard.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//           function onFinishCallback(){

//  $.ajax({
//   type:'POST',
//   url: 'index.php',
//   cache: false,
//   success: function(){
//   alert("successful post");
//  },

//  error: function(){
//      alert("Failed to post");
//  }

// });
// }
  $('#smartwizard').smartWizard({  selected: 0,  // Initial selected step, 0 = first step 
            keyNavigation:true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            cycleSteps: false, // Allows to cycle the navigation of steps
            backButtonSupport: true, // Enable the back button support
            useURLhash: true, // Enable selection of the step based on url hash
            lang: {  // Language variables
                next: 'Next', 
                previous: 'Previous'
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                enableFinishButton: true, // makes finish button enabled always
            // onFinish: finishClicked,
            
                toolbarExtraButtons: [
                    
			$('<button></button>').text('Finish')
					      .addClass('btn btn-info')
					      .attr('type', 'submit')
					      
					   //   .on('click', onFinishCallback())
				// 		alert('Finsih button click');  

            
                      ]
            }, 
                // onFinish: onFinishCallback,
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: false, // Activates all anchors clickable all times
                markDoneStep: true, // add done css
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },            
            contentURL: null, // content url, Enables Ajax content loading. can set as data data-content-url on anchor
            disabledSteps: [],    // Array Steps disabled
            errorSteps: [],    // Highlight step with errors
            theme: 'dots',
            transitionEffect: 'fade', // Effect on navigation, none/slide/fade
            transitionSpeed: '400'
      });

//      function finishClicked(){
//          $.ajax({
//   type:'POST',
//   url: 'results.php',
//   cache: false,
//   success: function(){
//   alert("successful post");
//  },

//  error: function(){
//      alert("Failed to post");
//  }

// });
// }
     
 });

</script>

    </body>
    
</html>