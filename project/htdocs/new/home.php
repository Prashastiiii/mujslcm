<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
<style>
body {
            background-image: url("Manipal.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
           
        }
        </style>
    <div class="nav" style="height: 75px";>
        <div class="logo">
        <a href="MUJ logo.png">
    <img src="MUJ logo.png" alt="MUJ Logo" style="height:100%; width: 150px; ";>
</a>
        </div>
        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

             while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_attend = $result['Attendance'];
                $res_course = $result['Course'];
                $res_gpa = $result['GPA'];
                $res_semester = $result['Semester'];
              
            }
        
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
            <a href="mark.php"> marks </a>  
                

        </div>
    </div>
    <main>
    <div class="main-box top" style="color: black; background-color: transparent;">

          <div class="top">
            
            <div class="box" style="color: black;">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome </p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>your attendance is  <b><?php echo $res_attend ?></b> </p>
            </div>
            <div class="bottom">
            <div class="box">
                <p>Course : <b><?php echo $res_course ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p> GPA : <b><?php echo $res_gpa ?></b>.</p> 
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p> semester : <b><?php echo $res_semester ?></b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>

