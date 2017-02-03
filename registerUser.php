<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 12:31 PM
 * Description: This file was created to
 */

include "./includes/database.php";
include "./includes/header.php";
session_start();
$_SESSION["user_id"] = 0;

$username = "";
//if the script did not receive post data, display an error message and then terminate the script immediately
if (!filter_has_var(INPUT_POST, 'username') ||
    !filter_has_var(INPUT_POST, 'password')
) {
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
$username = html_entity_decode(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
$username = trim($username);
$username = stripcslashes($username);
$username = strip_tags($username);
$username = $conn->real_escape_string($username);

$password = html_entity_decode(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
$password = trim($password);
$password = sha1($password);

//select user where password and username match
$sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
$query = @$conn->query($sql);
if ($query->fetch_assoc() !== NULL) {
    include "./includes/navbar.php";
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 col-md-offset-2">';
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Warning!</strong> This username has already been taken. Please choose a different username.</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    include "./includes/fixFooter.php";
    $conn->close();
    die();
} else {
    $sql = "INSERT INTO users (id,username,password) VALUES (NULL, '$username', '$password')";
    $query = @$conn->query($sql);
    if (!$query) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        include "./includes/navbar.php";
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-8 col-md-offset-2">';
        echo '<div class="alert alert-danger alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo "<strong>Warning!</strong> Failed to create account. ($errno) $errmsg.</div>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        include "./includes/fixFooter.php";
        $conn->close();
        die();
    }
    $user_id = $conn->insert_id;

    $conn->close();

    $_SESSION["user_id"] = $user_id;

    if ($_SESSION['user_id'] > 0) {
        header("Location: index.php");
    }
}

session_write_close();
?>
