<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 12:29 PM
 * Description: This file was created to
 */

//local development
//$host = "localhost";
//$username = "phpuser";
//$password = "phpuser";
//$database = "simpleLogin";

//production server
$host = "localhost";
$username = "jodylane";
$password = "jodylane";
$database = "jodylane_db";

//connect to db
$conn = @new mysqli($host, $username, $password, $database);

//handler errors
if($conn->connect_error){
    $errmsg = $conn->error;
    $errno = $conn->errno;
    die("Connection to database has failed: ($errno) $errmsg.");
    require_once ("./includes/footer.php");
}
?>