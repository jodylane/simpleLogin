<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 7:29 PM
 * Description: This file was created to
 */
session_start();
session_unset();
session_destroy();

if(session_status() == PHP_SESSION_NONE){
    include "./includes/header.php";
    include "./includes/navbar.php";
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 col-md-offset-2">';
    echo '<div class="alert alert-success alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Success!</strong> You are now logged out.</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    include "./includes/fixFooter.php";
    $conn->close();
    die();
}
?>
