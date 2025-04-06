<?php
include_once 'navbar.php';
include_once 'dbconnection.php';
$login=false;
$error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

  $user=$_POST['user'];
  $password=$_POST['pass'];
  $sql="Select * from teacher where Email='$user' AND Password='$password'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
    $row=mysqli_fetch_array($result);
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['usernm']=$row['First Name'];
    header("location:admindash.php");
  }
  else{
    $error="INVALID USERNAME OR PASSWORD!!!";
  }
}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- <link rel="stylesheet" href="/style.css"> -->
  <link rel="stylesheet" href="css/teachsign.css">
  <link rel="stylesheet" href="css/teach_and_student_sign.css">
  <link rel="shortcut icon" href="images\teach _fav.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
  <style>
    #body {
      background-image: url("images/teachersign.jpg");
      background-size: 1400px 800px;
    }

    .error {
      font-size:1rem;
      display: flex;
      position: fixed;
      top: 22%;
      left: 37%;
      color:#EE4B2B;
      padding:0px;
      margin:0px;
      
      font-weight: bold;
      border-radius: 1rem;
      padding: 1rem;
    }
  </style>

<title>Teacher LogIn</title>
</head>

<body>
  <div class="main">
    <div class="sign-in">
      <h1>Sign in</h1>
      <h3>Welcome Administrator, Login for access
      </h3>
      <form class="box" action="teachsign.php" method="post">
        <input class="name" type="email" name="user" value="" placeholder="Username"><br>
        <input class="name" type="password" placeholder="Password" name="pass" id="pass" value=""> <br>
        <label class="contain">
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
          Remember me</label>
          <input type="checkbox" id="checkbox" onclick="myFunction()">Show Password <br>
        <!-- <a href="#" target="_blank" class="Forget">Forget Password?</a><br> -->
        <input class="btn" type="submit" name="submit" value="Login">
      </form>
    </div>
  </div>
  <div class="error">
  <marquee>  <?php
    if($error)
    {
      echo $error;
    }
    ?>
    </marquee>
  </div>
  <script src="javascript/index.js">
   
  </script>
</body>

</html>
