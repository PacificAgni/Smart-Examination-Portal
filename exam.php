<!-- INSERT INTO `exam` (`E.ID`, `Name`, `T.ID`, `questions`, `duration`, `marks`, `status`) VALUES (NULL, 'Physics', '1', '5', '5', '4', '1'); -->
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






//FORM 1
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `exam` WHERE `E.ID` = $sno";
  $result = mysqli_query($conn, $sql);
}

//FORM 1
if($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset( $_POST['snoEdit'])){
    // Update the record
  $sno = $_POST["snoEdit"];
  $qid=$_POST["qidedit"] ;
  $ename=$_POST["enameedit"];
  $mcq=$_POST["mcqedit"];
  $onemrk=$_POST["onemrkedit"];
  $twomrk=$_POST["twomrkedit"];
  $mrk=$mcq+$onemrk+2*$twomrk;
  $dur=$_POST["duredit"];
  $status=$_POST["statusedit"];
  //SQL , , `Password`='$pass' , `Email`=$email
  $sql="UPDATE `exam` SET `QID`='$qid', `Name`='$ename', `mcq` ='$mcq' ,`onemrk`='$onemrk', `twomrk`='$twomrk',`duration`='$dur',`marks`='$mrk',`status`='$status' WHERE `exam`.`E.ID`= $sno";

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
  $qid=$_POST["qid"];
  $ename=$_POST["ename"];
  $mcq=$_POST["mcq"];
  $onemrk=$_POST["onemrk"];
  $twomrk=$_POST["twomrk"];
  $dur=$_POST["dur"];
  $mrk=$mcq+$onemrk+2*$twomrk;
  $status=$_POST["status"];

  //SQL Query
  $sql="INSERT INTO `exam` (`QID`,`Name`, `mcq`, `onemrk`,`twomrk`, `duration`, `marks`,`status`) VALUES ( '$qid','$ename', '$mcq', '$onemrk','$twomrk', '$dur', '$mrk','$status');";


  $result = mysqli_query($conn, $sql);
  if($result){ 
     header("location:exam.php");
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <script src="javascript/script.js"></script>
  <title>Smart Exam Portal</title>

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
        <form action="exam.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">

            <div class="form-group">
              <label for="QID">Question ID</label>
              <input type="text" class="form-control" id="qidedit" name="qidedit" >
            </div>

            <div class="form-group">
              <label for="ename">Exam Name</label>
              <input type="text" class="form-control" id="enameedit" name="enameedit" >
            </div>

            <div class="form-group">
              <label for="MCQ">MCQs</label>
              <input type="number" min="0" class="form-control" id="mcqedit" name="mcqedit" rows="3">
            </div> 

            <div class="form-group">
            <label for="One Mark">One Marks Questions</label>
              <input type="number" min="0" class="form-control" id="onemrkedit" name="onemrkedit" rows="3">
            </div>

            <div class="form-group">
            <label for="Two Mark">Two Marks Questions</label>
              <input type="number" min="0" class="form-control" id="twomrkedit" name="twomrkedit" rows="3">
            </div>

            <div class="form-group">
            <label for="text">Duration</label>
              <input type="text" class="form-control" id="duredit" name="duredit" ></input type="text">
            </div>

            <div class="form-group">
            <label for="Status">Status</label>
              <input type="number" class="form-control" id="statusedit" name="statusedit" >
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
     <div class="heading"><h1 style="font-size:4rem;font-weight:bold">EXAMINATIONS</h1></div>
     <div class="tablecont">
<table class="" id="myTable" style="color:black;text-align:center">
  <thead>
    <tr>
      <th>S.No</th>
      <th>E.ID</th>
      <th>Q.ID</th>
      <th>Exam Name</th>
      <th>MCQs</th>
      <th>One Marks</th>
      <th>Two Marks</th>
      <th>Duration</th>
      <th>Marks</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $sql="SELECT * FROM `exam`";
     $result=mysqli_query($conn,$sql);
     $sno=1;
     while($row=mysqli_fetch_array($result)){?>
      <tr>
      <td><?php echo $sno ?></td>
      <td><?php echo $row['E.ID'] ?></td>
      <td><?php echo $row['QID'] ?></td>
      <td><?php echo $row['Name'] ?></td>
      <td><?php echo $row['mcq'] ?></td>
      <td><?php echo  $row['onemrk'] ?></td>
      <td><?php echo  $row['twomrk'] ?></td>
      <td><?php echo $row['duration'] ?></td>
      <td><?php echo $row['marks'] ?></td>
      <td><?php echo $row['status'] ?></td>
      <td><button id="" class=" button edit">EDIT</button> <button class=" button delete ">DELETE</button></td>
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
        qid = tr.getElementsByTagName("td")[2].innerText;
        ename = tr.getElementsByTagName("td")[3].innerText;
        mcq = tr.getElementsByTagName("td")[4].innerText;
        onemrk = tr.getElementsByTagName("td")[5].innerText;
        twomrk = tr.getElementsByTagName("td")[6].innerText;
        dur=tr.getElementsByTagName("td")[7].innerText;
        status=tr.getElementsByTagName("td")[9].innerText;
        console.log(qid,ename,mcq,onemrk,twomrk,dur,status);
        qidedit.value=qid;
        enameedit.value=ename;
        mcqedit.value=mcq;
        onemrkedit.value=onemrk;
        twomrkedit.value=twomrk;
        duredit.value=dur;
        statusedit.value=status;
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
          window.location = `exam.php?delete=${sno}`;
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
