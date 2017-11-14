//create variables for every input

// var quizSubmit = document.querySelector(".quizSubmit");

function correctImagesJS(location){
var checkImage = document.createElement("img");
checkImage.src = "img/checkMark.png";
location.appendChild(checkImage);
}
function incorrectImagesJS(location){
var xImage = document.createElement("img");
xImage.src = "img/xMark.png";
// location.appendChild(xImage);
location.appendChild(xImage);
}
function correctImagesJQ(location){
    var checkImage = $("<img/>",{ src: "img/checkMark.png"});
    (location).append(checkImage);
}
function incorrectImagesJQ(location) {
     var xImage = $("<img/>",{ src: "img/xMark.png"});
    (location).append(xImage);
}



var scoreArray = [];



function checkAnswer() {
  

   var babyBear = document.getElementById('babyBear');
    var youngBear = document.getElementById('radio').value;
    var joey = document.getElementById('littleBear1');
    var cub = document.getElementById('littleBear2');
    var fawn = document.getElementById('littleBear3');

    if (joey.checked) {
        youngBear = joey.value;
        babyBear.innerHTML = " Your answer: " + youngBear + ", is incorrect. The correct answer is Cub.";
        babyBear.style.backgroundColor = "rgb(255, 51, 51)";
        incorrectImagesJS(babyBear);
    }
    else if (cub.checked) {
        youngBear = cub.value;
        babyBear.innerHTML = " Correct! The name for a young bear is a " + youngBear;
        babyBear.style.backgroundColor = "rgb(0, 204, 0)";
       scoreArray.push("x");
        correctImagesJS(babyBear);
        
    }
    else if (fawn.checked) {
        youngBear = fawn.value;
        babyBear.innerHTML = " Your answer: " + youngBear + ", is incorrect. The correct answer is Cub.";
        babyBear.style.backgroundColor = "rgb(255, 51, 51)";
        incorrectImagesJS(babyBear);
    }


    var species = document.getElementById("speciesType");
    var v = species.options[species.selectedIndex].value;
    // var t = species.options[species.selectedIndex].text;
    var speciesBear = document.getElementById("speciesBear");


    speciesBear.innerHTML = v;

    if (v === "moonBear") {
        speciesBear.innerHTML = " Correct," + v + " is not a species of a bear!";
        speciesBear.style.backgroundColor = "rgb(0, 204, 0)";
        // speciesBear.appendChild(checkImage);
        correctImagesJS(speciesBear);
        scoreArray.push("x");
    }
    else if (v !== "moonBear") {
        speciesBear.innerHTML = " Incorrect," + v + " is in fact, a bear species. The correct answer is Moon Bear";
        speciesBear.style.backgroundColor = "rgb(255, 51, 51)";
        // speciesBear.appendChild(xImage);
        incorrectImagesJS(speciesBear);
        
    }



    speciesNum = $("#speciesNum").val();
    $("#speciesNumber").html(speciesNum);
    if (speciesNum == 8) {
        $("#speciesNumber").html(" Correct! The answer is " + speciesNum);
        $("#speciesNumber").css("backgroundColor", "rgb(0, 204, 0)");
        // $("#speciesNumber").append(checkImage);
        correctImagesJS(speciesNumber);
        scoreArray.push("x");
    }
    else {
          $("#speciesNumber").html(" Your answer,  " + speciesNum + ", is incorrect. The correct answer is 8.");
           $("#speciesNumber").css("backgroundColor", "rgb(255, 51, 51)");
            //  $("#speciesNumber").append(xImage);
            incorrectImagesJS(speciesNumber);
    }




    var femaleName = document.getElementById("femaleName").value;
    var bearName = document.getElementById("bearName");
    if (femaleName == "female") {
        bearName.innerHTML = " Correct! It is the name for a " + femaleName + " bear.";
         bearName.style.backgroundColor = "rgb(0, 204, 0)";
        // bearName.appendChild(checkImage);
        correctImagesJS(bearName);
        scoreArray.push("x");
    }
    else {
         bearName.innerHTML = " Incorrect. Sow is an alternative name for a female bear.";
         bearName.style.backgroundColor = "rgb(255, 51, 51)";
        // bearName.appendChild(xImage);
        incorrectImagesJS(bearName);
    }


    var escapeGrizzly = $("#escapeGrizzly");
    var grizzlyBear = $("#grizzlyBear");
    var valueGrizzly = escapeGrizzly.val();
    var textGrizzly = $("option:selected", escapeGrizzly).text();

    $(grizzlyBear).html(textGrizzly);

    if (valueGrizzly == 2) {

        $(grizzlyBear).html(" Correct! Do not run, and play dead!");
        $(grizzlyBear).css("backgroundColor", "rgb(0, 204, 0)");
        //  $("#grizzlyBear").append(checkImage);
         correctImagesJQ(grizzlyBear);
        scoreArray.push("x");
    }
    else {
       $(grizzlyBear).html(" Incorrect! You should refrain from running, and play dead.");
        $(grizzlyBear).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#grizzlyBear").append(xImage);
        incorrectImagesJQ(grizzlyBear);
    }





    var escapeBlack = $("#escapeBlack");
    var blackBear = $("#blackBear");
    var valueBlack = escapeBlack.val();
    var textBlack = $("option:selected", escapeBlack).text();
    $(blackBear).html(textBlack);

    if (valueBlack == 3) {

        $(blackBear).html(" Correct! Stand your ground and fight back!");
         $(blackBear).css("backgroundColor", "rgb(0, 204, 0)");
            // $("#blackBear").append(checkImage);
            correctImagesJQ(blackBear);
        scoreArray.push("x");
    }
    else {
           $(blackBear).html(" Incorrect! YOu should stand your ground and fight back.");
        $(blackBear).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#blackBear").append(xImage);
        incorrectImagesJQ(blackBear);
    }


    var natDate = document.getElementById("natDate").value;
    document.getElementById("bearDay").innerHTML = natDate;


    if (natDate == "2017-09-02") {
        $(bearDay).html(" Correct! September 2nd, 2017!");
         $(bearDay).css("backgroundColor", "rgb(0, 204, 0)");
         correctImagesJQ(bearDay);
        scoreArray.push("x");
    }
    else {
           $(bearDay).html(" Incorrect! The correct answer is September 2nd, 2017");
        $(bearDay).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#natDate").append(xImage);
       incorrectImagesJQ(bearDay);
    }

    var score = document.getElementById("score");
    score.innerHTML = "You got " + scoreArray.length + "/7";

    if (scoreArray.length >= 6) {
        score.innerHTML = scoreArray.length + "Hooray! You got more than 80%!!!";
    }
}
