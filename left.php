<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contactUs.php" target="_blank">Contact us</a></li>
        <li><a href="AboutUs.php" target="_blank">About us</a></li>
      </ul>
    </div>
    <div class="dash">
 <div class="left">
     <div class="leftcontainer">
       <div class="box"><a href="admindash.php"><h2>ADMIN</h2></a></div>
     <div class="box">
      <button type="button" class="btn-open" onclick="openForm1()">
        <img src="images/teacher.png">
        <h4>Add teacher</h4></button>    
     </div>
     <div class="box">
      <button type="button" class="btn-open" onclick="openForm2()">
        <img src="images/programmer.png">
          <h4>Add Student</h4> 
      </button>   
     </div>

     <div class="box">
      <button type="button" class="btn-open" onclick="openForm3()">
        <img src="images/exam.png">
          <h4>Add Exam</h4>
      </button>   
     </div>
     <div class="box">
            <button type="button" class="btn-open" onclick="openForm4()">
            <img src="images/question.png">
          <h4>Add MCQs Ques.</h4>
              </button>
            <button type="button" class="btn-open" onclick="openForm5()">
            <img src="images/question.png">
          <h4>Add Short Ques.</h4>
              </button>  
        </div>
        <!-- <div class="box">
          <button type="button" class="btn-open" onclick="location.href='logout.php'">
            <img src="images/logout.png">
          <h4>Log Out</h4>
        </button>
        </a>
        </div>   -->
        </div>
 </div>  

</body>
</html>