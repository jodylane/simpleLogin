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
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Warning!</strong> There was an error with the user information that you entered. Please go back and make sure you filled out all required fields!</div>';
    include "./includes/footer.php";
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
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo "<strong>Warning!</strong> Failed to find your account ($errno) $errmsg. Please try again? Do you have an account with us? If not <a href='register.php'>Register Today!</a></div>";

    include "./includes/footer.php";
    $conn->close();
    die();
}

//retrieve results
$row = $query->fetch_assoc();

if(!$row){
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo "<strong>Warning!</strong> Invalid username or password</div>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//user info
$user_id = $row['user_id'];
$username = $row['user_name'];


//start session

$_SESSION['username'] = $username;
$_SESSION['user_id'] = $user_id;

header("Location: booklist.php")
?>
