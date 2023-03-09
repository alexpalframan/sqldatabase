<html>
    <head>
</head>
<?php
$servername = "10.140.42.235";
$username = "AP";
$password = "password";
$database = "ap_bob";
$port = "3307";

$conn = mysqli_connect($servername,$username,$password,$database, $port);

//check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL " . mysqli_connect_error();
    exit();
}
else{
    echo "Connection Successful <br>";
};

//database
/*
$sql = "CREATE DATABASE ap_databasepreq1";
if (mysqli_query($conn , $sql)){
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
};
mysqli_select_db($conn , "ap_databasepreq1");
    $result = mysqli_query($conn, "SELECT DATABASE()");
    $row = mysqli_fetch_row($result);
    printf("Connected to database is %s.<br>", $row[0]);
*/
//table

$sql = "CREATE TABLE Info(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    pass VARCHAR(30),
    confirm_pass VARCHAR(30),
    gender VARCHAR(30) check(GENDER in ('Male', 'Female', 'Unknown')),
    address_line_1 VARCHAR(30),
    address_line_2 VARCHAR(30),
    city VARCHAR(30),
    county VARCHAR(30),
    house_number VARCHAR(30),
    post_code VARCHAR(30),
    contact_number VARCHAR(30)
    )";

    if(mysqli_query($conn, $sql)){
        echo "Table Info created successfully <br>";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
    </html>