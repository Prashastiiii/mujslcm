<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Marks</title>
    <style>
    body {
            background-image: url("Manipal.jpg");
            background-size: cover;
     
        }

        /* Your existing CSS styles */
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="MUJ logo.png">
                <img src="MUJ logo.png" alt="MUJ Logo">
            </a>
        </div>
        <div class="right-links">
            <a href="php/logout.php" class="btn">Log Out</a>
            <a href="mark.php">Marks</a>
        </div>
    </div>

    <table>
        <tr>
            <th>OS</th>
            <th>DSA</th>
            <th>Web Tech</th>
            <th>OOPS</th>
        </tr>
        <?php
        session_start();
        include("php/config.php");
        if(!isset($_SESSION['valid'])){
            header("Location: index.php");
            exit();
        }

        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tutorial";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['id'];
        $sql = "SELECT OS, DSA, webtech,oops FROM marks WHERE id = $id";
        
        $result = $conn->query($sql);
        if (!$result) {
          die("Query failed: " . mysqli_error($conn));
        }
        
        // Check if results found and display table
        if ($result->num_rows > 0) {
          echo "<style>";
          echo "table {";
          echo "  border-collapse: collapse;";
          echo "  width: 100%;";
          echo "}";
          echo "th, td {";
          echo "  border: 1px solid #ddd;";
          echo "  padding: 8px;";
          echo "}";
          echo "th {";
          echo "  background-color: #f2f2f2;";
          echo "}";
          echo "</style>";
        
          echo "<table>";
          echo "<tr>";
          echo "<th>OS</th>";
          echo "<th>DSA</th>";
          echo "<th>Web Tech</th>";
          echo "<th>OOPS</th>";
          echo "</tr>";
        
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["OS"] . "</td>";
            echo "<td>" . $row["DSA"] . "</td>";
            echo "<td>" . $row["webtech"] . "</td>";
            echo "<td>" . $row["oops"] . "</td>";
            echo "</tr>";
          }
        
          echo "</table>";
        } else {
          echo "No marks found for this user.";
        }
        
        $conn->close();
        ?>
    </table>
</body>
</html>
