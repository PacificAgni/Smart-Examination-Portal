<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam</title>
</head>
<style>
body{
    width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/face.jpg");
  opacity:100%;
  background-size: 1400px 800px;
  background-position: center;
  color:white;
}

#my_camera{
    border:solid white 5px;
    position:absolute;
    left:33%;
    top:20%;
}
.msg{
    text-align:center;
    font-weight:bold;
    font-size:3rem;
    font-style: oblique;
}
button{
    color:white;
    border:solid white;
    border-radius:.2rem;
    height:7vh;
    width:13vw;
    background:transparent;
    position:absolute;
    left:44%;
    top:80%;
}
button:hover{
    background-color:black;
    color:white;
    cursor:pointer;
}
</style>
<body onload="configure();">
    <div class="container">
     <div class="msg">Face Recognition LogIn</div>
    <div id="my_camera">

    </div>
    
  <div id="results" style="visibility:hidden;position:absolute">

  </div>
  <br>
  <button type="button" onclick="saveSnap();">Log In</button><br>
</div>




    <script src="asset/webcam.min.js"></script>
    <script>
    function configure(){

        Webcam.set({
            width:480,
            height:360,
            image_format:'jpg',
            jpg_quality:90
        });

        Webcam.attach("#my_camera");
    }

    function saveSnap(){
        Webcam.snap(function(data_uri){
        document.getElementById('results').innerHTML=
        '<img id="webcam" src="'+data_uri+'">';
        });

        Webcam.reset();

        var base64image=document.getElementById("webcam").src;
        Webcam.upload(base64image,'floginfunction.php',function(code,text){
            alert('We are fetching your Details.It may take a while Please wait');
            document.location.href="floginweb.php";
        
        });
    }
    </script>
</body>
</html>