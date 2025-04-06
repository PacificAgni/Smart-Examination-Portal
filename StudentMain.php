<?php
include_once 'logincheck.php';
include_once 'dbConnection.php';
$_SESSION['queslist']=array();

if(!isset($_SESSION['exm']))
{
  $_SESSION['exm']=$_REQUEST['ques'];
  // echo $_SESSION['exm'];
}

?>
<?php
// echo $exm;
$sql="SELECT * FROM `exam` where `exam`.`E.ID`='{$_SESSION['exm']}'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){ 
    $_SESSION['E.ID']=$row['E.ID'];
    $_SESSION['exam']=$row['Name'];
    $examname=$row['Name'];
    $_SESSION['QID']=$row['QID'];
    $_SESSION['mcq']=$row['mcq'];
    $_SESSION['onemrk']=$row['onemrk'];
    $_SESSION['twomrk']=$row['twomrk'];
    $dur=$row['duration'];
    $_SESSION['marks']=$row['marks'];
}

    // echo $_SESSION['E.ID'];
    // echo "The QID is=".$_SESSION['QID'];
    // echo $_SESSION['exam'];
    // echo $examname;
    // echo $_SESSION['mcq'];
    // echo $_SESSION['onemrk'];
    // echo $_SESSION['twomrk'];
    // echo $dur;
    // echo $_SESSION['marks'];

// echo $dur;
// echo $_SESSION['exam'];
// echo $exam;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['exam']?></title>
    <link rel="stylesheet" href="css/StudentMain.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<!-- timer start -->
<div id="timer"></div>

<script>
var time =<?php echo $dur*60 ?>; // This is the time allowed
console.log("Time is "+time);
var saved_countdown = localStorage.getItem('saved_countdown');
console.log("Saved Time is"+saved_countdown);
if(saved_countdown == null) {
    // Set the time we're counting down to using the time allowed
    var new_countdown = new Date().getTime() + (time + 2) * 1000;
    console.log("New Countdown"+new_countdown);
    time = new_countdown;
    localStorage.setItem('saved_countdown', new_countdown);
} else {
    time = saved_countdown;
}

// Update the count down every 1 second
var x = setInterval(() => {

    // Get today's date and time
    var now = new Date().getTime();
    console.log("Todays date is"+now)
    // Find the distance between now and the allowed time
    var distance = time - now;
    console.log("Time period is"+distance);
    // Time counter
    var counter = Math.floor((distance / 1000));
      console.log("The counter is"+counter);
    // Output the result in an element with id="demo"
    var min=Math.trunc(counter/60);
        var sec=counter%60;
        var timer=document.getElementById("timer");
        if(min>=1)
        {
    document.getElementById("timer").innerHTML = "<h2><b>"+min+"</b> Minutes <b>"+sec+"</b> Seconds</h2>";
        }
        else{
          document.getElementById("timer").innerHTML = "<h2><b>"+sec+"</b> Seconds</h2>";
          if(counter<=30){
          if(sec%2==0)
          {
          timer.style.backgroundColor  = "red";
          document.getElementById("timer").style.color ="white";
          document.getElementById("timer").style.borderColor  = "white";
          }
          else
          {
          timer.style.backgroundColor  = "white";
          timer.style.color  = "red";
          timer.style.borderColor  = "red";
          }
          }
        }
        
    // If the count down is over, write some text 
    if (counter < -1) {
        clearInterval(x);
        localStorage.removeItem('saved_countdown');
        document.getElementById("timer").innerHTML = "TIMES UP";
        alert("Time's Up");
        document.getElementById('myquiz').submit();
    }
}, 900);
</script>

<!-- timer ends -->
<style>
body{
    width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/onlinexam.jpg");
  opacity:100%;
  background-size: 1400px 800px;
  background-position: center;
    color:white;
}

.carousel-item{
    padding-top:6rem;
    padding-left: 14rem;
    padding-right:8rem;
}
.formbody{
    height:80vh;
    border:solid white;
    padding:2rem;
    margin:1rem;
    border-radius: 2rem;
    font-size: 1.3rem;
  
}
.button{
  background:transparent;
  margin:1rem;
}
.btnconatiner{
  position:absolute;
  bottom:2rem;
}
.button:hover{
background-color:white;
border:white;
}
#timer{
  padding:.4rem;
  background-color:#EE4B2B;
  position:fixed;
  right:0px;
  color:white;
  border:solid white .3rem;
  border-radius:1rem;
  transition:.2s ease-out;
}
.marks{
  width:100%;
  display:flex;
  justify-content:right;
  /* border:solid white */
}
</style>
<body>
<div class="heading"><h1><?php echo  $examname;  ?></h1></div>
<div class="formcontainer">
 <div class="form">
 <form action="Check.php" method="POST" id="myquiz">
