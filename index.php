<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 12:25 PM
 * Description: This file was created to
 */
include "./includes/header.php";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['username'])
) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
}
if ($_SESSION['user_id'] > 0) {
    $is_login = true;
}else{
    $is_login = false;
}
require_once "./includes/functions.php";
check_login($is_login)
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Simple Log in</a>
        </div>
        <ul class="nav navbar-right nav-pills">
            <li role="presentation" class="active">
                <a href="index.php">Home</a>
            </li>
            <li role="presentation">
                <a href="register.php">Register</a>
            </li>
            <li role="presentation">
                <a href="login.php">Login</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container wrap">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>Login systems are essential for any kind of project that provides or accepts individual user data.  Login systems depend on at least two, and usually three items:</p>
            <ul>
                <li><b>A "session".</b>  A session in PHP is a set of programming variables that are stored to a disk file on the server, and accessed with a key stored in a "cookie" in the user's browser.  The PHP session variable is a PHP associative array, accessed with the variable name $_SESSION.  Since the session variable is persistent between page loads, data such as preferences, authentication, etc., can be available as long as a user remains on a site.</li>
                <li><b>An identifier.</b>  A browser cookie or IP address can be used as an identifier, but a user name is the general way users are identified.  User names are typically stored in a database table, along with an ID number.  The user ID number will be placed in a session variable to create a "log-in", and the user ID becomes a key for user information in the database.</li>
                <li><b>Authorization.</b>  In most situations, it is important to verify the user's identity with a password.  The password is stored along with the user name in the database, and checked against the user-provided password.  The user ID is only stored in a session variable when the correct password is provided.  To protect the password, encryption is used to prevent the password from being human-readable.</li>
            </ul>
            <h4>Sessions</h4>
            <p>Creating a session is simple.  Just use the PHP method session_start().  This will either initialize a new session or resume a session using the browser cookie.  This creates the $_SESSION variable, and in the case of resuming a session, it loads any saved session data into the variable.  The session variable is a "superglobal", and can be referenced from anywhere inside a PHP script.
                Session data is written to a server disk file when the PHP script finishes, but you can call session_write_close() to force the session data to be written to disk.  This also insures that another script can access the session, as only one script may use the session at a time.</p>
            <p>A newly created session has very little data other than a session ID.  You must add any data you want the session to have.  To add data to the session variable, use this form:</p>
            <pre>$_SESSION["my_data"] = "test data";</pre>
            <p>You can use any text string as the key, and the data can be any data type  -- variables, strings, numbers, arrays, etc.</p>
            <p>Sessions do not expire, so generally a time stamp is added so the session can be tested for how old it is.  When the session is opened, the elapsed time can be checked.  If the session is within its time allotment, the session can be updated with a fresh timestamp. Sessions beyond the desired age can be destroyed with session_destroy().  The session variable can be unset with session_unset().</p>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>