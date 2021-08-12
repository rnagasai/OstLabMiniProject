<?php
  include("connection.php");
  session_start();
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="anits.jpg" type="image/x-icon">
    <title>Forgot Password--Online Syllabus Preparation Management System</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style type="text/css">
      h4{
        color: white;
        font-family: Comic Sans MS, Comic Sans, cursive;
      }
      button{
        border: none;
      }
    </style>
  </head>
  <body>
    <div class="bg-img">
    	<div class="logo">
    		<img src="https://www.anits.edu.in/assets/img/logo.png">
    	</div>
    	<div class="content">
    		<header>Forgot Password</header>
    		<form action="" method="POST">
    			<div class="field">
    				<span class="fa fa-user"></span>
    				<input type="text" name="eid" required placeholder="Email">
            <button name="Submit"><span class="fa fa-arrow-right"></span></button>
    			</div>
          <?php
              if(isset($_SESSION["error"])){
                  $error = $_SESSION["error"];
                  echo "<span>$error</span>";
              }
          ?> 
    		</form>
    	</div>
    </div>
  </body>
</html>
<?php
    unset($_SESSION["error"]);
    if(isset($_POST['Submit']))
    {
      
      $emid=$_POST['eid'];
      $error="<h4>Email Id does not Exist!</h4>";

      $query="SELECT * FROM admin WHERE Email_id='$emid' ";
      $data=mysqli_query($conn,$query);
      $total=mysqli_num_rows($data);
      
      if($total==0)
      {
        $query="SELECT * FROM faculty WHERE Email_id='$emid' ";
        $data=mysqli_query($conn,$query);
        $total=mysqli_num_rows($data);
        if($total==0)
        {
                $_SESSION["error"] = $error;
                header("location: forgotpassword.php");
        }
        else{
          $result=mysqli_fetch_assoc($data);
          $to=$result['Email_id'];
          $subject="Regarding Forgot Password for your Online CSE Syllabus Preparation Management";
          $message="Dear ".$result['Name'].",\n\nYour forgotten password for your Online CSE Syllabus Preparation Management is : ".$result['Password'];
          $headers = "From: nagyoung20@gmail.com";
          mail($to, $subject, $message, $headers);
                $error="<h4>Password sent to your mail successfully!!</h4>";
          $_SESSION["error"] = $error;
                header("location: login.php");
        }
      }
      else
      {
          $result=mysqli_fetch_assoc($data);
          $to=$result['Email_id'];
          $subject="Regarding Forgot Password for your Online CSE Syllabus Preparation Management";
          $message="Dear ".$result['Name'].",\n\nYour forgotten password for your Online CSE Syllabus Preparation Management is : ".$result['Password'];
          $headers = "From: nagyoung20@gmail.com";
          mail($to, $subject, $message, $headers);
                          $error="<h4>Password sent to your mail successfully!!</h4>";
          $_SESSION["error"] = $error;
                header("location: login.php");
      }
    exit;
  }
?>
