<?php
  include("connection.php");
  session_start();
  error_reporting(0);
?>

<!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="anits.jpg" type="image/x-icon">
        <title>Admin_home--Online Syllabus Preparation Management System</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="admin_home.css">  
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .outer-wrap{
                width: 615px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                padding: 0px 32px;
                padding-bottom: 10px;
                border: 3px solid blue;
                border-radius: 5px;

            }
            h4{
            font-family: Comic Sans MS, Comic Sans, cursive;
          }
            h1{
                color: black;
                border: 2px solid lightskyblue;
                background-color: lightskyblue;
                border-radius: 20px;
            }
            h3{
                display: inline-block;
            }
            input[type=text]{
                border-width: 3px;
                border-style: solid;
                border-color: black;
                border-radius: 5px;
                margin: 3px;
            }
            input[type=text]:focus {
              border: 3px solid blue;
            }
            .outer-wrap input{
                  height: 50%;
                  width: 50%;
                  color: #222;
                  font-size: 16px;
                  padding: 3px;
                  font-family: 'Poppins',sans-serif;
            }
            button{
                background: black;
              border: 3px solid black;
              border-radius: 5px;
              color: white;
              font-size: 18px;
              letter-spacing: 1px;
              font-weight: 600;
              cursor: pointer;
              font-family: 'Montserrat',sans-serif;
              padding: 20px;
              margin: 30px;
              box-shadow: 10px 10px 5px #ccc;
      -moz-box-shadow: 10px 10px 5px #ccc;
      -webkit-box-shadow: 10px 10px 5px #ccc;
      -khtml-box-shadow: 10px 10px 5px #ccc;
            }
            
            button:hover{
              background: #303030;
              color: white;
            }
            select{
                border-width: 3px;
                border-style: solid;
                border-color: black;
                border-radius: 5px;
                margin: 3px;
            }
            select:focus{
                border: 3px solid blue;
            }
            .outer-wrap select{
                  height: 50%;
                  width: 50%;
                  color: #222;
                  font-size: 16px;
                  padding: 3px;
                  font-family: 'Poppins',sans-serif;
            }
            .dropbtn {
              background-color: black;
              color: white;
              padding: 16px;
              font-size: 16px;
              border: none;
              cursor: pointer;
            }
            .dropdown {
              position: relative;
              display: inline-block;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              right: 0;
              background-color: lightblue;
              min-width: 100px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }
            .dropdown-content a:hover {background-color: green;}
            .dropdown:hover .dropdown-content {display: block;}
            .dropdown:hover .dropbtn {background-color: lightskyblue;}

        </style>
        <script>
            function prep(){
                    window.location.href = "prep_syll.php";
            }
            function home(){
                    window.location.href = "admin_home.php";

            }
            function track(){
                window.location.href = "track.php";
            }
            function arch(){
                window.location.href = "archives.php";
            }
            function end(){
                window.location.href = "end_syll.php";
            }
            function logout(){
                window.location.href="login.php";
            }
            /*function fun1(){
                window.location.href="tracksyll.php";
            }
            function fun2(){
                window.location.href="message.php";
            }*/
            function errorMessage1() {
                var error = document.getElementById("error");
                error.textContent = "Subject Code Invalid!!";
                error.style.color = "red";
            }
        </script> 
    </head>
    <body>
        <header id="myHeader">
            <div class="wrapper">
                <div class="logo">
                    <img src="https://www.anits.edu.in/assets/img/logo.png" alt="">
                </div>
                <ul class="nav-area">
                    <li><a href="#" class="home" id="home" onclick="home()">Home</a></li>
                    <li><a href="#" class="prep" id="prep" onclick="prep()">Prepare Syllabus</a></li>
                    <li><a href="#" class="track" id="track" onclick="track()">Track & Message</a></li>
                    <li><a href="#" class="arch" id="arch" onclick="arch()">Archives</a></li>
                    <li><a href="#" class="end" id="end" onclick="end()">End Syllabus</a></li>
                    <li>
                        <div class="dropdown" >
                            <a href="#" class="dropbtn">Hello <?php echo $_SESSION['Name']?> <span class="fa fa-caret-down"></a>
                            <div class="dropdown-content">
                                <a href="#" onclick="logout()">LOGOUT</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        
        <div class="content" id="content">
            <div class="outer-wrap">
                <h1>Track & Message</h1><br>
                <form action="" method="post">
                    <h3>Enter Subject Code : </h3>
                    <select name="sid" required>
                        <option selected>------SELECT SUBJECT ID-----</option>                    
                          <?php 
                                $sql="SELECT * FROM ongoing_syllabus;";
                                $data=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($data, MYSQLI_ASSOC))
                                {
                                    
                          ?>
                                <option><?php echo $row["sid"];?></option>
                          <?php  
                                }
                          ?>
                    </select>
                    <button name="btn1">Track Syllabus</button>
                    <button name="btn2">Message Faculty</button><br>
                    <h4><span id="error"></span></h4>
                </form>
            </div>
        </div>

        <script>
            window.onscroll = function() {myFunction()};

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
            if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                        }
            }
        </script>
    </body>
</html>
<?php
    if(isset($_POST["btn1"]))
    {
        $sid=$_POST['sid'];
        $sql="SELECT * FROM ongoing_syllabus WHERE sid = '$sid';";
        $data=mysqli_query($conn,$sql);
        $tot=mysqli_num_rows($data);

        if($tot==0){
            echo "<script>errorMessage1()</script>";
        }
        else{
            $_SESSION['sid']=$sid;
            echo "<html><script>window.location.href='tracksyll.php';</script></html>";
        }
    }

    if(isset($_POST["btn2"]))
    {
        $sid=$_POST['sid'];
        $sql="SELECT * FROM ongoing_syllabus WHERE sid = '$sid';";
        $data=mysqli_query($conn,$sql);
        $tot=mysqli_num_rows($data);

        if($tot==0){
            echo "<script>errorMessage1()</script>";
        }
        else{
            $_SESSION['sid']=$sid;
            echo "<html><script>window.location.href='message.php';</script></html>";
        }
    }
?>