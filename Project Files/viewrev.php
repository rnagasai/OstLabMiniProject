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
                width: 98%;
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
             h4{
            color: red;
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
            textarea{
                resize: none;
                width: 1400px;
                height: 145px;
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
            .outer-form input{
                  height: 50%;
                  width: 50%;
                  color: #222;
                  font-size: 16px;
                  padding: 3px;
                  font-family: 'Poppins',sans-serif;
            }
            input[type="Submit"]{
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
            <div class="outer-form">
                <h1 class="first-head">View Given Reviews</h1><br>
                <form action="" method="post">
                    <h3>Enter Subject Id : </h3>
                    <input type="text" name="id" required><br><br>
                    <input type="Submit" name="Submit"><br><br>
                    <?php if(isset($_POST["Submit"]))
                    {
                        $sid=$_POST["id"];
                        $sql="SELECT * FROM ongoing_syllabus WHERE sid = '$sid' ;";
                        $data=mysqli_query($conn,$sql);
                        $tot=mysqli_num_rows($data);

                        $id=$_SESSION['fid'];
                        $sql1="SELECT * FROM assigned_prep WHERE sid = '$sid' AND fid = '$id' ;";
                        $data1=mysqli_query($conn,$sql1);
                        $tot1=mysqli_num_rows($data1);

                        $sql2="SELECT * FROM tracker WHERE sid = '$sid' ;";
                        $data2=mysqli_query($conn,$sql2);
                        $result2=mysqli_fetch_assoc($data2);

                        if($tot==0){
                            echo "<h4>Subject Id Invalid!!</h4>";
                        }
                        else if($tot1==0){
                            echo "<h4>You do not have access to view reviews!!</h4>";
                        }
                        else if($result2["GR"]==0){
                            echo "<h4>Reviews are not yet given please come again when notified!!</h4>";
                        }
                        else{
                            $sql1="UPDATE tracker SET VGR=1 WHERE sid = '$sid' ;";
                            mysqli_query($conn,$sql1);

                            $result=mysqli_fetch_assoc($data);
                            $review1=$result["Review1"];
                            $review2=$result["Review2"];
                        ?>
                            <h3>Review - 1 : </h3><br>
                            <textarea name="rev1" readonly><?php echo $review1;?></textarea><br>
                            <h3>Review - 2 : </h3><br>
                            <textarea name="rev2" readonly><?php echo $review2;?></textarea>

                    <?php } }?>
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