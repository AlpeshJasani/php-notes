Certainly! Below are examples of PHP code for database programming, including database connectivity, implementation of CRUD (Create, Read, Update, Delete) operations, and the execution of prepared statements and stored procedures. For demonstration purposes, I'll use MySQL as the database.

### Database Connectivity:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### Create Operation (INSERT):

```php
<?php
// Assuming form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
```

### Read Operation (SELECT):

```php
<?php
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}
?>
```

### Update Operation (UPDATE):

```php
<?php
// Assuming form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newName = $_POST["new_name"];

    $sql = "UPDATE users SET name='$newName' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
```

### Delete Operation (DELETE):

```php
<?php
// Assuming form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
```

### Prepared Statement:

```php
<?php
// Assuming form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Set parameters and execute
    $name = $_POST["name"];
    $email = $_POST["email"];

    $stmt->execute();

    echo "Record created successfully";

    $stmt->close();
}
?>
```

### Stored Procedure Execution:

```php
<?php
// Assuming form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Assuming "sp_DeleteUser" is a stored procedure
    $stmt = $conn->prepare("CALL sp_DeleteUser(?)");
    $stmt->bind_param("i", $id);

    // Set parameters and execute
    $id = $_POST["id"];

    $stmt->execute();

    echo "Record deleted successfully";

    $stmt->close();
}
?>
```

Please note that these examples are simplified for demonstration purposes, and you should take additional measures for security, error handling, and validation in a production environment. Also, consider using more advanced database abstraction layers or frameworks for larger projects.
