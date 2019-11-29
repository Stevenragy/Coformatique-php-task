<?php require('header.php') ?>
<?php
$error_array = array();
if (isset($_GET)) {
    if (isset($_GET['errors'])) {
        $error_array = explode(",", $_GET['errors']);
    }
}
?>

<div class="container">
    <div class="row justify-content-center shadow p-3 mb-5 bg-white rounded">
        <div class=" col-md-6 col-lg-9">
            <h1>Register</h1>
            <form method="post" action="process.php">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="" />
                    <?php if (in_array("fullName", $error_array)) echo "<small style='color:red;'>Please enter your full name.</small>" ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                    <?php if (in_array("username", $error_array)) echo "<small style='color:red;'>Please enter your username.</small>" ?>
                </div>
                <div class="form-group form-radio">
                    <label for="radio">Gender</label>
                    <input type="radio" name="radio" id="radio" value="male">Male
                    <input type="radio" name="radio" id="radio" value="female">Female
                    <?php if (in_array("radio", $error_array)) echo "<small style='color:red;'>Please enter your gender.</small>" ?>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Mobile</label>
                    <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
                    <?php if (in_array("phoneNumber", $error_array)) echo "<small style='color:red;'>Please enter your Phone Number.</small>" ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <?php if (in_array("email", $error_array)) echo "<small style='color:red;'>Please enter your email.</small>" ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <?php if (in_array("password", $error_array)) echo "<small style='color:red;'>Please enter your password.</small>" ?>
                </div>
                <div class="form-group">
                    <label for="passwordConfirm">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm">
                    <?php if (in_array("passwordConfirm", $error_array)) echo "<small style='color:red;'>This password is not identical.</small>" ?>
                </div>

                <input class="btn btn-primary col-sm-12 col-md-3 col-lg-2" type="submit" name="submit" value="Register">
            </form>
        </div>
    </div>
</div>
<?php require('footer.php') ?>