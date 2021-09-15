<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Main Page</title>
</head>
  
<body>
<div style="background-color:DodgerBlue;">
        <form action="login.php" method="post">
            <p><label>Username: <input type="text" name="name" size="20" maxlength="40" /></label></p>
            <p><label>Password: <input type="text" name="password" size="20" maxlength="40" /></label></p>
            <p><input type="submit" value="Login" /></p>
        </form>

		<form action="register.php">
            <input type="submit" value="Register">
        </form>
</div>

        <center><h1>My Course Rater</h1></center>

        <form action="insert_rating.php" method="post">
            <p><label>Course: <input type="text" name="course" size="20" maxlength="40" /></label></p>
            <p><label>Rating: <input type="text" name="rating" size="20" maxlength="40" /></label></p>
            <p><label>Comments: <textarea name="comments" rows="3" cols="40"></textarea></label></p>
            <p><input type="submit" value="Submit My Rating" /></p>
        </form>
        <br>

        <form action="search.php" method="post">
            <p><label>Enter the course name: <input type="text" name="search" size="20" maxlength="40" /></label></p>
            <p><input type="submit" value="Search comments" /></p>
        </form>
        <br>

<div style="background-color:LightGrey;">
       <?php
               $hostname = "localhost";
               $username = "root";
               $password = "";
               $dbname = "project1";

               $conn = new mysqli($hostname, $username, $password, $dbname);
               if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
               }

       		$sql = "SELECT * FROM ratings";
       		$result = $conn->query($sql);

       		if ($result->num_rows > 0) {
       		  while($row = $result->fetch_assoc()) {
       			echo "<center><p><b>Course: </b>" . $row["course"]. "</p></center>";
       			echo "<center><p><b>Rating: </b>" . $row["rating"]. "</p></center>";
       			echo "<center><p><b>Comments: </b>" . $row["comments"]. "</p><br></center>";
       		  }
       		} else {
       		  echo "<p>0 results</p>";
       		}

            mysqli_close($conn);
       ?>
</div>
</body>
  
</html>