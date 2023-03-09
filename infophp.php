<!doctype html>
<html lang="en">
<head>
</head>
<body>
<?php
function validate_input($data) {
$data = trim($data);//remove any trailing spaces
$data = stripslashes($data);//remove and unnecessary slashes
$data = htmlspecialchars($data); //convert any special chars to their html equivalent
return $data;
}
//Check all the fields have data
if (isset($_POST['submit'])) { //Check that the submit button was pressed
if(!empty($_POST['firstname'])) { //Check that the field name FirstName isnot empty
$FirstName = validate_input($_POST['firstname']); //Check the input is valid
}
if(!empty($_POST['email'])) {
$SecondName = validate_input($_POST['email']);
}
if(!empty($_POST['gender'])) {
$Gender = validate_input($_POST['gender']);
    }
if(!empty($_POST['address_line_1'])) {
$addressline1 = validate_input($_POST['address_line_1']);
    }
if(!empty($_POST['address_line_2'])) {
$addressline2 = validate_input($_POST['address_line_2']);
    }
if(!empty($_POST['city'])) {
$city = validate_input($_POST['city']);
    }
if(!empty($_POST['county'])) {
$county = validate_input($_POST['county']);
    }
if(!empty($_POST['house_number'])) {
$house_number = validate_input($_POST['house_number']);
    }
    if(!empty($_POST['post_code'])) {
$postcode = validate_input($_POST['post_code']);
        echo "$postcode";}
        if(!empty($_POST['contact_number'])) {
$number = validate_input($_POST['contact_number']);
           echo "$number"; }
if(!empty($_POST['pass'])) {
$Pwd = validate_input($_POST['pass']);
}
if(!empty($_POST['confirm_pass'])) {
    $confirm_pass = validate_input($_POST['confirm_pass']);
    }
}
$servername = "10.140.42.235";
$username = "AP";
$password = "password";
$database = "ap_bob";
$port = "3307";
$conn = mysqli_connect($servername, $username, $password,$database,$port);
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}
else{
$sql = "insert into info (firstname, email, pass, confirm_pass, gender, address_line_1, address_line_2, city, county, house_number, post_code, contact_number) VALUES
('$FirstName','$SecondName','$Pwd', '$confirm_pass','$Gender','$addressline1','$addressline2','$city','$county','$house_number','$postcode','$number' )";
if(mysqli_query($conn, $sql)){
    echo "Data added successfully :)";
    }
    else{
    echo "Unable to add data at this time :|". mysqli_errno($conn);
    }
    }
    mysqli_close($conn);
    ?>
    </body>
    </html>