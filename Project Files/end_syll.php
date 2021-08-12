<?php
  include("connection.php");
  session_start();
  error_reporting(0);
?>

<!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                top: 50%;
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
            input[type="submit"]:hover{
              background: #303030;
              color: white;
            }
             h3{
                display: inline-block;
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
            function errorMessage1(){
                var error = document.getElementById("error");
                error.textContent = "Subject Id invalid!!";
                error.style.color = "red";
            }
            function errorMessage2(){
                var error = document.getElementById("error");
                error.textContent = "Second pdf not yet Uploaded!!";
                error.style.color = "red";
            }
            function successMessage1(){
                var error = document.getElementById("error");
                error.textContent = "Syllabus Preparation ended successfully,please check details in archives!!";
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
                <h1 class="first-head">End Syllabus</h1><br>
                <form action="" method="post">
                    <h3>Enter Subject Id : </h3>
                    <input type="text" name="id" required><br><br>
                    <input type="Submit" name="Submit"><br><br>
                    <h4><span id="error"></span><h4>
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
        $sid=$_POST['id'];

        $sql="SELECT * FROM tracker WHERE sid = '$sid' ;";
        $data=mysqli_query($conn,$sql);
        $tot=mysqli_num_rows($data);

        if($tot==0){
            echo "<script>errorMessage1()</script>";
        }
        else{
            $result=mysqli_fetch_assoc($data);

            if($result["U1PDF"]==0 || $result["GR"]==0 || $result["U2PDF"]==0)
            {
                echo "<script>errorMessage2()</script>";
            }
            else{
                /*$sql="INSERT INTO archives(sid,sname,Regulation,Sem,start_date,Syllabus_pdf) SELECT sid,sname,Regulation,Sem,Initialized_date,Syllabus_pdf_2 FROM ongoing_syllabus WHERE $sid = '$sid' ;";
                mysqli_query($conn,$sql);
                $sql="UPDATE archives SET End_date = CURDATE() WHERE sid = '$sid' ;";
                mysqli_query($conn,$sql);*/

                $sql1="SELECT * FROM ongoing_syllabus WHERE sid = '$sid' ;";
                $data1=mysqli_query($conn,$sql1);
                $answer=mysqli_fetch_assoc($data1);
                $sname=$answer["sname"];
                $Reg=$answer["Regulation"];
                $sem=$answer["Sem"];
                $dat=$answer["Initialized_date"];
                $pdf1=$answer["Syllabus_pdf_2"];

                $query=" INSERT INTO archives(sid,sname,Regulation,Sem,start_date,End_date,Syllabus_pdf) VALUES('$sid','$sname','$Reg','$sem','$dat',CURDATE(),'$pdf1'); ";
                mysqli_query($conn,$query);

                $sql="DELETE FROM assigned_prep WHERE sid = '$sid' ;";
                mysqli_query($conn,$sql);
                $sql="DELETE FROM assigned_review WHERE sid = '$sid' ;";
                mysqli_query($conn,$sql);
                $sql="DELETE FROM tracker WHERE sid = '$sid' ;";
                mysqli_query($conn,$sql);
                $sql="DELETE FROM ongoing_syllabus WHERE sid = '$sid' ;";
                mysqli_query($conn,$sql);
                echo "<script>successMessage1()</script>";
            }
        }
        exit;
    }
?>