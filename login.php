<?php session_start();

if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
    header("Location: index.php");
}
require('header.php');
?>
<?php
$error = "";
if (isset($_POST['submit'])) {

    $conn = mysqli_connect("localhost", "root", "", "coform");
    if (!$conn) {
        echo mysqli_connect_error(); //for debugging
        exit;
    }
    $email = mysqli_escape_string($conn, $_POST['email']);
    $pwdEntered = mysqli_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
    //Check if the entered password is identical for that entered in the database
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        if (password_verify($pwdEntered, $data['password'])) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['full_name'] = $data['full_name'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>

<div class="container">
    <br>
    <?php if ($error != "") {
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>'; //Alert if the password is wrong
    } ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : "" ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="passweord" value="<?= (isset($_POST['password   '])) ? $_POST['password'] : "" ?>">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    <!--not functional yet -->
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <a href="registration.php">Don't have an account?</a>
        </div>
    </div>
</div>
<?php require('footer.php') ?>