<?php
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
