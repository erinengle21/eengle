     // Your JavaScript goes here
      var randomNumber = Math.floor(Math.random() * 99) + 1;
      var guesses = document.querySelector('#guesses');
      var lastResult = document.querySelector('#lastResult');
      var lowOrHi = document.querySelector('#lowOrHi');

      var guessSubmit = document.querySelector('.guessSubmit');
      var guessField = document.querySelector('.guessField');
    
      var guessCount = 1;
      var resetButton = document.querySelector('#reset');
      resetButton.style.display = 'none';
      guessField.focus();
      var lostArray = [];
      var wonArray = [];
      
      function checkGuess() {
            var userGuess = Number(guessField.value);
            if (guessCount === 1) {
                guesses.innerHTML = 'Previous guesses: ';
            }
            guesses.innerHTML += userGuess + ' ';
            
              if (userGuess === randomNumber) {
                lastResult.innerHTML = 'Congratulations! You got it right!';
                lastResult.style.backgroundColor = 'green';
                lowOrHi.innerHTML = '';
                setGameOver();
                wonArray.push("Won");
              } else if (guessCount === 7) {
                lastResult.innerHTML = 'Sorry, you lost!';
                setGameOver();
                lostArray.push("lost");
              } else {
                lastResult.innerHTML = 'Wrong!';
                lastResult.style.backgroundColor = 'red';
                if(userGuess < randomNumber) {
                  lowOrHi.innerHTML = 'Last guess was too low!';
                } else if(userGuess > randomNumber) {
                  lowOrHi.innerHTML = 'Last guess was too high!';
                }
              if (userGuess > 99){
                  lowOrHi.innerHTML = 'ERROR: You must enter a number less than 99';
                  lastResult.style.display = 'none';
                //   guesses.innerHTML.style.display = 'none';
                
              }}
              
              
             
              guessCount++;
              guessField.value = '';
              guessField.focus();
      }
      
      guessSubmit.addEventListener('click', checkGuess);
      
      function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = 'inline';
        resetButton.addEventListener('click', resetGame);
      }
      
      function resetGame() {
        guessCount = 1;
      
        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0 ; i < resetParas.length ; i++) {
          resetParas[i].textContent = '';
        }
      
        resetButton.style.display = 'none';
      
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
      
        lastResult.style.backgroundColor = 'white';
      
        randomNumber = Math.floor(Math.random() * 99) + 1;
      }
      
      //when user clicks reset, it is recorded, and the amount is shown?
      //array push games won
      //array push games lost
      
    var gamesResult = document.getElementById('#gamesReult');
    gamesResult.innerHTML = 'Games won: ' + wonArray;
    gamesResult.innerHTML = 'Games lost: ' + lostArray;