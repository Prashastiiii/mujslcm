<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit(); // Add this to stop further execution
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
    <style>
        body {
            background-image: url("Manipal.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;  
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"></a></p>
        </div>
        <a href="php/logout.php"><button class="btn">Log Out</button></a>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $subject = $_POST['subject']; // Corrected variable name
                $date = $_POST['date']; // Corrected variable name
                $course = $_POST['course'];
                $class = $_POST['class']; // Corrected variable name
               
                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE teacher SET Username='$username', Email='$email', Age='$age',Subject_teaching='$subject',Date_of_joining='$date',Course='$course',Current_classes='$class' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT * FROM teacher WHERE Id=$id ");

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
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" value="<?php echo $res_Uname; ?>" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" value="<?php echo $res_Email; ?>" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" value="<?php echo $res_Age; ?>" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="subject">Subject Teaching</label>
                    <input type="text" name="subject" id="subject" autocomplete="off" value="<?php echo $res_subject; ?>" required>
                </div>
                <div class="field input">
                    <label for="date">Date of Joining</label>
                    <input type="date" name="date" id="date" autocomplete="off" value="<?php echo $res_date; ?>" required>
                </div>
                <div class="field input">
                    <label for="course">Course</label>
                    <input type="text" name="course" id="course" autocomplete="off" value="<?php echo $res_course; ?>" required>
                </div>

                <div class="field input">
                    <label for="class">Current Classes</label>
                    <input type="text" name="class" id="class" autocomplete="off" value="<?php echo $res_class; ?>" required>
                </div>
              
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
