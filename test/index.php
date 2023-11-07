<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee</title>
</head>
<body>
    <h1>Insert Employee Information</h1>
    <form method="post" action="insert_process.php">
        <label for="EmpName">Employee Name:</label>
        <input type="text" name="EmpName" required><br>

        <label for="BasicSalary">Basic Salary:</label>
        <input type="text" name="BasicSalary" required><br>

        <label for="DA">DA:</label>
        <input type="text" name="DA" required><br>

        <label for="PF">PF:</label>
        <input type="text" name="PF" required><br>

        <input type="submit" value="Submit">
    </form>

    <hr />

    <form method="post" action="select_employee.php">
        <input type="submit" value="fetch data">
    </form>
</body>
</html>
