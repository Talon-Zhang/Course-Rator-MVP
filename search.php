<!DOCTYPE html>
<html>

<head>
    <title>Search Page</title>
</head>

<body>
        <?php
        $search = $_REQUEST['search'];

        $hostname = "localhost";
        $username = "root";
        $password_ = "";
        $dbname = "project1";

        $conn = new mysqli($hostname, $username, $password_, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

		$sql = "SELECT * FROM ratings
		        WHERE course='$search'
		        ORDER BY rating DESC";
		$result = $conn->query($sql);

        echo "<h2>Search Result: $search</h2> ";
		if ($result->num_rows > 0) {
               		  while($row = $result->fetch_assoc()) {
               			echo "<p><b>Course: </b>" . $row["course"]. "</p>";
               			echo "<p><b>Rating: </b>" . $row["rating"]. "</p>";
               			echo "<p><b>Comments: </b>" . $row["comments"]. "</p><br>";
               		  }
               		} else {
               		  echo "<p>0 results</p>";
               		}

                    mysqli_close($conn);
        ?>
</body>
</html>