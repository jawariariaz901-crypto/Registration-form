
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student101_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Insert data into database
$stmt = $conn->prepare("INSERT INTO students101 (name, email, course, gender, dob, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $course, $gender, $dob, $phone, $address);

if ($stmt->execute()) {
    echo "New student registered successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();