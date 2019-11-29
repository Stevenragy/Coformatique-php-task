<?php
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
    @$password = password_hash(mysqli_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT);
    @$phoneNumber = mysqli_escape_string($conn, $_POST['phoneNumber']);
    if (!(empty($fullName . $username . $email . $gender . $password . $phoneNumber))) {
        $query = "INSERT INTO `users` (`full_name`, `username`, `gender`, `mobile`, `email`, `password`) VALUES ('$fullName', '$username', '$gender', '$phoneNumber', '$email', '$password')";
    } else {
        exit;
    }


    if (mysqli_query($conn, $query)) {
        echo "You have been registered successfully";
    } else {
        echo "sss";
        mysqli_error($conn);
    }

    mysqli_close($conn);
}