function validate() {
  var psw = document.getElementById('psw');
  var pass2 = document.getElementById('pass2');
  var message = document.getElementById('error-nwl');
  var goodColor = "#66cc66";
  var badColor = "#ff6666";

  if (document.myForm.id.value == "") {
    alert("Please provide your ID!");
    document.myForm.id.focus();
    return false;
  }
  if (document.myForm.name.value == "") {
      alert("Please provide your name!");
      document.myForm.name.focus();
      return false;
    }
    if (document.myForm.password.value == "" ) {
      alert("Please provide your password!");
      document.myForm.password.focus();
      return false;
    }
      if (document.myForm.email.value == "") {
      alert("Please provide your email id!");
      document.myForm.email.focus();
      return false;
    }
        if (document.myForm.phone.value == "") {
      alert("Please provide your phone number!");
      document.myForm.phone.focus();
      return false;
    }
        if (document.myForm.gender.value == "") {
      alert("Please provide your gender!");
      document.myForm.gender.focus();
      return false;
    }
  
    if (document.myForm.usertype.value == "-1") {
      alert("Please provide your usertype!");
      return false;
    }

    if(psw.value.length > 5 && pass2.value.length > 5)
    {
        psw.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
        

        if(psw.value == pass2.value)
        {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "ok!";
            return(true);
        }
        else
        {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " This passwords don't match";
            document.myForm.password.focus();
            return false;
        }
        
    }
    else
    {
        psw.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 6 digit!";
        document.myForm.password.focus();
        return false;
    }
    
}
  



