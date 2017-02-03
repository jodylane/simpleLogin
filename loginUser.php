<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 12:30 PM
 * Description: This file was created to
 */
include "./includes/database.php";

session_start();
$_SESSION["user_id"] = 0;

$username = "";
$password = "";
//if the script did not receive post data, display an error message and then terminate the script immediately
if (!filter_has_var(INPUT_POST, 'username') ||
    !filter_has_var(INPUT_POST, 'password')
) {
    include "./includes/header.php";
    include "./includes/navbar.php";
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 col-md-offset-2">';
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Warning!</strong> There was an error with the user information that you entered. Please go back and make sure you filled out all required fields!</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    include "./includes/fixFooter.php";
    $conn->close();
    die();
}

//take special characters and sanitize data received to a void code injection
$username = html_entity_decode(filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING));
$username = trim($username);
$username = stripcslashes($username);
$username = strip_tags($username);
$username = $conn->real_escape_string($username);

$password = html_entity_decode(filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING));
$password = trim($password);
$password = sha1($password);

//select user where password and username match
$sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";

$query = @$conn->query($sql);

if(!$query){
    $errno = $conn->errno;
    $errmsg = $conn->error;
    include "./includes/header.php";
    include "./includes/navbar.php";
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 col-md-offset-2">';
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo "<strong>Warning!</strong> Failed to find your account ($errno) $errmsg. Please try again? Do you have an account with us? If not <a href='register.php'>Register Today!</a></div>";
    echo '</div>';
    echo '</div>';
    echo '</div>';

    include "./includes/fixFooter.php";
    $conn->close();
    die();
}

//retrieve results
$row = $query->fetch_assoc();

if(!$row){
    include "./includes/header.php";
    include "./includes/navbar.php";
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 col-md-offset-2">';
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo "<strong>Warning!</strong> Invalid username or password</div>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
    require_once 'includes/fixFooter.php';
    $conn->close();
    die();
}

//user info
$user_id = $row['id'];
$username = $row['username'];
echo $user_id;

//start session


$_SESSION['user_id'] = $user_id;

header("Location: index.php");
session_write_close();
?>
