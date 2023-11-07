<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmployeeDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$EmpName = $_POST['EmpName'];
$BasicSalary = $_POST['BasicSalary'];
$DA = $_POST['DA'];
$PF = $_POST['PF'];

$NetSalary = $BasicSalary + $DA - $PF;

$sql = "INSERT INTO Employees (EmpName, BasicSalary, DA, PF, NetSalary)
        VALUES ('$EmpName', $BasicSalary, $DA, $PF, $NetSalary)";

if ($conn->query($sql) === TRUE) {
    echo "Employee record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<hr />
<form method="post" action="index.php">
        <input type="submit" value="Home">
</form>