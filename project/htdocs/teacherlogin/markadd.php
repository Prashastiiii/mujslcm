<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Add marks</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $OS = $_POST['OS'];
            $DSA = $_POST['DSA'];
            $webtech = $_POST['webtech'];
            $oops = $_POST['oops'];
       

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT id FROM marks WHERE id='$id'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Marks are already given for this student !</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con, "INSERT INTO marks (id,OS,DSA,webtech, oops) VALUES ('$id','$OS', '$DSA', '$webtech', '$oops')") or die("Error Occurred");

            echo "<div class='message'>
                      <p>Graded Succesfully!</p>
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Home</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
            <div class="field input">
                    <label for="id">id</label>
                    <input type="number" name="id" id="id" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="OS">OS</label>
                    <input type="number" name="OS" id="OS" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="DSA">DSA</label>
                    <input type="number" name="DSA" id="DSA" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="webtech">webtech</label>
                    <input type="number" name="webtech" id="webtech" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="oops">oops</label>
                    <input type="number" name="oops" id="oops" autocomplete="off" required>
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