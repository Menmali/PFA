function traitement(){
    var name=document.getElementById("name").value;
    const emailInput = document.getElementById("email");
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var ch=document.getElementById("message").value;
    if(name.length<6){
        alert("the length of the username should be more than 6 caracters");
    }
    else if (!(emailRegex.test(emailInput.value))) {
        alert("Please enter a valid email address");
    }
    else if(ch==""){
        alert("the review should not be empty");
    }
}