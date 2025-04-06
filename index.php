<?php
if(isset($_SESSION['exm']))
{
    echo "SET";
    header("location:StudentMain.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <title>Smart Exam Portal</title>
<style>
  .banner{
  width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/bg1.jpg");
  background-size: 1400px 800px;
  background-position: center;
}
.responsive{
  display:none;
  color:white;
  width:100vw;
  height:100vh;
}
.res{
  font-size:2rem;
  font-weight:bold;
  position:absolute;
  left:20vw;
  top:40vh;
}
@media only screen and (max-width: 1200px) {
  .banner {
    display:none;
  }
  body{
    width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/bg.jpg");
  background-size: 1400px 800px;
  background-position: center;
  }
  .responsive{
  display:block;
}
}
  </style>
</head>
<body>
<div class="responsive"><div class="res">Please Open in Monitor/Laptop</div></div>
  <div class="banner">
    <div class="navbar">
  
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li><a href="AboutUs.php">About us</a></li>
      </ul>
    </div>
    <div class="content">
      <h1>Smart Examination Portal</h1>
      <p>A fair & secure environment. We wish you a very good luck.</p>
      <div>
       <a href="teachsign.php"> <button type="button" name="button">Teahcer Login</button></a>
       <a href="studntsign.php"><button type="button" name="button" onclick="studntsign.html">Student Login</button></a>
      </div>

    </div>
  </div>
</body>

</html>
