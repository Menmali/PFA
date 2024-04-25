function traitement(){
    var name=document.getElementById("id").value;
    var age=document.getElementById("age").value;
    var pass=document.getElementById("pass1").value;
    var cpass=document.getElementById("cpass1").value;
    const emailInput = document.getElementById("mail");
    const pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(name.length<6){
        alert("the length of the username should be more than 6 caracters");
        return false;
    }
    else if (!(emailRegex.test(emailInput.value))) {
        alert("Please enter a valid email address");
        return false;
    }
    else if(age<10 || age>80){
        alert("age not acceptable");
        return false;
    }
    else if(!(pattern.test(pass))){
        alert("your password is not strong enough");
        return false;
    }
    else if(pass!=cpass){
        alert("passwords are not similar");
        return false;
    } 
}