<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Register</h1>
        <form action="registration.php" method="post">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName">
            <br>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName">
            <br>
            <label for="phoneNumber">Mobile</label>
            <input type="number" name="phoneNumber" id="phoneNumber">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <label for="passwordConfirm">Confirm Password</label>
            <input type="passwordConfirm" name="passwordConfirm" id="passwordConfirm">
            <br>
            <input type="submit" namer="register" value="Register">
        </form>
    </div>
</body>

</html>