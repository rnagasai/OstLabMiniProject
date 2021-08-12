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
        <script type="text/javascript">
            $(document).ready(function(){
              $('form div input').change(function () {

                $('form div p').text(this.files.length + " file(s) selected");
              });
            });
            function errorMessage1() {
                var error = document.getElementById("error");
                error.textContent = "Subject Code Invalid!!";
                error.style.color = "red";
            }
            function errorMessage2() {
                var error = document.getElementById("error");
                error.textContent = "Unable to Upload,Reviews Not yet Given!!";
                error.style.color = "red";
            }
            function errorMessage3() {
                var error = document.getElementById("error");
                error.textContent = "You do not have access to upload the pdf!!";
                error.style.color = "red";
            }
            function errorMessage4() {
                var error = document.getElementById("error");
                error.textContent = "Cannot upload final Pdf,Any one of the preparators have not viewed reviews,please check them!!";
                error.style.color = "red";
            }
            function successMessage1() {
                var error = document.getElementById("error");
                error.textContent = "PDF Uploaded Successfully!!";
                error.style.color = "blue";
            }
        </script>
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
           *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            h4{
                font-family: Comic Sans MS, Comic Sans, cursive;
              }
            .outer-wrap{
                width: 615px;
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
            .form-file{
                height: 200px;
                border: 4px dashed black;
            }
            .form-file p{
              width: 100%;
              height: 100%;
              text-align: center;
              line-height: 170px;
              color: black;
              font-family: Arial;
            }
            .form-file input{
              position: absolute;
              margin: 0;
              padding: 20px;
              outline: none;
              opacity: 0;
              padding-right: 0px;
              width: 544px;
              height: 220px;
              right: 0px;
              top: 0px;
              left: 0px;
              padding-bottom: 0px;
              border-top-width: 200px;
               margin-top: 173px;
            margin-left: 15px;

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
            <div class="outer-wrap">
                <h1 class="first-head">Upload Syllabus</h1><br>
                <form method="post" enctype="multipart/form-data">
                    <h3>Enter Subject Code : </h3>
                    <input type="text" name="sid" required><br><br>
                    <h3>Upload Syllabus pdf(File size should not exceed 600Kb and should be typed and formatted) : </h3><br><br>
                    <div class="form-file">
                        <input type="file" name="file" required>
                        <strong><p id="p1">Drag your files here or click in this area.</p></strong>
                    </div>
                    <br>
                    <input type="submit" name="submit"> 
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
    
    function foo() 
    {
        unset($GLOBALS['files']);
        unset($GLOBALS['to']);
        unset($GLOBALS['subject']);
        unset($GLOBALS['from']);
        unset($GLOBALS['headers']);
        unset($GLOBALS['mime_boundary']);
        unset($GLOBALS['file']);
        unset($GLOBALS['data']);
        unset($GLOBALS['name']);
        unset($GLOBALS['ok']);
        unset($GLOBALS['x']);

    }
    function mailing1($email1,$mes1){
        if (isset($_FILES) && (bool) $_FILES) 
                    {

                        $allowedExtensions = array("pdf", "doc", "docx", "gif", "jpeg", "jpg", "png", "txt");

                        $files = array();
                        foreach ($_FILES as $name => $file) {
                            $file_name = $file['name'];
                            $temp_name = $file['tmp_name'];
                            $file_type = $file['type'];
                            $path_parts = pathinfo($file_name);
                            $ext = $path_parts['extension'];
                            if (!in_array($ext, $allowedExtensions)) {
                                die("File $file_name has the extensions $ext which is not allowed");
                            }
                            array_push($files, $file);
                        }

                       /* $email=$email1+","+$email2;*/
                        $to = $email1;
                        $from = "nagyoung20@gmail.com";  //your website email type here
                        $subject = "Regarding Subject Preparation from OSPMS";
                        $message = $mes1;
                        $headers = "From: $from";


                        $semi_rand = md5(time());
                        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";


                        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
                        $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
                        $message .= "--{$mime_boundary}\n";

                        // preparing attachments
                        for ($x = 0; $x < count($files); $x++) {
                            $file = fopen($files[$x]['tmp_name'], "rb");
                            $data = fread($file, filesize($files[$x]['tmp_name']));
                            fclose($file);
                            $data = chunk_split(base64_encode($data));
                            $name = $files[$x]['name'];
                            $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                                    "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                            $message .= "--{$mime_boundary}\n";
                        }
                        // send

                        $ok = mail($to, $subject, $message, $headers);                        
                    }
    }
    if (isset($_POST["submit"]))
     {
         $title = $_POST["sid"];

         $sql = "SELECT * FROM ongoing_syllabus WHERE sid='$title';";
         $data=mysqli_query($conn,$sql);
         $tot=mysqli_num_rows($data);
         
         $id=$_SESSION['fid'];
         $sql1="SELECT * FROM assigned_prep WHERE sid = '$title' AND fid = '$id' ;";
         $data1=mysqli_query($conn,$sql1);
         $tot1=mysqli_num_rows($data1);

         if($tot==0){
            echo "<script>errorMessage1()</script>";
         }
         else if($tot1==0){
            echo "<script>errorMessage3()</script>";
         }
         else{
                $sql="SELECT * FROM tracker WHERE sid='$title';";
                $data=mysqli_query($conn,$sql);
                $result=mysqli_fetch_assoc($data);

                if($result["U1PDF"]==1 && $result["GR"]==1 && $result["VGR"]==1)
                {

                    $sql1="SELECT * FROM admin WHERE aid=1;";
                    $data1=mysqli_query($conn,$sql1);
                    $res1=mysqli_fetch_assoc($data1);

                    $email=$res1["Email_id"];
                    $mes1 = "Dear admin,\n\nthe final syllabus pdf for the subject id : ".$title." has been uploaded.Please check the below pdf attachement and if any changes to be made,message any preparator and after they upload the pdf with changes made then end the syllabus.\n\nRegards";
                    
                    mailing1($email,$mes1);
                    foo();
                    

                    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                     $tname = $_FILES["file"]["tmp_name"];
                     $uploads_dir = 'uploads';
                     move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $sql = "UPDATE ongoing_syllabus SET Syllabus_pdf_2='$pname' WHERE sid='$title';";
                    mysqli_query($conn,$sql);
                    $sql="UPDATE tracker SET U2PDF=1 WHERE sid='$title';";
                     mysqli_query($conn,$sql);
                
                    echo "<script>successMessage1()</script>";
                }
                else if($result["U1PDF"]==1 && $result["GR"]==0)
                {
                    echo "<script>errorMessage2()</script>";
                }
                else if($result["U1PDF"]==1 && $result["VGR"]==0){
                    echo "<script>errorMessage4()</script>";
                }
                else
                {

                    $sql1="SELECT * FROM faculty WHERE fid IN (SELECT fid FROM assigned_review WHERE sid='$title');";
                    $data1=mysqli_query($conn,$sql1);

                    $res1=mysqli_fetch_assoc($data1);
                    $email1=$res1["Email_id"];

                    $res2=mysqli_fetch_assoc($data1);
                    $email2=$res2["Email_id"];

                    $mes1="Dear faculty,\n\n You have been assigned to review the subject syllabus of subject id : ".$title.".Login to your OSPMS faculty account and give review on concerned subject.Please check the below Syllabus pdf attachement.\n\nRegards";

                    mailing1("$email1, $email2",$mes1);
                    foo();
                    

                    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                     $tname = $_FILES["file"]["tmp_name"];
                     $uploads_dir = 'uploads';
                     move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $sql = "UPDATE ongoing_syllabus SET Syllabus_pdf_1='$pname' WHERE sid='$title';";
                     mysqli_query($conn,$sql);
                    $sql="UPDATE tracker SET U1PDF=1 WHERE sid='$title';";
                     mysqli_query($conn,$sql);
                     echo "<script>successMessage1()</script>";
                }


         }


        
    }
 
?>