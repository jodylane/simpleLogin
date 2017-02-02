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
    <form action="loginUser.php" method="post">
        <div class="form-group">
            <input required class="form-control" id="username" type="text" name="uname"
                   placeholder="Username"/>
        </div>
        <div class="form-group">
            <input required class="form-control" id="password" type="text" name="uname"
                   placeholder="Password"/>
        </div>
    </form>
<?php
include "./includes/footer.php";
?>