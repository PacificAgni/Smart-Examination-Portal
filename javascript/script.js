function openForm1() {
    document.getElementById("myForm1").style.display = "block";
  }

  function closeForm1() {
    document.getElementById("myForm1").style.display = "none";
  }
  function openForm2() {
    document.getElementById("myForm2").style.display = "block";
  }

  function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
  }

  function openForm3() {
    document.getElementById("myForm3").style.display = "block";
  }

  function closeForm3() {
    document.getElementById("myForm3").style.display = "none";
  }

  function openForm4() {
    document.getElementById("myForm4").style.display = "block";
  }

  function closeForm4() {
    document.getElementById("myForm4").style.display = "none";
  }

  function openForm5() {
    document.getElementById("myForm5").style.display = "block";
  }

  function closeForm5() {
    document.getElementById("myForm5").style.display = "none";
  }

  function go(){
    window.location.href = "logout.php";
  }
  
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