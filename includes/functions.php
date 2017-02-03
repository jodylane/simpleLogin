<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 8:04 PM
 * Description: This file was created to
 */
function check_login($is_login){
    if($is_login){
        echo '<div class="alert alert-success alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '<strong>Success!</strong> You are now logged in.</div>';
    }else{
        header("Location: login.php");
    }
}
function log_in(){


}

?>
