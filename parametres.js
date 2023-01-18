var emailField = document.querySelector("input[name='email']");
var emailConfirmField = document.querySelector("input[name='email_retype']");

var emailWellFilled = true;
var emailConfirmWellFilled = true;

function checkEmail(){
  if(emailField.value != '' || emailConfirmField.value != '') {
    if(emailField.value.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i) == null){
      document.getElementById("emailMsg").style.color = "red";
      document.getElementById("emailMsg").innerHTML = 'Email non valide';
      emailWellFilled = false;
    } 
    else {
      document.getElementById("emailMsg").innerHTML = '';
      emailWellFilled = true;
    }
    if(emailConfirmField.value != emailField.value){
      document.getElementById("emailConfirmMsg").style.color = "red";
      document.getElementById("emailConfirmMsg").innerHTML = 'Les emails ne se correspondent pas';
      emailConfirmWellFilled = false;
    }
    else {
      document.getElementById("emailConfirmMsg").innerHTML = ''
      emailConfirmWellFilled = true;
    }
  }
  else {
    emailWellFilled = true;
    emailConfirmWellFilled = true;
  }
}


var pwField = document.querySelector("input[name='password']");
var pwConfirmField = document.querySelector("input[name='password_retype']");

var pwWellFilled = true;
var pwConfirmWellFilled = true;

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
    pwWellFilled = true;
    pwConfirmWellFilled = true;
  }
}

var form = document.querySelector("form");
var submit = document.querySelector("button[type='submit']")
submit.addEventListener("click", function(event) {
  event.preventDefault();
  checkPw();
  checkEmail();
  if(pwWellFilled == true && pwConfirmWellFilled == true && emailWellFilled == true && emailConfirmWellFilled == true){
    form.submit();
  }
  else {
    alert('Veuillez vérifier les champs');
  }
})
