<?php include_once 'navbar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Serif:opsz,wght@8..144,700&display=swap"
    rel="stylesheet">

  <title>About Us</title>
  <style>
     body {
      width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/aboutsep.jpg");
  background-size: 1400px 800px;
  background-position: center;
     
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float:left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  margin-right: -116px;
  text-align: center;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(123, 245, 204, 0.691);
  margin: 8px;
  width: 250px;
    height: 282px;
    color: aliceblue;   
    font-family: 'Alegreya Sans', sans-serif
}

.about-section {
  /* padding: 50px; */
  text-align: center;
  /* background-color: #ffcdb2; */
  color: #fdfdfd;
 
 
  font-family: 'Roboto Serif', serif;
}
.about-section h1{
  text-shadow: 3px 2px 2px rgba(50, 47, 46, 0.568);
  font-size: 3.6rem;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: rgb(179, 175, 175);
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.row::after{
  background-color: #555;
}
.container h2{
  margin-top: 5px;
    margin-bottom: 0px;
}
.our{
  font-family: 'Acme', sans-serif;
  color: #ffffff;
  text-shadow: 3px 2px 2px rgba(50, 47, 46, 0.568);
  letter-spacing: 1.8px;
}
.about-section p{

  color:#f9e422ef;
  text-shadow: 3px 2px 2px rgba(50, 47, 46, 0.568);
  font-size: 1.3rem;
}
.row{
  display:flex;
  justify-content: center;
}
  </style>
</head>
<body>
  <div class="about-section">
    <h1>About Us</h1>
    <p>We are a team of seven college friends that shares a common vision to introduce a fair & secure  online examination environment. </p>
   
  </div>
  
  <h2 class="our" style="text-align:center">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="images/PrashantAgni.jpg"  alt="Prashant" height="200px" width="150px" >
        <div class="container">
          <h2>Prashant Agnihotri</h2>
          <p class="title">Full Stack Development </p>
         
         </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="images\Pankaj.png" alt="Pankaj" height="200px" width="180px">
        <div class="container">
          <h2>Pankaj</h2>
          <p class="title">AI</p>
        
          
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="images/suyash.jpg" alt="Suyash" height="200px" width="150px">
        <div class="container">
          <h2>Suyash</h2>
          <p class="title">Frontend Development</p>
        
         
      
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="images/rishabh.jpg" alt="Rishabh" height="200px" width="150px">
      <div class="container">
        <h2>Rishabh</h2>
        <p class="title">Database</p>
     
        
      </div>
    </div>
  </div> <div class="column">
    <div class="card">
      <img src="images/Sumit.jpg" alt="Sumit" height=200px width=150px>
      <div class="container">
        <h2>Sumit</h2>
        <p class="title">AI</p>
      
        
      </div>
    </div>
  </div> <div class="column">
    <div class="card">
      <img src="images/Saumya.jpg" alt="Saumya" height="200px" width="180px">
      <div class="container">
        <h2>Saumya</h2>
        <p class="title">Front End</p>
     
        
      </div>
    </div>
  </div> <div class="column">
    <div class="card">
      <img src="images/Nirbhay Sharma.png" alt="Nirbhay" height="200px" width="120px">
      <div class="container">
        <h2>Nirbhay</h2>
        <p class="title">Documentation & Front-end</p>        
      </div>
    </div>
  </div>
</body>
</html>