<?php $command = escapeshellcmd('Frecognition.py');
$output = shell_exec($command);
if(strlen($output)==7)
{
    $msg="All the best for Your Exam";
    ?>
    <button class="exambtn" onclick="window.location='guidelines.php'">Start Exam</button>

<?php }
else{
    $msg= "Not Matched Please try again";?>
    <button class="exambtn" onclick="window.location='facelogin.php'">LogIn Again</button>
<?php }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/face.jpg");
  opacity:100%;
  background-size: 1400px 800px;
  background-position: center;
  color:white;
}

.cont{
    height:100vh;
    width:100vw;
    display:flex;
    justify-content:center;
    align-items:center;
}
.message{
   font-size:3rem;
}
.exambtn{
    color:white;
    background:transparent;
    border:solid white;
    border-radius:.4rem;
    font-size:1.5rem;
    position:absolute;
    left:47%;
    top:60%;
}
.exambtn:hover{
    cursor:pointer;
    background-color:black;
}
</style>
<body>
    <div class="cont">
    <div class="message"><?php echo $msg ?>
    </div>
</div>

</body>
</html>
