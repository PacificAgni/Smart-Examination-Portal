<?php
include_once 'logincheck.php';

if(isset($_SESSION['exm']))
{
    echo "SET";
    header("location:StudentMain.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/guidelines.css">
    <title>
      Exam Guidelines
    </title>
    <style>
      .btn a{
  color:red;
  text-decoration:none;
}
      </style>
  </head>
  <body>
    <h1 style="font-weight = 400;">Guidelines</h1>
    <div class="rules">
      <h3>Rules to follow during all online proctored exams :</h3>
      <ul>
        <li>Do not leave the camera </li>
        <li>You must use a functioning webcam and microphone</li>
        <li>No cell phones or other secondary devices in the room or test area</li>
        <li>Your desk/table must be clear or any materials except your test-taking device</li>
        <li>No one else can be in the room with you</li>
        <li>No talking</li>
        <li>The testing room must be well-lit and you must be clearly visible</li>
        <li>No dual screens/monitors</li>
      </ul>
    </div>
    <div class="btn">
        <a href="studentexam.php">Start</a>
      </div>
  </body>
</html>
