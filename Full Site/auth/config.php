<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'debian-sys-maint');
define('DB_PASSWORD', 'lux6dVhsWdgIrJvh');
define('DB_NAME', 'renbarsell');



// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>
