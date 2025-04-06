<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">

    <style>
.btnlog{
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
  .btnlog:hover{
    font-weight: bold;
    border:2px solid #0348b7;
    box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
  }
  

    </style>
</head>
<body>
<div class="rightdash">
   <div class="box"><a href="teacher.php"><img src="images/teacher.png"></a></div>
   <div class="box"><a href="student.php"><img src="images/programmer.png"></a></div>
   <div class="box"><a href="exam.php"><img src="images/exam.png"></a></div>
   <div class="box"><a href="question.php"><img src="images/question.png"></a></div>
   <div class="box"><a href="question1.php"><img src="images/question.png"></a></div>
   <div class="box"><a href="marks.php"><img src="images/ranking.png"></a></div>
   <div class="box"><a href="anschk.php"><img src="images/check.png"></a></div>
</div>

<div class="btnlog"><a href="logout.php">Log Out</a></div>
</body>
</html>