// Create database
$sql = "CREATE DATABASE my_portifolio";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

CREATE TABLE log_in_table (
    FirstName VARCHAR(20),
    LastName varchar(255),
    email varchar(255),
    phoneNo varchar(255),
    password varchar(255)
);