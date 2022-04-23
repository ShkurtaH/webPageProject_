<?php
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.


$con = new mysqli("localhost","root","","photography");
// Check connection
if ($con === false){
    echo "Failed to connect to database: " . $con->connect_error();
}
?>
