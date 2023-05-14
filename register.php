<!DOCTYPE html>
<html>
<head>
	<title>User Form</title>
</head>
<body>
	<h1>User Form</h1>
	<form action="submit.php" method="post">
		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required><br><br>

		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required><br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" required><br><br>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required><br><br>

		<label for="gender">Gender:</label>
		<input type="radio" id="male" name="gender" value="male" required>
		<label for="male">Male</label>
		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label><br><br>

		<input type="submit" value="Submit">
	</form>

	<h2>Saved Users</h2>
	<table border="1">
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Date of Birth</th>
			<th>Address</th>
			<th>Gender</th>
		</tr>
		<?php
			// Connect to the database and retrieve the data
			 $host = "localhost";
			 $user = "root";
			 $password = "";
			 $dbname = "users_db";

			 $conn = mysqli_connect($host, $user, $password, $dbname);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT * FROM users";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['last_name'] . "</td>";
					echo "<td>" . $row['first_name'] . "</td>";
					echo "<td>" . $row['dob'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['gender'] . "</td>";
					echo "</tr>";
				}
			}

			mysqli_close($conn);
		?>
	</table>
</body>
</html>
