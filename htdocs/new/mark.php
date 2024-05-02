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
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .nav {
            background-color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        .btn{
            height: 90%;
        }
        .nav .logo img {
            height: 80px;
            width: auto;
        }

        .nav .right-links a {
            margin-left: 20px;
           
            color: rgba(233, 132, 65, 0.999);
            font-weight: bold;
        }

        .table-container {
            margin-top: 200px;
            margin-left: 370px;
        
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }
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
            <a href="php/logout.php" class="btn" style = "color: white";>Log Out</a>
            <a href="home.php">Home</a>
        </div>
    </div>

    <div class="table-container">
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
            if (!isset($_SESSION['valid'])) {
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
            $sql = "SELECT OS, DSA, webtech, oops FROM marks WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Fetch and display marks in table rows
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["OS"] . "</td>";
                    echo "<td>" . $row["DSA"] . "</td>";
                    echo "<td>" . $row["webtech"] . "</td>";
                    echo "<td>" . $row["oops"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No marks found for this user.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
