<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $Attendance = $_POST['attendance'];
            $Course = $_POST['course'];
            $GPA = $_POST['gpa'];
            $Semester = $_POST['semester'];
            

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con, "INSERT INTO users (Username, Email, Age, Password, Attendance, Course, GPA, Semester) VALUES ('$username', '$email', '$age', '$password', '$Attendance', '$Course', '$GPA', '$Semester')") or die("Error Occurred");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Home</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
            
                <div class="field input">
                    <label for="attendance">Attendance</label>
                    <input type="number" name="attendance" id="attendance" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="course">Course</label>
                    <input type="text" name="course" id="course" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="gpa">GPA</label>
                    <input type="number" name="gpa" id="gpa" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" autocomplete="off" required>
                </div>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                
            </form>
        </div>
        
        <?php } ?>
      </div>
</body>
</html>