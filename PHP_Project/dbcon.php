
<?php
    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","1432");
    define("DATABASE","crud_operation");

    $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    if(!$connection){
        die("Connection failed");
    }
    // else{
    //     echo "Connection established";
    // }
?>