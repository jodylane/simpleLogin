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
    <div class="row">
        <form action="registerUser.php" method="post">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <input required class="form-control" id="username" type="text" name="uname"
                           placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input required class="form-control" id="password" type="text" name="uname"
                           placeholder="Password"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
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
<?php
include "./includes/footer.php";
?>