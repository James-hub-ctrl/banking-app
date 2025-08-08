<?php

session_start();
require 'db_Connect.php';

if ($_SESSION['username']) {
    $_SESSION['username'] = $username;
} else {
    header('location:agent_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Admin</h1>
    <a href="ban.php">dash</a>

</body>
</html>




