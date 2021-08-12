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
            .first-head{
                color: black;
                border: 2px solid lightskyblue;
                background-color: lightskyblue;
                border-radius: 20px;
            }
            h3{
                display: inline-block;
            }
            h4{
            font-family: Comic Sans MS, Comic Sans, cursive;
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
            .outer-form input{
                  height: 50%;
                  width: 50%;
                  color: #222;
                  font-size: 16px;
                  padding: 3px;
                  font-family: 'Poppins',sans-serif;
            }
            input[type="submit"]{
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
            .o3{
                padding-right: 39px;
            }
            .tw3{
                padding-right: 33px;
            }
            .th3{
                padding-right: 10px;
            }
            input[type="submit"]:hover{
              background: #303030;
              color: white;
            }
            .fh3{
                padding-right: 17px;
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
            function sum(){
                var firstString = document.getElementById('txt1').value;
                var secondString = document.getElementById('txt2').value; 
                var thirdString = document.getElementById('txt3').value;
                firstString = firstString.substring(1,3);
                secondString = secondString[0]+secondString[2];
                var finalString = firstString+secondString+thirdString;
                document.getElementById('txt4').value = finalString; 
            }
            function errorMessage1() {
                var error = document.getElementById("error");
                error.textContent = "Preparators or reviewers name does not exist in databse,Re-enter!!";
                error.style.color = "red";
            }
            function successmessage1() {
                var error = document.getElementById("error");
                error.textContent = "Syllabus Preparation started!!";
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
                <h2 class="first-head">Subject Filling form</h2>
                    <form action="" method="post">
                        <h3 class="o3">Enter Regulation :</h4>
                        <input type="text" name="rgn" id="txt1" placeholder="Like R19,R20 etc." required><br>
                        <h3 class="tw3">Enter Year & Sem :</h4>
                        <input type="text" name="yas" id="txt2" placeholder="Like 2-1,3-2 etc." required><br>
                        <h3 class="th3">Enter Subject Name :</h4>
                        <input type="text" name="sn" id="txt3" placeholder="Like OS,CD etc."required><br>
                        <h3 class="fh3">Enter Subject Code :</h4>
                        <input type="text" name="sc" id="txt4" onkeyup="sum()" required><br>
                        <h3>Enter Names of 3 Faculty to prepare the subject syllabus : </h4><br>
                        <input type="text" name="tn1" required><br>
                        <input type="text" name="tn2" required><br>
                        <input type="text" name="tn3" required><br>
                        <h3>Enter Names of 2 Reviewers for the subject : </h4>
                        <input type="text" name="rn1" required><br>
                        <input type="text" name="rn2" required><br><br>
                        <input type="Submit" name="Submit">
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

  if(isset($_POST['Submit']))
    {
        $regno=$_POST['rgn'];
        $sem=$_POST['yas'];
        $sname=$_POST['sn'];
        $sid=$_POST['sc'];
        $pn1=$_POST['tn1'];
        $pn2=$_POST['tn2'];
        $pn3=$_POST['tn3'];
        $rn1=$_POST['rn1'];
        $rn2=$_POST['rn2'];

        $query="SELECT * FROM faculty WHERE Name IN ('$pn1', '$pn2', '$pn3');";
        $data=mysqli_query($conn,$query);
        $tot=mysqli_num_rows($data);

        $query1="SELECT * FROM faculty WHERE Name IN ('$rn1', '$rn2');";
        $data1=mysqli_query($conn,$query1);
        $tot1=mysqli_num_rows($data1);


        if ($tot<3 || $tot1<2){
            echo "<script>errorMessage1()</script>";
        }
        else{

            $name=$_SESSION['Name'];
            $to=$_SESSION['email'];
            $subject="Regarding Subject Preparation Assignment";
            $message="Dear ".$name.",\n\nThe subject Preparation for Subject Id : ".$sid." has been started.\nThank You\n\nRegards.";
            $headers = "From: nagyoung20@gmail.com";
            mail($to, $subject, $message, $headers);


            $query1="INSERT INTO ongoing_syllabus(sid,Regulation,Sem,sname,Initialized_date) VALUES('$sid','$regno','$sem','$sname',CURDATE());";
            mysqli_query($conn,$query1);

            while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                $fid=$row["fid"];
                mysqli_query($conn,"INSERT INTO assigned_prep VALUES('$sid','$fid');");
                $name=$row["Name"];
                $to=$row["Email_id"];
                $subject="Regarding Subject Preparation Assignment";
                $message="Dear ".$name.",\n\nThe three teachers: ".$pn1.",".$pn2.",".$pn3.",including you,have been assigned to design the syllabus together for Subject ".$sname." of Regulation ".$regno." for semester ".$sem.".Please compile the syllabus into pdf with in 10 days and any 3 of you login into the OSPMS with your credentals and upload the syllabus pdf.THE SYLLABUS ID IS : ".$sid."\nThank You\n\nRegards,Admin.";
                $headers = "From: nagyoung20@gmail.com";
                mail($to, $subject, $message, $headers);
            }


        

            mysqli_free_result($data);

            $query="SELECT * FROM faculty WHERE Name IN ('$rn1', '$rn2');";
            $data=mysqli_query($conn,$query);
            $tot=mysqli_num_rows($data);

                while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    $fid=$row["fid"];
                    mysqli_query($conn,"INSERT INTO assigned_review VALUES('$sid','$fid');");
                }


            mysqli_free_result($data);

            mysqli_query($conn,"INSERT INTO tracker VALUES('$sid',1,0,0,0,0,0);");

            echo "<script>successmessage1()</script>";

        }
        exit;
    }
?>