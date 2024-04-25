function traitement(){
        var yearSelect = document.getElementById("yearSelect").value;
        var name=document.getElementById("name").value;
        var card_num=document.getElementById("num").value;
        var cvv=document.getElementById("cvv").value;
        if(name.length<6){
            alert("the length of the username should be more than 6 caracters");
        }
        else if(isNaN(card_num) || card_num.length!=16){
            alert("the card number is not valid");
        }
        else if(cvv=="" || cvv.length<3){
            alert("the cvv is not valid");
        }
        else {
            return true;
        }
        return false;
 }