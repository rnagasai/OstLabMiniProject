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
            table{
                border: 2px solid blue;
                width: 100%;
                font-family: Comic Sans MS, Comic Sans, cursive;
                box-shadow: 10px 10px 5px #ccc;
      -moz-box-shadow: 10px 10px 5px #ccc;
      -webkit-box-shadow: 10px 10px 5px #ccc;
      -khtml-box-shadow: 10px 10px 5px #ccc;
            }
            thead{
                background-color: lightskyblue;
            }
            td{
                padding: 6px;
                border-right: 3px solid lightskyblue;
                border-bottom: 2px solid lightskyblue;
            }
            .outer-form{
                width: 99%;
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
                <h1 class="first-head">Archived Syllabus</h1><br>
                <table>
                    <thead>
                        <tr>
                            <th>Subject ID</th>
                            <th>Subject Name</th>
                            <th>Regulation</th>
                            <th>Sem</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Syllabus Pdf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql="SELECT * FROM archives;";
                            $data=mysqli_query($conn,$sql);
                            $tot=mysqli_num_rows($data);

                            if($tot==0)
                            {
                        ?>
                                <tr>
                                    <td colspan="7"><strong>Archives is empty</strong></td>
                                </tr>
                        <?php 
                            }
                            else{
                                while($row = mysqli_fetch_array($data, MYSQLI_ASSOC))
                                {
                                    $sid=$row["sid"];
                                    $sname=$row["sname"];
                                    $Reg=$row["Regulation"];
                                    $sem=$row["Sem"];
                                    $sd=$row["start_date"];
                                    $ed=$row["End_date"];
                                    $pdf='uploads/'.$row["Syllabus_pdf"];
                        ?>
                                <tr>
                                    <td><?php echo $sid;?></td>
                                    <td><?php echo $sname;?></td>
                                    <td><?php echo $Reg;?></td>
                                    <td><?php echo $sem;?></td>
                                    <td><?php echo $sd;?></td>
                                    <td><?php echo $ed;?></td>
                                    <td><a href="download.php?file=<?php echo $pdf?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> CLICK HERE</a></td>
                                </tr>
                        <?php
                                } 
                            } 
                        ?>

                    </tbody>
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
