//create variables for every input

// var quizSubmit = document.querySelector(".quizSubmit");

function correctImages(location){
var checkImage = document.createElement("img");
checkImage.src = "img/checkMark.png";
location.appendChild(checkImage);
}
function incorrectImages(location){
var xImage = document.createElement("img");
xImage.src = "img/xMark.png";
// location.appendChild(xImage);
location.appendChild(xImage);
}


var scoreArray = [];


function radioBear() {
    var babyBear = document.getElementById('babyBear');
    var youngBear = document.getElementById('radio').value;
    var joey = document.getElementById('littleBear1');
    var cub = document.getElementById('littleBear2');
    var fawn = document.getElementById('littleBear3');

    if (joey.checked) {
        youngBear = joey.value;
        babyBear.innerHTML = " Incorrect! " + youngBear;
        babyBear.style.backgroundColor = "rgb(255, 51, 51)";
        incorrectImages(babyBear);
    }
    else if (cub.checked) {
        youngBear = cub.value;
        babyBear.innerHTML = " Correct! The name for a young bear is a " + youngBear;
        babyBear.style.backgroundColor = "rgb(0, 204, 0)";
        scoreArray.push("x");
        correctImages(babyBear);
        
    }
    else if (fawn.checked) {
        youngBear = fawn.value;
        babyBear.innerHTML = " Incorrect! " + youngBear;
        babyBear.style.backgroundColor = "rgb(255, 51, 51)";
        incorrectImages(babyBear);
    }

// function checkQues2() {
//             $('#radio').submit(function() {
//             var quest6 = $('input[name=question6]:checked').val(); //radio buttons
//             console.log(quest4);
//             console.log(quest5);
//             console.log(quest6);
//             });
//         } 
        
        


}

function checkAnswer() {
    // radioBear();

    var species = document.getElementById("speciesType");
    var v = species.options[species.selectedIndex].value;
    // var t = species.options[species.selectedIndex].text;
    var speciesBear = document.getElementById("speciesBear");


    speciesBear.innerHTML = v;

    if (v === "moonBear") {
        speciesBear.innerHTML = " Correct," + v + " is not a species of a bear!"
        speciesBear.style.backgroundColor = "rgb(0, 204, 0)";
        // speciesBear.appendChild(checkImage);
        correctImages(speciesBear);
        scoreArray.push("x");
    }
    else if (v !== "moonBear") {
        speciesBear.innerHTML = " Incorrect," + v + " is in fact, a bear species.";
        speciesBear.style.backgroundColor = "rgb(255, 51, 51)";
        // speciesBear.appendChild(xImage);
        incorrectImages(speciesBear);
        
    }



    speciesNum = $("#speciesNum").val();
    $("#speciesNumber").html(speciesNum);
    if (speciesNum == 8) {
        $("#speciesNumber").html(" Correct! The answer is " + speciesNum);
        $("#speciesNumber").css("backgroundColor", "rgb(0, 204, 0)");
        // $("#speciesNumber").append(checkImage);
        correctImages(speciesNumber);
        scoreArray.push("x");
    }
    else {
          $("#speciesNumber").html(" Your answer,  " + speciesNum + ", is incorrect.");
           $("#speciesNumber").css("backgroundColor", "rgb(255, 51, 51)");
            //  $("#speciesNumber").append(xImage);
            incorrectImages(speciesNumber);
    }




    var femaleName = document.getElementById("femaleName").value;
    var bearName = document.getElementById("bearName");
    if (femaleName == "female") {
        bearName.innerHTML = " Correct! It is the name for a " + femaleName + " bear."
         bearName.style.backgroundColor = "rgb(0, 204, 0)";
        bearName.appendChild(checkImage);
        correctImages(bearName);
        scoreArray.push("x");
    }
    else {
         bearName.innerHTML = " Incorrect";
         bearName.style.backgroundColor = "rgb(255, 51, 51)";
        // bearName.appendChild(xImage);
        incorrectImages(bearName);
    }


    var escapeGrizzly = $("#escapeGrizzly");
    var grizzlyBear = $("#grizzlyBear");
    var valueGrizzly = escapeGrizzly.val();
    var textGrizzly = $("option:selected", escapeGrizzly).text();

    $(grizzlyBear).html(textGrizzly);

    if (valueGrizzly == 2) {

        $(grizzlyBear).html(" Correct! Do not run, and play dead!");
        $(grizzlyBear).css("backgroundColor", "rgb(0, 204, 0)");
         $("#grizzlyBear").append(checkImage);
         correctImages(grizzlyBear);
        scoreArray.push("x");
    }
    else {
       $(grizzlyBear).html(" Incorrect!");
        $(grizzlyBear).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#grizzlyBear").append(xImage);
        incorrectImages(grizzlyBear);
    }





    var escapeBlack = $("#escapeBlack");
    var blackBear = $("#blackBear");
    var valueBlack = escapeBlack.val();
    var textBlack = $("option:selected", escapeBlack).text();
    $(blackBear).html(textBlack);

    if (valueBlack == 3) {

        $(blackBear).html(" Correct! Stand your ground and fight back!");
         $(blackBear).css("backgroundColor", "rgb(0, 204, 0)");
            $("#blackBear").append(checkImage);
            correctImages(blackBear);
        scoreArray.push("x");
    }
    else {
           $(blackBear).html(" Incorrect!");
        $(blackBear).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#blackBear").append(xImage);
        incorrectImages(blackBear);
    }


    var natDate = document.getElementById("natDate").value;
    document.getElementById("bearDay").innerHTML = natDate;


    if (natDate == "2017-09-02") {
        $(bearDay).html(" Correct! September 2nd, 2017!");
         $(bearDay).css("backgroundColor", "rgb(0, 204, 0)");
         correctImages(nateDate);
        scoreArray.push("x");
    }
    else {
           $(natDate).html(" Incorrect!");
        $(natDate).css("backgroundColor", "rgb(255, 51, 51)"); 
        //  $("#natDate").append(xImage);
        incorrectImages(natDate);
    }

    var score = document.getElementById("score");
    score.innerHTML = scoreArray.length;

    if (scoreArray.length >= 6) {
        score.innerHTML = scoreArray.length + "Hooray! You got more than 80%!!!"
    }
}
