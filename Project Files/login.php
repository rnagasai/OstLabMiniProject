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
    <title>Login--Online Syllabus Preparation Management System</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style type="text/css">
      h4{
        color: white;
        font-family: Comic Sans MS, Comic Sans, cursive;
      }
    </style>
  </head>
  <body>
    <div class="bg-img">
    	<div class="logo">
    		<img src="https://www.anits.edu.in/assets/img/logo.png">
    	</div>
    	<div class="content">
    		<header>Login Form</header>
    		<form action="" method="POST" >
    			<div class="field">
    				<span class="fa fa-user"></span>
    				<input type="text" name="eid" required placeholder="Email">
    			</div>
    			<div class="field space">
    				<span class="fa fa-lock"></span>
    				<input type="password" class="pass-key" name="pad" required placeholder="Password">
    				<span class="show"> SHOW </span>
    			</div>
    			<div class="pass">
            		<a href="forgotpassword.php">Forgot Password?</a>
          		</div>
    			<div class="field">
    				<input type="Submit" name="Submit">
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
    <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>
  </body>
</html>
<?php
    unset($_SESSION["error"]);

    if(isset($_POST['Submit']))
    {
      $emid=$_POST['eid'];
      $pas=$_POST['pad'];
      $error="<h4>Email Id Or Password Incorrect!!</h4>";

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
                header("location: login.php");    
        }
        else{
          $result=mysqli_fetch_assoc($data);
          if($pas==$result['Password'])
          {
            $_SESSION['Name']=$result['Name'];
            $_SESSION['fid']=$result['fid'];
            header("location:faculty_home.php");
          }
          else{
              $_SESSION["error"] = $error;
              header("location: login.php");
          }
        }
      }
      else
      {
          $result=mysqli_fetch_assoc($data);
          if($pas==$result['Password'])
          {
            $_SESSION['aid']=$result['aid'];
            $_SESSION['Name']=$result['Name'];
            $_SESSION['email']=$result['Email_id'];
            header("location:admin_home.php");
          }
          else
          {
              $_SESSION["error"] = $error;
              header("location: login.php");
          }
      }
    exit;
  }
?>