<?php
 include_once 'navbar.php';
 include_once 'dbconnection.php';
 $msg='';
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];
 $sql=" INSERT INTO `contact` (`Name`, `Email`, `Message`) VALUES ('$name', '$email', '$message');";
 $result=mysqli_query($conn,$sql);
 if($result)
 {
     $msg= "We have received Your message!!!";
 } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/Contactus.css">
    <title>Contact Us</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
   <title>Contact US</title>
   
    </head>

<body>
    <section class="contact">
        <marquee style="color:white"><?php echo $msg ?></marquee>
        <div class="content">
            
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h2>Address</h2>
                        <p>Bareilly College,<br>Bareilly-243001</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h2>Phone</h2>
                        <p>+917818815662</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h2>E-mail</h2>
                        <p>sepassistance@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="contactUs.php" method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required" placeholder="Name">
                    </div>

                    <div class="inputBox">
                        <input type="text" name="email" required="required" placeholder="E-mail">
                    </div>

                    <div class="inputBox">
                        <textarea type="text" name="message" required="required" placeholder="Type your Message.."></textarea>
                    </div>

                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
