<!DOCTYPE html>
<html>
<head>
    <title>Employees with Salary Less Than 50000</title>
</head>
<body>
    <h1>Employees with Salary Less Than 50000</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "EmployeeDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Employees WHERE NetSalary < 50000";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Employee Code</th><th>Employee Name</th><th>Net Salary</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['EmpCode'] . "</td><td>" . $row['EmpName'] . "</td><td>" . $row['NetSalary'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No employees found with a salary less than 50000.";
    }

    $conn->close();
    ?>

    <hr />
    <form method="post" action="index.php">
            <input type="submit" value="Home">
    </form>
</body>
</html>
