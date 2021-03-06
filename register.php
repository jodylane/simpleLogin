<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/2/2017
 * Time: 12:25 PM
 * Description: This file was created to
 */
include "./includes/header.php";
?>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Simple Log in</a>
        </div>
        <ul class="nav navbar-right navbar-nav">
            <li role="presentation" class="disabled">
                <a href="index.php">Home</a>
            </li>
            <li role="presentation" class="active">
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
        <h3 class="text-center">Simple Login Registration</h3>
    </div>

    <div class="row">
        <form action="registerUser.php" method="post">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <input required class="form-control" id="username" type="text" name="username"
                           placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input required class="form-control" id="password" type="password" name="password"
                           placeholder="Password"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <div class="form-group">
                        <a href="index.php">
                            <button type="button" class="btn btn-danger" formnovalidate>Cancel</button>
                        </a>
                        <button class="btn btn-success" id="submit" type="submit">Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "./includes/fixFooter.php";
?>
