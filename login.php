<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
</head>

<body>
          <?php
             $hostname = "localhost";
             $username = "root";
             $password_ = "";
             $dbname = "project1";

             $conn = new mysqli($hostname, $username, $password_, $dbname);
             if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }

              session_start();

              if($_SERVER["REQUEST_METHOD"] == "POST") {
                 $name = $_REQUEST['name'];
                 $password = $_REQUEST['password'];

                  $sql = "SELECT * FROM users
                    WHERE name='$name' and password='$password'";

                  $result = $conn->query($sql);
                   if ($result->num_rows == 1) {
                    $_SESSION['login_user'] = $name;

                    header("location: welcome.php");
           } else {
               echo "<h2>Incorrect Username and Password!</h2>";
           }
           }
                mysqli_close($conn);
         ?>

</body>

</html>