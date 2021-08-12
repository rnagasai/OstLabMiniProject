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
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
               position: absolute;
               top: 50%;
               left: 50%;
               width: 80%;
               transform: translate(-50%, -50%);
                text-align: center;
                padding: 0px 32px;
                padding-bottom: 10px;
                border: 3px solid blue;
                border-radius: 5px;
      }
      .table-div{
            position: absolute;
           top: 70%;
           left: 50%;
           width: 99%;
           transform: translate(-50%, -50%);
            text-align: center;
            padding: 0px 32px;
            padding-bottom: 10px;
            /*border: 3px solid blue;
            border-radius: 5px;*/
      }
      table{
            /*border: 4px solid black;
            border-radius: 7px;*/
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
            padding: 10px;
            border-right: 3px solid lightskyblue;
            border-bottom: 2px solid lightskyblue;
        }
      input[type=text]{

                border-width: 3px;
                border-style: solid;
                border-color: black;
                border-radius: 5px;
                margin: 3px;
                margin-right: 0px;
        }
        input[type=text]:focus {
          border: 3px solid blue;
        }
        button{
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10.6px;
            padding-right: 11px;
            padding-bottom: 8px;
            /*padding-bottom: 1px;*/
            /*border-radius: 5px;*/
            /*position: absolute;
            top: 51.6%;
            left: 72.6%;*/
        }
        button:hover{
            background: lightskyblue;
            color: white;
        }
        .first-head{
                color: black;
                border: 2px solid lightskyblue;
                background-color: lightskyblue;
                border-radius: 20px;
            }
        .outer-form input{
                  height: 50%;
                  width: 50%;
                  color: #222;
                  font-size: 16px;
                  padding: 3px;
                  font-family: 'Poppins',sans-serif;
        }
      .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 100px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            .info1{
                width: 30px;
                height: 30px;
                cursor: pointer;
            }

            .second-head{
                color: blue;
                border-bottom: 3px solid blue;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            p{
                font-family: Comic Sans MS, Comic Sans, cursive;
            }
            h4{
            color: red;
            font-family: Comic Sans MS, Comic Sans, cursive;
          }
            #myBtn{
                position: absolute;
                top: 21%;
                left: 96%;
                border: 0px;
                background-color: white;
            }

            /* Modal Content */
            .modal-content {
              background-color: #fefefe;
              margin: auto;
              padding: 20px;
              border: 1px solid #888;
              border-radius: 7px;
              width: 50%;
            }

            /* The Close Button */
            .close {
              color: #aaaaaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }

            .close:hover,
            .close:focus {
              color: blue;
              text-decoration: none;
              cursor: pointer;
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
            function errorMessage1(){
                var error = document.getElementById("error");
                error.textContent = "Subject Id invalid!!";
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

            <button id="myBtn"><img class="info1" src="info.png"></button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <h1 class="second-head">Search Ongoing Syllabus</h1><br>
                <p>Hi,Admin.<br>Please follow the below instrcutions to view Ongoing Syllabus Details:<br><br>Go to Home page.<br><br>Select subject id from the dropdown list of ongoing syllabus id's and click on search icon.<br><br>You can see the details of the syllabus in the table.<br><br>Thank you.</p>

                <h1 class="second-head">Start Syllabus Preparation</h1><br>
                <p>Hi,Admin.<br>Please follow the below instructions to start syllabus Preparation:<br><br>To start the Syllabus Preparation,you have to enter the Necessary Details:<br><br>Go to Prepare Syllabus Page.<br>1.Enter the Regulation which represents the Batch or year of joining of students.Like R19 or R20 etc.<br>2.Enter the Btech Year Of study and semester in which the subject belongs in the format Year-Sem like 3-1.<br>3.Enter the Subject name.<br>4.After entering subject name,click on tab and you will automatically receive the subject Id.<br>5.Enter the Names of the 3 different faculty who you chose to prepare the syllabus together,in the format "Firstname Lastname" both have to be capitalized.<br>6.Enter the Names of the 2 different Faculty who you chose to review the syllabus,in the format "Firstname Lastname" both have to be capitalized.<br><br>After this,click on submit button,the syllabus preparation will be started and the preparators will receive mail that they have been selected to create the syllabus.You,The Admin,Will also receive the mail of the subject Id.<br><br>Thank you.</p>

                <h1 class="second-head">Track Syllabus</h1><br>
                <p>Hi,Admin.<br>Please follow the below instrcutions to Track Ongoing Syllabus:<br><br>Go to Track & Message Section.<br><br>Select Subject Id from the list of Ongoing Syllabus Id's and click on the Track Syllabus Button.<br><br>Then,You can see the tracking information of the ongoing syllabus in a table.<br><br>Thank you.</p>

                <h1 class="second-head">Message Faculty</h1><br>
                <p>Hi,Admin.<br>Please follow the below instrcutions Message Preparator Regarding the ongoing syllabus:<br><br>Go to Track & Message Section.<br><br>Select Subject Id from the list of Ongoing Syllabus Id's and click on the Message Faculty Button.<br><br>Then,Select the faculty name you want to send a message and type the message in the "Type your Message Here..." Box.Then,the message will be sent to the faculty mail.<br><br>You can only send message to a specific subject preparator,who then communicates with other preparators.<br><br>Thank you.</p>

                <h1 class="second-head">Archives</h1><br>
                <p>Hi,Admin.<br>Please follow the below instrcutions to view Archived Syllabus:<br><br>Go to Archives page.<br><br>There you will automatically see all the archived syllabus details.<br><br>You can also download the Syllabus Pdf for a syllabus by clicking on "CLICK HERE" link.<br><br>Thank you.</p>

                <h1 class="second-head">End Syllabus</h1><br>
                <p>Hi,Admin.<br>Please follow the below instrcutions to end syllabus:<br><br>After the final pdf is uploaded,you would have received a mail with Subject id and final pdf as a attachment.<br><br>Go to End Syllabus Page.<br>Please enter the Subject Id,you received in the textbox and click on the submit button.Then the subject details will all be deleted and sent to the archives.You can view this subject details again archive column.<br><br>You cannot delete an ongoing subject preparation and can only delete the subject if the final pdf is uploaded.<br><br>Thank you.</p>
              </div>

            </div>


            <div class="outer-form">
                <h1 class="first-head">Search Ongoing Syllabus</h1><br>
                <form action="" method="post">
                    <select name="search" required>
                        <option selected>------------------------SELECT SUBJECT ID----------------------</option>                    
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
                  <button name="Submit"><i class="fa fa-search"></i></button><br>
                  <h4><span id="error"></span><h4>
                </form>
                <br>
            </div>
            <br>
            <?php 
                    if(isset($_POST['Submit']))
                    {
                        $sid=$_POST['search'];
                        $sql="SELECT * FROM ongoing_syllabus WHERE sid = '$sid' ;";
                        $data=mysqli_query($conn,$sql);
                        $tot=mysqli_num_rows($data);

                        if($tot==0){
                            echo "<script>errorMessage1()</script>";
                        }
                        else
                        {
                            $result=mysqli_fetch_assoc($data);
                            $sname=$result["sname"];
                            $Reg=$result["Regulation"];
                            $sem=$result["Sem"];
                            $sd=$result["Initialized_date"];
                            $pdf1=$result["Syllabus_pdf_1"];
                            $pdf2=$result["Syllabus_pdf_2"];
                            $rv1=$result["Review1"];
                            $rv2=$result["Review2"];
            ?>
                            <div class="table-div">
                                <br>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subject ID</th>
                                            <th>Subject Name</th>
                                            <th>Regulation</th>
                                            <th>Sem</th>
                                            <th>Start Date</th>
                                            <th>Syllabus Pdf 1</th>
                                            <th>Syllabus Pdf 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $sid;?></td>
                                            <td><?php echo $sname;?></td>
                                            <td><?php echo $Reg;?></td>
                                            <td><?php echo $sem;?></td>
                                            <td><?php echo $sd;?></td>
                                            <?php 
                                                $sql1="SELECT * FROM tracker WHERE sid = '$sid' ;";
                                                $data1=mysqli_query($conn,$sql1);
                                                $res1=mysqli_fetch_assoc($data1);

                                                if($res1["U1PDF"]==0 && $res1["U2PDF"]==0)
                                                {
                                            ?>
                                            <td><strong>NULL</strong></td>
                                            <td><strong>NULL</strong></td>
                                            <?php 
                                            } 
                                            else if($res1["U1PDF"]==1 && $res1["U2PDF"]==0)
                                            {
                                            ?>
                                            <td><a href="download.php?file=<?php echo $pdf1?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> CLICK HERE</a></td>
                                            <td><strong>NULL</strong></td>
                                            <?php 
                                            }
                                            else if($res1["U1PDF"]==0 && $res1["U2PDF"]==1)
                                            {
                                            ?>
                                            <td><strong>NULL</strong></td>
                                            <td><a href="download.php?file=<?php echo $pdf2?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> CLICK HERE</a></td>
                                            <?php 
                                            }
                                            else{
                                            ?>
                                            <td><a href="download.php?file=<?php echo $pdf1?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> CLICK HERE</a></td>
                                            <td><a href="download.php?file=<?php echo $pdf2?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> CLICK HERE</a></td>
                                            <?php 
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    <?php
                            }
                        } 
                    ?>
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
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
    </body>
</html>
