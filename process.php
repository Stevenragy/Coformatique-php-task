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
    if (!(isset($_POST['password']) && strlen($_POST['password']) < 10)) {
        $errors[] = "password";
    }
    if (!(isset($_POST['passwordConfirm']) && ($_POST['password'] == $_POST['passwordConfirm']))) {
        $errors[] = "passwordConfirm";
    }
    if ($errors) {
        header("Location: registration.php?errors=" . implode(',', $errors));
    }
}



@$conn = mysqli_connect("localhost", "root", "", "coform");

if (!$conn) {
    echo mysqli_connect_error();
    exit;
}
$query = "select * from users";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID : " . $row['id'] . "<br>";
    echo "Name : " . $row['full_name'] . "<br>";
    echo "username : " . $row['username'] . "<br>";
    echo "E-mail : " . $row['email'] . "<br>";
    echo "Gender : " . $row['gender'] . "<br>";
    echo str_repeat("-", 50);
}

mysqli_free_result($result);
mysqli_close($conn);