<?php
     $sql="SELECT * FROM `question` where `question`.`E.ID`='{$_SESSION['QID']}' ORDER BY RAND()";
     $result=mysqli_query($conn,$sql);
     $sno=2;
     ?>
     <div class="formbody">
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
      $row=mysqli_fetch_array($result);
      array_push($_SESSION['queslist'],$row['Q.ID']);
      $ques[$sno-1]=$row['Q.ID'];
      ?>
      <div class="marks">[<?php echo $row['Marks']?>]</div>
       <div class="formques"><p><strong><?php echo "Q". $sno-1 .".".$row['Ques'] ?></strong><p>
       </div>
        <input type="radio" id="<?php echo $row['Opt1']?>" name="<?php echo $row['Q.ID'];?>" value="1">
      
        <label for="<?php $row['Opt1']?>"><?php echo $row['Opt1']?></label><br>
      
         <input type="radio" id="<?php echo $row['Opt2'];?>" name="<?php echo $row['Q.ID'];?>" value="2">
         <label for="<?php $row['Opt2']?>"><?php echo $row['Opt2']?></label><br>

        <input type="radio" id="<?php echo $row['Opt3'];?>" name="<?php echo $row['Q.ID'];?>"    value="3">
        <label for="<?php $row['Opt3']?>"><?php echo $row['Opt3']?></label><br>

        <input type="radio" id="<?php echo $row['Opt4'];?>" name="<?php echo $row['Q.ID']?>"    value="4">
        <label for="<?php $row['Opt4']?>"><?php echo $row['Opt4']?></label><br> 
      </div>

      <!-- crousel mcq start -->

      <?php
      $count=1;
      while($count<$_SESSION['mcq']){
        $row=mysqli_fetch_array($result);
        array_push($_SESSION['queslist'],$row['Q.ID']);
        $ques[$sno]=$row['Q.ID'];
        ?>
      <div class="carousel-item">
      <div class="marks">[<?php echo $row['Marks']?>]</div>
       <div class="formques"><p><strong><?php echo "Q". $sno .".".$row['Ques'] ?></strong><p>
       </div>
        <input type="radio" id="<?php echo $row['Opt1']?>" name="<?php echo $row['Q.ID'];?>" value="1">
      
        <label for="<?php $row['Opt1']?>"><?php echo $row['Opt1']?></label><br>
      
         <input type="radio" id="<?php echo $row['Opt2'];?>" name="<?php echo $row['Q.ID'];?>" value="2">
         <label for="<?php $row['Opt2']?>"><?php echo $row['Opt2']?></label><br>

        <input type="radio" id="<?php echo $row['Opt3'];?>" name="<?php echo $row['Q.ID'];?>"    value="3">
        <label for="<?php $row['Opt3']?>"><?php echo $row['Opt3']?></label><br>

        <input type="radio" id="<?php echo $row['Opt4'];?>" name="<?php echo $row['Q.ID']?>"    value="4">
        <label for="<?php $row['Opt4']?>"><?php echo $row['Opt4']?></label><br> 
      </div>
      <?php
      $sno+=1;
      $count+=1;

       }
      ?>
    
      <!-- corousel mcq end -->
      <!-- corousel short mcqs -->
      <?php
      $sql1="SELECT * FROM `question1` where `question1`.`E.ID`='{$_SESSION['QID']}' and `question1`.`Marks`='1' ORDER BY RAND()";
      $result1=mysqli_query($conn,$sql1);     
      ?>
        <?php 
        $count=0;
        while($count<$_SESSION['onemrk']){
          $row1=mysqli_fetch_array($result1);
          $ques[$sno]=$row1['Q.ID']; 
          array_push($_SESSION['queslist'],$row1['Q.ID']);
           ?>
      <div class="carousel-item">
      <div class="marks">[<?php echo $row1['Marks']?>]</div>
      <div class="formques"><p><strong><?php echo "Q". $sno .".".$row1['Ques'] ?></strong><p></div>
       <textarea type="text" id="<?php echo $row1['Q.ID']?>" name="<?php echo $row1['Q.ID'];?>" placeholder="Enter your Answer" style="width:90%;height:19vh"></textarea>
      </div>
       <?php
       $sno+=1;
       $count+=1;
        } 
       ?>
       <!-- Corousel Short MCQ end -->

       <!-- Corousel Short Start -->
       <?php
      $sql1="SELECT * FROM `question1` where `question1`.`E.ID`='{$_SESSION['QID']}' and `question1`.`Marks`='2' ORDER BY RAND()";
      $result1=mysqli_query($conn,$sql1);      
      ?>
        <?php 
        $count=0;
        while($count<$_SESSION['twomrk']){
          $row1=mysqli_fetch_array($result1);
          $ques[$sno]=$row1['Q.ID'];
          array_push($_SESSION['queslist'],$row1['Q.ID']);
          ?>
      <div class="carousel-item">
      <div class="marks">[<?php echo $row1['Marks']?>]</div>
      <div class="formques"><p><strong><?php echo "Q". $sno .".".$row1['Ques'] ?></strong><p></div>
       <textarea type="text" id="<?php echo $row1['Q.ID']?>" name="<?php echo $row1['Q.ID'];?>" placeholder="Enter your Answer" style="width:90%;height:19vh"></textarea>
      </div>
       <?php
       $count+=1;
       $sno+=1;
        } 
       ?>
       <!-- Corousel Short end -->
  </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      
<div class="btncontainer"><input type="submit" value="Submit" class="button" ></div>
</form> 
</div>
</div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<!-- The code
    if(isset($_REQUEST[$row['Q.ID']]))
    {
    if($_REQUEST[$row['Q.ID']]==$row['Corr'])
    echo "True";
    else
    echo "False";
    }
 -->