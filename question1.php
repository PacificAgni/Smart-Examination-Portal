<!-- INSERT INTO `question` (`Q.ID`, `E.ID`, `Ques`, `Opt1`, `Opt2`, `Opt3`, `Opt4`, `Corr`, `status`) VALUES (NULL, '1', 'What is the full form of SPD?', 'Space Petrol Delta', 'Space Patrol Delta', 'Space Pass Delta', 'Space Party Delta', '2', '1'); -->
<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:index.php");
  exit;
}
?>
<?php

include_once 'dbConnection.php';

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `question1` WHERE `Q.ID` = $sno";
  $result = mysqli_query($conn, $sql);
}

//FORM 1
if($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset( $_POST['snoEdit'])){
    // Update the record
    $sno = $_POST["snoEdit"]; 
   $eid=$_POST["eidedit"];
  $question=$_POST["questionedit"];
  $answer=$_POST["answeredit"];
  $marks=$_POST["marksedit"];
  
//SQL ,  `Ques`='$question' , `Opt1`='$opt1',  `Opt2`='$opt2' ,`Opt3`='$opt3' , `Opt4`='$opt4', `Corr`='$corroption'
  $sql="UPDATE `question1` SET `Ques`='$question',`Ques`='$question',`Ans`='$answer',`Marks`='$marks' WHERE `question1`.`Q.ID`= $sno";

$result = mysqli_query($conn, $sql);
    if($result)
    {
      $update =true;
     }
else{
      echo "We could not update the record successfully";
    }
  }
  
else
{
   $eid=$_POST["eid"];
  $question=$_POST["question"];
  $answer=$_POST["answer"];
  $marks=$_POST["marks"];
 
  //SQL Query
  $sql="INSERT INTO `question1` (`E.ID`, `Ques`, `Ans`, `Marks`) VALUES ('$eid', '$question', '$answer', '$marks');";

  $result = mysqli_query($conn, $sql);
  if($result){ 
    header("location:question1.php");
     }
else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    } 
}
}
include_once 'forms.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/style3.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <meta charset="utf-8">
  <script src="javascript/script.js"></script>
  <title>Smart Exam Portal</title>
<style>
</style>
</head>

<body>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit the Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="question1.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="ExamID">Exam ID</label>
              <input type="text" class="form-control" id="eidedit" name="eidedit" >
            </div>

            <div class="form-group">
              <label for="Question">Question</label>
              <input type="text" class="form-control" id="questionedit" name="questionedit" rows="3"></input type="text">
            </div> 
            <div class="form-group">
            <label for="Option1">Answer</label>
              <input type="text" class="form-control" id="answeredit" name="answeredit" rows="3"></input type="text">
            </div>
            <div class="form-group">
            <label for="Option2">Marks</label>
              <input type="text" class="form-control" id="marksedit" name="marksedit" rows="3"></input type="text">
            </div>
           
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include_once 'left.php'?>

 <div class="right">
 <div class="rightcont">
     <div class="heading"><h1 style="font-size:4rem;font-weight:bold">SHORT QUESTIONS</h1></div>
     <div class="tablecont">
<table class="" id="myTable" style="color:black">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Q.ID</th>
      <th>Exam ID</th>
      <th>Question</th>
      <th>Answer</th>
      <th>Marks</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody style="color:black">
  <?php
     $sql="SELECT * FROM `question1`";
     $result=mysqli_query($conn,$sql);
     $sno=1;
     while($row=mysqli_fetch_array($result)){?>
      <tr>
      <td><?php echo $sno ?></td>
      <td><?php echo $row['Q.ID'] ?></td>
      <td><?php echo $row['E.ID'] ?></td>
      <td><?php echo $row['Ques'] ?></td>
      <td><?php echo  $row['Ans']?></td>
      <td><?php echo  $row['Marks']?></td>
      <td><button id="" class=" button edit">EDIT</button><button class=" button delete ">DELETE</button></td>
    </tr>
    <?php
    $sno+=1;
     }
     ?> 
  </tbody>
    </table>
    </div>   
</div>
</div>
<?php include_once 'rightdash.php' ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} ); </script>
<script src="javascript/script.js"></script>
<!-- <script src="javascript/modal.js"></script> -->
<script>
edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        eid = tr.getElementsByTagName("td")[2].innerText;
        question = tr.getElementsByTagName("td")[3].innerText;
        answer=tr.getElementsByTagName("td")[4].innerText;
        marks=tr.getElementsByTagName("td")[5].innerText;
        console.log(eid,question,answer,marks);
        eidedit.value =  eid;
        questionedit.value = question;
        answeredit.value=answer;
        marksedit.value=marks;
        snoEdit.value = tr.getElementsByTagName("td")[1].innerText;
        console.log(tr.getElementsByTagName("td")[1].innerText);
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;

        sno = tr.getElementsByTagName("td")[1].innerText;
        console.log(sno);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `question1.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
</body>
</html>
