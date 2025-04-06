<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:index.php");
  exit;
}
include_once 'dbConnection.php';
include_once 'forms.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/admindash.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <title><?php echo $_SESSION['usernm']?></title>

  <style>
.btn{
    font-size: 15px;
    border-radius: 100px;
    color: #0348b7;
    position: fixed;
    bottom: -.4rem;
    right: -.4rem;
    border: none;
    background: none;
    font: inherit;
    line-height: 1;
    margin: 0.5em;
    padding: 1em 2em;
    transition:  0.2s linear;
  }
  .btn:hover{
    font-weight: bold;
    border:2px solid #0348b7;
    box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
  }
  

    </style>
</head>
<body>
   <?php include_once 'left.php'?>
 <div class="right">  
 <div class="heading" style="font-weight:bold"><h1>Welcome <?php echo $_SESSION['usernm'] ?></h1></div>
 <!-- <div class="msg"><h2> Welcome <?php echo $_SESSION['usernm'] ?> </h2></div> -->
<div class="rightcontainer">
  <div class="box">
    <a href="teacher.php">
       <img src="images/teacher.png">
      <h3>TEACHERS</h3>
     </a>
  </div>
  <div class="box">
     <a href="student.php">
       <img src="images/programmer.png">
       <h3>STUDENTS</h3>
     </a>
  </div>
  <div class="box">
     <a href="exam.php">
       <img src="images/exam.png">
       <h3>EXAMINATIONS</h3>
      </a>
  </div>
  <div class="box">
       <a href="question.php">
      <img src="images/question.png">
       <h3>MCQ QUESTIONS</h3>
       </a>
     </div>
     <div class="box">
          <a href="question1.php">
          <img src="images/question.png">
          <h3>SHORT QUESTIONS</h3>
        </a>
        </div>
     <div class="box">
      <a href="marks.php">
        <img src="images/ranking.png">
        <h3>MARKSHEETS</h3></a>
   </div>
   <div class="box">
      <a href="anschk.php">
        <img src="images/check.png">
        <h3>CHECK</h3></a>
   </div>
</div>
 </div>
</div>

<div class="btn"><a href="logout.php">Log Out</a></div>

<script src="javascript/script.js"></script>
</body>
</html>
