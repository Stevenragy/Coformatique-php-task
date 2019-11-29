<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $error_array = array();
    if (isset($_GET)) {
        if (isset($_GET['errors'])) {
            $error_array = explode(",", $_GET['errors']);
        }
    }
    ?>

    <div>
        <h1>Register</h1>
        <form method="post" action="process.php">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" id="fullName" placeholder="" />
            <?php if (in_array("fullName", $error_array)) echo "<span style='color:red;'>Please enter your full name.</span>" ?>
            <br />
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <?php if (in_array("username", $error_array)) echo "<span style='color:red;'>Please enter your username.</span>" ?>

            <br>
            <label for="radio">Gender</label>
            <input type="radio" name="radio" id="radio" value="male">Male
            <input type="radio" name="radio" id="radio" value="female">Female
            <?php if (in_array("radio", $error_array)) echo "<span style='color:red;'>Please enter your gender.</span>" ?>
            <br>
            <label for="phoneNumber">Mobile</label>
            <input type="number" name="phoneNumber" id="phoneNumber">
            <?php if (in_array("phoneNumber", $error_array)) echo "<span style='color:red;'>Please enter your Phone Number.</span>" ?>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <?php if (in_array("email", $error_array)) echo "<span style='color:red;'>Please enter your email.</span>" ?>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <?php if (in_array("password", $error_array)) echo "<span style='color:red;'>Please enter your password.</span>" ?>
            <br>
            <label for="passwordConfirm">Confirm Password</label>
            <input type="password" name="passwordConfirm" id="passwordConfirm">
            <?php if (in_array("passwordConfirm", $error_array)) echo "<span style='color:red;'>This password is not identical.</span>" ?>
            <br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</body>

</html>