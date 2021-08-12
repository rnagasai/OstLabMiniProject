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
            .outer-form{
                width: 700px;
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                padding: 0px 32px;
                padding-bottom: 10px;
                border: 3px solid blue;
                border-radius: 5px;
            }
            h1{
                color: black;
                border: 2px solid lightskyblue;
                background-color: lightskyblue;
                border-radius: 20px;
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
            }
            button:hover{
              background: #303030;
              color: white;
            }
             h3{
                display: inline-block;
            }
            h4{
                font-family: Comic Sans MS, Comic Sans, cursive;
              }
            textarea{
                width: 635px;
                height: 257px;
                padding: 12px 20px;
                border-width: 3px;
                border-style: solid;
                border-color: black;
                border-radius: 5px;
                margin: 3px;
            }
            textarea:focus{
                border: 3px solid blue;
            }
            button{
                padding-right: 60px;
                padding-left: 60px;
                padding-top: 6px;
                padding-bottom: 5px;
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
            .outer-form select{
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
            function successMessage1() {
                var error = document.getElementById("error");
                error.textContent = "Message Sent Successfully!!";
                error.style.color = "blue";
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
            <div class="outer-form">
                <h1>Message Faculty</h1><br>
                <form action="" method="post">
                    <h3>Preparator Name : </h3>
                    <?php 
                        $sid=$_SESSION['sid'];

                        $sql="SELECT * FROM faculty WHERE fid IN (SELECT fid FROM assigned_prep WHERE sid = '$sid' ) ;";
                        $data=mysqli_query($conn,$sql);

                        $res1=mysqli_fetch_assoc($data);
                        $res2=mysqli_fetch_assoc($data);
                        $res3=mysqli_fetch_assoc($data);

                        $n1=$res1["Name"];
                        $e1=$res1["Email_id"];

                        $n2=$res2["Name"];
                        $e2=$res2["Email_id"];

                        $n3=$res3["Name"];
                        $e3=$res3["Email_id"];
                    ?>
                    <select name="fname" required>
                        <option selected>----------SELECT NAME----------</option>
                        <option><?php echo $n1?></option>
                        <option><?php echo $n2?></option>
                        <option><?php echo $n3?></option>
                    </select><br><br>
                    <h3>Enter the Message : </h3><br>
                    <textarea name="msg" placeholder="Type your Message Here..." required></textarea><br>
                    <button name="submit"><span class="fa fa-paper-plane"></span> SEND</button><br>
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
    if(isset($_POST["submit"])){
        $name=$_POST['fname'];
        $msg=$_POST['msg'];

        $sql="SELECT * FROM faculty WHERE Name = '$name';";
        $data=mysqli_query($conn,$sql);
        $res=mysqli_fetch_assoc($data);


          $to=$res['Email_id'];
          $subject="Regarding Syllabus Preparation of subject id : ".$sid." From Admin";
          $message="Dear ".$name.",\n\n".$msg;
          $headers = "From: nagyoung20@gmail.com";
          mail($to, $subject, $message, $headers);
          echo "<script>successMessage1()</script>";
          unset($_SESSION["sid"]);
    }  
?>