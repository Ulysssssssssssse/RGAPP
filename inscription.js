var pwField = document.querySelector("input[name='password']");


pwField.addEventListener("change", function() {
    var msg;
    var pw = pwField.value;
    var pwMsg = document.getElementById("pwMsg");
    if (
        // pw.match( /[0-9]/g) && s
        // pw.match( /[A-Z]/g) && 
        // pw.match(/[a-z]/g) && 
        // pw.match( /[^a-zA-Z\d]/g) &&
        pw.length >= 10
    ) {
        pwMsg.style.color = "green";
        msg = "Mot de passe fort."; 
    }
    else {
        pwMsg.style.color = "red";
        msg = "Votre mot de passe est trop court";
    }
    document.getElementById("pwMsg").innerHTML = msg; 
})