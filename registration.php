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
        <form method="post" action="index.php">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" id="fullName">
            <br>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="gender">Gender</label>
            <input type="radio" name="gender" id="gender" value="Male">Male
            <input type="radio" name="gender" id="gender" value="Female">Female
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
            <input type="password" name="passwordConfirm" id="passwordConfirm">
            <br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</body>

</html>