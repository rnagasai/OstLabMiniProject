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
        <title>Faculty_home--Online Syllabus Preparation Management System</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="faculty_home.css">  
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
            function upl(){
                window.location.href = "upl.php";
            }
            function home(){
                window.location.href = "faculty_home.php";
            }
            function review(){
                window.location.href = "review.php";
            }
            function viewrev(){
                window.location.href = "viewrev.php";
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
                    <li><a href="#" class="upl" id="upl" onclick="upl()">Upload Syllabus</a></li>
                    <li><a href="#" class="review" id="review" onclick="review()">Review Syllabus</a></li>
                    <li><a href="#" class="viewrev" id="viewrev" onclick="viewrev()">View Reviews</a></li>
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
                <p>Hi,Faculty.<br>Please follow the below instrcutions to view Ongoing Syllabus Details:<br><br>Go to Home page.<br><br>Enter the subject id of the syllabus you want to see in the search box and click on search icon.<br><br>You can see the details of the syllabus in the table.<br><br>Thank you.</p>

                <h1 class="second-head">Upload Syllabus Pdf</h1><br>
                <p>Hi,Faculty.<br>Please follow the below instrcutions to upload syllabus pdf created:<br><br>Go to Upload Syllabus Section.<br><br>Please,enter the subject Id given to you in the textbox and click on uploading area and upload a pdf of length upto 900 KB.Then,click on "Submit" button.Then,your pdf is uploaded.<br><br>If you are uploading first pdf,then the mails will be sent to reviwers with pdf attachment after uploading the pdf.You cannot upload the final pdf until reviews are given and atleast one of you three check the reviews in the View Given Reviews Section.Once you upload the final pdf,you cannot upload again.<br><br>Thank you.</p>

                <h1 class="second-head">Review Syllabus</h1><br>
                <p>Hi,Faculty.<br>Please follow the below instrcutions to give reviews:<br><br>After the first pdf is uploaded,you would have received a mail with subject id of the ongoing subject along with the pdf.<br><br>Please enter the Subject Id,you received in the textbox and enter the review in the "Type your Review Here..." Box.Then,click on the submit button.Reviews are uploaded and preparators will be alerted.<br><br>You cannot give review a second time and to give review you have to be the reviewer assigned of the concerned subject.<br><br>Thnak you.</p>

                <h1 class="second-head">View Given Reviews</h1><br>
                <p>Hi,Faculty.<br>Please follow the below instrcutions to view reviews:<br><br>After the reviews are given,all preparators for the subjects would have received the mail that reviews for the subject id have been given.<br><br>Please enter the Subject Id,you received in the textbox and click on the submit button,you will see the two reviews.<br><br>The preparators cannot see the reviews if one or no reviews are given.Preparators can only upload the pdf if any one of the three preparators see the given reviews atleast once.<br><br>Thank you.</p>
              </div>

            </div>

            <div class="outer-form">
                <h1 class="first-head">Search Ongoing Syllabus</h1><br>
                <form action="" method="post">
                  <input type="text" placeholder="Search By Subject Id. . ." name="search">
                  <button name="Submit"><i class="fa fa-search"></i></button><br>
                  <h4><span id="error"></span><h4>
                </form>
                <br>
            </div>
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