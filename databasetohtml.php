<?php

 # Init the MySQL Connection
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

 
 # Prepare the SELECT Query
  $selectSQL =  'SELECT * FROM `info`';
  if( !( $selectRes = mysqli_query($conn, $selectSQL) )){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno($conn).': '.mysqli_error($conn);
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
    <th>id</th>
    <th>firstname</th>
    <th>email</th>
    <th>pass</th>
    <th>confirm_pass</th>
    <th>gender</th>
    <th>address_line_1</th>
    <th>address_line_2</th>
    <th>city</th>
    <th>county</th>
    <th>house_number</th>
    <th>post_code</th>
    <th>contact_number</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="13">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['id']}</td><td>{$row['firstname']}</td><td>{$row['email']}</td><td>{$row['pass']}</td><td>{$row['confirm_pass']}</td><td>{$row['gender']}</td><td>{$row['address_line_1']}</td><td>{$row['address_line_2']}</td><td>{$row['city']}</td><td>{$row['county']}</td><td>{$row['house_number']}</td><td>{$row['post_code']}</td><td>{$row['contact_number']}</td></tr>\n";
        }
      };
    ?>
  </tbody>
</table>
    <?php
  };

?>