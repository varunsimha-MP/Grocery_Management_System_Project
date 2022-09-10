function validatefname(){
    var fname=document.getElementById("fname").value;
    var re1=/^[a-zA-Z]{3,15}$/;
    if(re1.test(fname)){
      document.getElementById("fnamePrompt").style.color="green";
      document.getElementById("fnamePrompt").innerHTML="<b>Valid</b>";
         return true;
  }
  else{
    document.getElementById("fnamePrompt").style.color="red";
    document.getElementById("fnamePrompt").innerHTML="<b>Enter 3 to 15 character</b>";
       return false;
  }
}
function validatelname(){
    var lname=document.getElementById("lname").value;
    var re2=/^[a-zA-Z]{1,10}$/;
    if(re2.test(lname)){
      document.getElementById("lnamePrompt").style.color="green";
      document.getElementById("lnamePrompt").innerHTML="<b>Valid</b>";
         return true;
  }
  else{
    document.getElementById("lnamePrompt").style.color="red";
    document.getElementById("lnamePrompt").innerHTML="<b>Enter 1 to 10 character</b>";
       return false;
  }
}
function validatephone(){
    var phone=document.getElementById("phone").value;
    var re3=/^\d{10}$/;
    if(re3.test(phone)){
      document.getElementById("phonePrompt").style.color="green";
      document.getElementById("phonePrompt").innerHTML="<b>Valid</b>";
         return true;
  }
  else{
    document.getElementById("phonePrompt").style.color="red";
    document.getElementById("phonePrompt").innerHTML="<b>Enter 10 digit Number</b>";
       return false;
  }
}
function validatea(){
    var a=document.getElementById("a").value;
    var re4=/^\d{1}[a-zA-Z]{2}\d{2}[a-zA-Z]{2}\d{3}$/;
    if(re4.test(a)){
      document.getElementById("aPrompt").style.color="green";
      document.getElementById("aPrompt").innerHTML="<b>Valid</b>";
         return true;
  }
  else{
    document.getElementById("aPrompt").style.color="red";
    document.getElementById("aPrompt").innerHTML="<b>Enter valid format</b>";
       return false;
  }
}
