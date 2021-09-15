<!DOCTYPE html>
<html>

<head>
    <title>Favorite Page</title>
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
         $favorite = $_REQUEST['favorite'];
        $name = $_SESSION['login_user'];

        $sql = "update users set favorite=concat(favorite, ' $favorite')
        where name='$name';";

        if(mysqli_query($conn, $sql)){
            echo "<p>Successfully inserted favorite course <b>$favorite</b></p> ";
        } else {
            echo "<p>ERROR: </p>".mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

    <form action="welcome.php">
                    <input type="submit" value="Insert another favorite course">
                </form>
</body>
</html>