<?php
// Create Connection

$conn = mysqli_connect('localhost', 'debian-sys-maint', 'lux6dVhsWdgIrJvh', 'renbarsell');

//Check Connection
if(mysqli_connect_errno()){
    // Connection Failed
    echo 'failed to connect to MySQL'.mysqli_connect_errno();
}
?>