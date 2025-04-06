function myFunction() {
    var y=document.getElementById("checkbox");
    var x = document.getElementById("pass");
    if(y.checked)
    {
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "text";
    }
  }
  else{
    x.type = "password";
  }
  }