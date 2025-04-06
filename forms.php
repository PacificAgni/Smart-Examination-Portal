<?php
include_once 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
<style>
  h2{
    text-align:center;
  }
  
  </style>

  <script src="javascript/script.js"></script>
  <title>Smart Exam Portal</title>

</head>
<body>
<!-- FORMS START -->
   <!-- form1 -->
   <div class="form-popup" id="myForm1">
    <form action="teacher.php" class="form-container" method="POST">
      <h2>ADD TEACHER</h2>
  
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>
  
      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>

      <label for="psw"><b>Password</b></label>
      <input type="text" placeholder="Enter Password" name="psw" required>
  
      <label for="email"><b>Enter E-mail</b></label>
      <input type="email" placeholder="Enter E-mail" name="email" required>
  
      <button type="submit" class="btnf">ADD</button>
      <button type="button" class="btnf cancel" onclick="closeForm1()">CLOSE</button>
    </form>
  </div>
  <!-- form2 -->
  <div class="form-popup" id="myForm2">
    <form action="student.php" class="form-container" method="POST" enctype="multipart/form-data">
      <h2>ADD STUDENT</h2>
  
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>
  
      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>

      <label for="cls"><b>Class</b></label>
      <input type="text" placeholder="Enter Class " name="class" required>
  
      <label for="rollno"><b>Enter Roll No</b></label>
      <input type="text" placeholder="Enter E-mail" name="rollno" required>

      <label for="image"><b>Select Image</b></label>
      <input type="file" placeholder="" name="image" required>
  
      <button type="submit" class="btnf">ADD</button>
      <button type="button" class="btnf cancel" onclick="closeForm2()">CLOSE</button>
    </form>
  </div>

  <!-- FORM 3 -->
  <div class="form-popup" id="myForm3" style="overflow-y:scroll;">
    <form action="exam.php" class="form-container" method="POST" >
      <h2>ADD EXAMINATION</h2>
  
      <label for="Ename"><b>Exam Name</b></label>
      <input type="text" placeholder="Enter Exam Name" name="ename" required="required" value="">

      <label for="Q.ID"><b>Questions ID</b></label>
      <input type="number" placeholder="Enter Question ID" name="qid" required>
  
      <label for="mcq"><b>MCQ Questions</b></label>
      <input type="number" min="0" placeholder="Enter Number of MCQ Questions" name="mcq" required value="">

      <label for="onemrk"><b>One Mark Questions</b></label>
      <input type="number" min="0" placeholder="Enter number of One Mark Questions" name="onemrk" required value="">

      
      <label for="twomrk"><b>Two Mark Questions</b></label>
      <input type="text" min="0" placeholder="Enter number of Two Mark Questions" name="twomrk" required value="">

      <label for="Exam Duration"><b>Exam Duration</b></label>
      <input type="text" placeholder="Enter exam Duration" name="dur" required value="">

      <label for="Status"><b>Status</b></label>
      <input type="number" min="0" max="1" value="1" placeholder="Enter Status" name="status" required >
  
      <button type="submit" class="btnf">ADD</button>
      <button type="button" class="btnf cancel" onclick="closeForm3()">CLOSE</button>
    </form>
  </div>
<!-- FORM 4 -->
  <div class="form-popup" id="myForm4" style="overflow-y:scroll">
    <form action="question.php" class="form-container" method="POST" >
      <h2>ADD QUESTIONS</h2>
  
      <label for="Exam ID"><b>Examination ID</b></label>
      <input type="text" placeholder="Enter Examination ID" name="eid" required>
  
      <label for="Question"><b>Question</b></label>
      <input type="text" placeholder="Enter Question" name="question" required>

      <label for="option1"><b>Option1</b></label>
      <input type="text" placeholder="Enter Option1" name="opt1" required>
      
      <label for="option2"><b>Option2</b></label>
      <input type="text" placeholder="Enter Option2" name="opt2" required>
     
      <label for="option3"><b>Option3</b></label>
      <input type="text" placeholder="Enter Option3" name="opt3" required>
      
      <label for="option4"><b>Option4</b></label>
      <input type="text" placeholder="Enter Option4" name="opt4" required>
  
      <label for="correct option"><b>Enter correct option</b></label>
      <input type="text" placeholder="Enter Correct Option" name="corroption" required>
  
      <button type="submit" class="btnf">ADD</button>
      <button type="button" class="btnf cancel" onclick="closeForm4()">CLOSE</button>
    </form>
  </div>
  <!-- form5 start -->
  <div class="form-popup" id="myForm5">
    <form action="question1.php" class="form-container" method="POST">
      <h2>ADD QUESTIONS</h2>
      <label for="Exam ID"><b>Examination ID</b></label>
      <input type="text" placeholder="Enter Examination ID" name="eid" required>
  
      <label for="Question"><b>Question</b></label>
      <input type="text" placeholder="Enter Question" name="question" required>

      <label for="Answer"><b>Answer</b></label>
      <input type="text" placeholder="Enter Answer" name="answer" required>
      
      <label for="Marks"><b>Marks</b></label>
      <input type="text" placeholder="Enter Marks" name="marks" required>
     
      <button type="submit" class="btnf">ADD</button>
      <button type="button" class="btnf cancel" onclick="closeForm5()">CLOSE</button>
    </form>
  </div>

  <!-- form5 ends -->

  <!-- FORMS ENDS -->
  <script src="javascript/exam.js"></script>
 </body>
</html>
