function traitement(){
    var name=document.getElementById("name").value;
    var pass=document.getElementById("pass").value;
    if(name.length<6){
        alert("the length of the name should be more than 6 caracters");
    }
}