const menuToggle = document.querySelector(".toggle");
	const showcase = document.querySelector(".showcase");
	
	menuToggle.addEventListener("click", () => {
	  menuToggle.classList.toggle("active");
	  showcase.classList.toggle("active");
	});
	function Check(){
    var Ans=document.getElementById("rd1").value;
    var v1=document.getElementById("v1").value; 
    Ans=Ans.toUpperCase();
    if(Ans!="LOID FORGER"){
    alert("Incorrect Answer !!")
    }else{
      if(v1==1){
        window.location.href="../End%20Of%20Trial/End%20of%20Trial.html";
      }else{
        window.location.href="../Chap%203/chap3.html";
      }
    }
}

