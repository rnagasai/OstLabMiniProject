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
                width: 1000px;
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                padding: 0px 32px;
                padding-bottom: 10px;
                /*border: 3px solid blue;
                border-radius: 5px;*/
            }
            h1{
                color: black;
                border: 2px solid lightskyblue;
                background-color: lightskyblue;
                border-radius: 20px;
            }
            .info1{
                width: 30px;
                height: 30px;
                cursor: pointer;
            }
            table{
                border: 4px solid black;
                border-radius: 7px;
                width: 100%;
                font-family: Comic Sans MS, Comic Sans, cursive;
                border-collapse: collapse;
                /*box-shadow: 10px 10px 5px #ccc;
              -moz-box-shadow: 10px 10px 5px #ccc;
              -webkit-box-shadow: 10px 10px 5px #ccc;
              -khtml-box-shadow: 10px 10px 5px #ccc;*/
            }
            td{
                padding: 5px;
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
                <h1>Track Information Of <?php echo $_SESSION["sid"]?></h1><br><br>
                <table>
                    <tr>
                        <td style="border-right: 4px solid black;"><h3>Process Initiated<h3></td>
                        <td><img class="info1" src="tick.png"></td>
                    </tr>
                    <?php  
                        $sid=$_SESSION["sid"];
                        $sql="SELECT * FROM tracker WHERE sid = '$sid' ;";
                        $data=mysqli_query($conn,$sql);
                        $res=mysqli_fetch_assoc($data);
                    ?>
                    <tr>
                        <td style="border-right: 4px solid black; border-top: 4px solid black;"><h3>Uploaded First Syllabus Pdf and Reviewers alerted</h3></td>
                        <?php  
                            if($res["U1PDF"]==1)
                            {
                        ?>
                                <td style="border-top: 4px solid black;"><img class="info1" src="tick.png"></td> 
                        <?php  
                            }
                            else{
                        ?>
                                <td style="border-top: 4px solid black;"></td>
                        <?php  
                            }
                        ?>
                    </tr>
                    <tr>
                        <td style="border-right: 4px solid black; border-top: 4px solid black;"><h3>First Review Given</h3></td>
                        <?php  
                            if($res["Count"]==1)
                            {
                        ?>
                                <td style="border-top: 4px solid black;"><img class="info1" src="tick.png"></td> 
                        <?php  
                            }
                            else{
                        ?>
                                <td style="border-top: 4px solid black;"></td>
                        <?php  
                            }
                        ?>
                    </tr>
                    <tr>
                        <td style="border-right: 4px solid black; border-top: 4px solid black;"><h3>Second Review Given And Preparators alerted</h3></td>
                        <?php  
                            if($res["GR"]==1)
                            {
                        ?>
                                <td style="border-top: 4px solid black;"><img class="info1" src="tick.png"></td> 
                        <?php  
                            }
                            else{
                        ?>
                                <td style="border-top: 4px solid black;"></td>
                        <?php  
                            }
                        ?>
                    </tr>
                    <tr>
                        <td style="border-right: 4px solid black; border-top: 4px solid black;"><h3>Preparators Seen Given Reviews</h3></td>
                        <?php  
                            if($res["VGR"]==1)
                            {
                        ?>
                                <td style="border-top: 4px solid black;"><img class="info1" src="tick.png"></td> 
                        <?php  
                            }
                            else{
                        ?>
                                <td style="border-top: 4px solid black;"></td>
                        <?php  
                            }
                        ?>
                    </tr>
                    <tr>
                        <td style="border-right: 4px solid black; border-top: 4px solid black;"><h3>Final PDF Uploaded</h3></td>
                        <?php  
                            if($res["U2PDF"]==1)
                            {
                        ?>
                                <td style="border-top: 4px solid black;"><img class="info1" src="tick.png"></td> 

                        <?php  
                            }
                            else{
                        ?>
                                <td style="border-top: 4px solid black;"></td>
                        <?php  
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php  
                            if($res["U2PDF"]==1)
                            {
                        ?> 
                                <td colspan="2" style="border-right: 4px solid black; border-top: 4px solid black;"><h4 style="color: red;">! PLEASE END THE SYLLABUS !</h4></td>
                        <?php  
                            }
                        ?>
                    </tr>
                </table><br>
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