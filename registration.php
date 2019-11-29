<?php require('header.php') ?>
<?php
$error_array = array();
if (isset($_GET)) {
    if (isset($_GET['errors'])) {
        $error_array = explode(",", $_GET['errors']);
    }
}
?>

<div class="container ">
    <h1>Register</h1>
    <form method="post" action="process.php">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" name="fullName" id="fullName" placeholder="" />
            <?php if (in_array("fullName", $error_array)) echo "<span style='color:red;'>Please enter your full name.</span>" ?>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username">
            <?php if (in_array("username", $error_array)) echo "<span style='color:red;'>Please enter your username.</span>" ?>
        </div>
        <div class="form-group">
            <label for="radio">Gender</label>
            <input type="radio" name="radio" id="radio" value="male">Male
            <input type="radio" name="radio" id="radio" value="female">Female
            <?php if (in_array("radio", $error_array)) echo "<span style='color:red;'>Please enter your gender.</span>" ?>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Mobile</label>
            <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
            <?php if (in_array("phoneNumber", $error_array)) echo "<span style='color:red;'>Please enter your Phone Number.</span>" ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <?php if (in_array("email", $error_array)) echo "<span style='color:red;'>Please enter your email.</span>" ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <?php if (in_array("password", $error_array)) echo "<span style='color:red;'>Please enter your password.</span>" ?>
        </div>
        <div class="form-group">
            <label for="passwordConfirm">Confirm Password</label>
            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm">
            <?php if (in_array("passwordConfirm", $error_array)) echo "<span style='color:red;'>This password is not identical.</span>" ?>
        </div>

        <input type="submit" name="submit" value="Register">
    </form>
</div>
<?php require('footer.php') ?>