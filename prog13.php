<?php
$host="localhost:3306";
$username="root";
$password="";
$database="employeedb";
$conn=new mysqli($host,$username,$password,$database);
if($conn->connect_error){
echo("connection falied:".$conn->connect_error);
}
function getAggregateData($conn, $query, $label){
$result=$conn->query($query);
$row=$result->fetch_assoc();
echo"$label:".$row[array_key_first($row)]."<br>";
}
getAggregateData($conn, "SELECT COUNT(*) as total_users FROM user","Total User ");
getAggregateData($conn, "SELECT SUM(salary) as total_salary FROM user","Total Salary
");
getAggregateData($conn, "SELECT AVG(salary) as avg_salary FROM user","average
Salary ");
getAggregateData($conn, "SELECT MIN(salary) as min_salary FROM user","Minimum
Salary ");
getAggregateData($conn, "SELECT MAX(salary) as max_salary FROM user","Maximum
Salary ");
$conn->close();
?>
