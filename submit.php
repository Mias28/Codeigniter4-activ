<?php
// Get the form input data
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$gender = $_POST['gender'];

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "users_db";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert the data into the database
$sql = "INSERT INTO users (last_name, first_name, dob, address, gender) VALUES ('$last_name', '$first_name', '$dob', '$address', '$gender')";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully.";
} else {
  echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
