var pseudoField = document.querySelector("input[name='pseudo']");
var emailField = document.querySelector("input[name='email']");
var pwField = document.querySelector("input[name='password']");
var pwConfirmField = document.querySelector("input[name='password_retype']");
var checkboxField = document.querySelector("input[type='checkbox']");

var pseudoWellFilled = false;
var emailWellFilled = false;
var pwWellFilled = false;
var pwConfirmWellFilled = false;

function checkPseudo(){
    if(pseudoField.value == '') {
        pseudoWellFilled = false;
        document.getElementById("pseudoMsg").style.color = "red";
        document.getElementById("pseudoMsg").innerHTML = 'Veuillez entrer un pseudo';
    }
    else {
        pseudoWellFilled = true;
        document.getElementById("pseudoMsg").innerHTML = '';
    }
}
function checkEmail(){
  if(emailField.value != '') {
    if(emailField.value.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i) == null){
      document.getElementById("emailMsg").style.color = "red";
      document.getElementById("emailMsg").innerHTML = 'Email non valide';
      emailWellFilled = false;
    } 
    else {
      document.getElementById("emailMsg").innerHTML = '';
      emailWellFilled = true;
    }
  }
  else {
    emailWellFilled = false;
    document.getElementById("emailMsg").style.color = "red";
    document.getElementById("emailMsg").innerHTML = 'Veuillez remplir votre email';
  }
}
function checkPasswordStrengthScore(password) {
    // Initial score is 0
    let score = 0;
    // If password is longer than 8 characters, increase the score
    if (password.length >= 8) {
      score++;
    }
    // If password contains at least one uppercase letter, increase the score
    if (/[A-Z]/.test(password)) {
      score++;
    }
    // If password contains at least one lowercase letter, increase the score
    if (/[a-z]/.test(password)) {
      score++;
    }
    // If password contains at least one number, increase the score
    if (/[0-9]/.test(password)) {
      score++;
    }
    // If password contains at least one special character, increase the score
    if (/[!@#\$%^&*]/.test(password)) {
      score++;
    }
    // Return the score
    return score;
}
function checkPw(){
  if(pwField.value != '' || pwConfirmField.value != '') {
    if(checkPasswordStrengthScore(pwField.value) < 3 || pwField.value.length < 8){
      document.getElementById("pwMsg").style.color = "red";
      document.getElementById("pwMsg").innerHTML = 'Mot de passe trop faible';
      pwWellFilled = false;
    } 
    else {
      document.getElementById("pwMsg").innerHTML = '';
      pwWellFilled = true;
    }
    if(pwConfirmField.value != pwField.value){
      document.getElementById("pwConfirmMsg").style.color = "red";
      document.getElementById("pwConfirmMsg").innerHTML = 'Les mots de passe ne se correspondent pas';
      pwConfirmWellFilled = false;
    }
    else {
      document.getElementById("pwConfirmMsg").innerHTML = ''
      pwConfirmWellFilled = true;
    }
  }
  else {
    pwWellFilled = false;
    pwConfirmWellFilled = false;
    document.getElementById("pwMsg").style.color = "red";
    document.getElementById("pwMsg").innerHTML = 'Veuillez mettre un mot de passe';
    document.getElementById("pwConfirmMsg").style.color = "red";
    document.getElementById("pwConfirmMsg").innerHTML = 'Veuillez confirmer votre mot de passe';
  }
}
function checkCheckbox() {
    if(!checkboxField.checked) {
      document.getElementById("checkboxMsg").style.color = "red";
      document.getElementById("checkboxMsg").innerHTML = 'Veuillez accepter les conditions';
    }
    else {
      document.getElementById("checkboxMsg").innerHTML = '';
    }
}


var form = document.querySelector("form");
var submitButton = document.querySelector("button[type='submit']");
submitButton.addEventListener("click", function(event) {
  event.preventDefault();
  checkPseudo();
  checkEmail();
  checkPw();
  checkCheckbox();
  if(pseudoWellFilled && emailWellFilled && pwWellFilled && pwConfirmWellFilled && checkboxField.checked){
    form.submit();
  }
  else {
    alert('Veuillez vérifier les champs');
  }
})