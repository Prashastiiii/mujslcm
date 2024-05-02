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
            $query = mysqli_query($con,"SELECT*FROM teacher WHERE Id=$id");

             while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_subject = $result['Subject_teaching'];
                $res_date = $result['Date_of_joining'];
                $res_course = $result['Course'];
                $res_class = $result['Current_classes'];
              
            }
        
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
            <a href="edit.php">Update Profile</a>
            <a href="register1.php">Add student</a>
            <a href="markadd.php">Add marks</a>

        </div>
    </div>
    <main>


    <div class="main-box top">
          <div class="top" >
            
            <div class="box">
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
                <p>Subject taught <b><?php echo $res_subject ?></b> </p>
            </div>
            <div class="bottom">
            <div class="box">
                <p>Date : <b><?php echo $res_date ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p> course : <b><?php echo $res_course ?></b>.</p> 
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p> Current classes : <b><?php echo $res_class ?></b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>