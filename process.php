<?php
session_start();
if (isset($_POST['submit'])) {


    //Validation before completing the process
    $errors = array();
    if (!(isset($_POST['fullName']) && !empty($_POST['fullName']))) {
        $errors[] = "fullName";
    }
    if (!(isset($_POST['username']) && !empty($_POST['username']))) {
        $errors[] = "username";
    }
    if (!(isset($_POST['radio']))) {
        $errors[] = "radio";
    }
    if (!(isset($_POST['phoneNumber']) && strlen($_POST['phoneNumber']) == 11)) {
        $errors[] = "phoneNumber";
    }
    if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
        $errors[] = "email";
    }
    if (!(isset($_POST['password']) && strlen($_POST['password']) > 8)) {
        $errors[] = "password";
    }
    if (!(isset($_POST['passwordConfirm']) && ($_POST['password'] == $_POST['passwordConfirm']))) {
        $errors[] = "passwordConfirm";
    }
    if ($errors) {
        header("Location: registration.php?errors=" . implode(',', $errors));
    }




    @$conn = mysqli_connect("localhost", "root", "", "coform");

    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }

    @$fullName = mysqli_escape_string($conn, $_POST['fullName']);
    @$username = mysqli_escape_string($conn, $_POST['username']);
    @$email = mysqli_escape_string($conn, $_POST['email']);
    @$gender = $_POST['radio'];
    //hashing password
    @$password = password_hash(mysqli_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT);
    @$phoneNumber = mysqli_escape_string($conn, $_POST['phoneNumber']);
    if (!(empty($fullName . $username . $email . $gender . $password . $phoneNumber))) {
        $query = "INSERT INTO `users` (`full_name`, `username`, `gender`, `mobile`, `email`, `password`) VALUES ('$fullName', '$username', '$gender', '$phoneNumber', '$email', '$password')";
    } else {
        exit;
    }


    if (mysqli_query($conn, $query)) {
        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_array($result);
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['full_name'] = $data['full_name'];
            $message = "You have been registered successfully";

            header("Location: index.php?message=" . $message);
            exit;
        }
    } else {
        session_destroy();
        $error = "Register failed";
        header("Location: registration.php?regFailed=" .  $error);
    }

    mysqli_close($conn);
}
