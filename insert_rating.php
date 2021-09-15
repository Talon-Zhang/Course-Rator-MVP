<!DOCTYPE html>
<html>

<head>
    <title>Insert Rating Page</title>
</head>

<body>
        <?php
         $course = $_REQUEST['course'];
         $rating = $_REQUEST['rating'];
         $comments = $_REQUEST['comments'];

        $hostname = "localhost";
        $username = "root";
        $password_ = "";
        $dbname = "project1";

        $conn = new mysqli($hostname, $username, $password_, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO ratings (course, rating, comments)
        VALUES ('$course', '$rating', '$comments')";

        if(mysqli_query($conn, $sql)){
            echo "<p>Successfully inserted ratings for <b>$course</b></p> ";
        } else {
            echo "<p>ERROR: </p>".mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

        <form action="index.php">
                    <input type="submit" value="Insert another rating">
                </form>
</body>
</html>