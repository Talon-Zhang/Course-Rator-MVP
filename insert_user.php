<!DOCTYPE html>
<html>

<head>
    <title>Insert User Page</title>
</head>

<body>
        <?php
         $name = $_REQUEST['name'];
         $password = $_REQUEST['password'];

        $hostname = "localhost";
        $username = "root";
        $password_ = "";
        $dbname = "project1";

        $conn = new mysqli($hostname, $username, $password_, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (name, password)
        VALUES ('$name', '$password')";

        if(mysqli_query($conn, $sql)){
            echo "<p>Successfully registered username <b>$name</b></p>";
        } else {
            echo "<p>ERROR: </p>".mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

        <form action="index.php">
                    <input type="submit" value="Back to main">
                </form>
</body>
</html>