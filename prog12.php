<?php
$host = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "Hello_world";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO employee (username, password)
VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
echo "Employee Login successful!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}}?>
<html><head>
<title>Employee Login Form</title>
</head>
<body>
<form action="" method="post">
<label for="username">username:</label>
<input type="text" name="username" required><br>
<label for="password">password:</label>
<input type="text" name="password" required><br>
<button type="submit">Submit</button>
</form></body></html>
