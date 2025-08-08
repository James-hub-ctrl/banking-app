<?php

require 'db_connect.php';

if (isset($_POST['register']) and $_POST['register'] == 'Register') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    if ($_POST['password'] == $_POST['confirm_password']) {
        $password = $_POST['password'];

        $sql = 'INSERT INTO sign_tbl(username,email,password) VALUES(?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password]);

        $msg = 'user added successfully';
    } else {
        $msg = 'Incorrect password, please reconfirm';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <style>
        *{

        margin:0;
        padding:0;
        box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            font-weight: bold;
            width: 100%;
            height: 100vh;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        form{
            width: 300px;
            height:391px;
            background-color: rgba(0, 0, 0, 0.518);
            backdrop-filter:blur(5px);
            border: 1px solid rgba(0, 0, 0, 0.518);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.685);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form h1{

            margin-bottom: 20px;
            font-size:1rem ;

        }
        p{
font-size: 0.7rem;
        

}

        .type{
            width:250px;
            height:29px;
            border-radius: 40px;
            outline:none;
           background-color:transparent;
           margin-top: 10px;
           padding: 10px;
        }
        input::placeholder{
            color:#ffffff8a;
            font-size: 0.8rem;
            letter-spacing:0.3px;
        }
        a{
            text-decoration: none;
            color:white;
            font-size: 1.2rem;
        }
        .button{
            outline:none;
            border:none;
            font-size: 0.8rem;
            padding: 10px 105px;
            border-radius:30px;
            cursor:pointer;
            margin-bottom:3.1em;
        }


    </style>

</head>
<body>
    <form action="signup.php" method="post">

            <h1>shutter</h1><br>
<p>
    <a href="login1.php" class="pot">login</a> <a href="website.php" class="por">register</a>
</p><br>

        <input type="text"class="type" placeholder="enter your name" id="username" name="username"><br>

        <input type="email" class="type"  placeholder="enter your e-mail" id="email"  name=email><br>

        <input type="password"class="type" placeholder="enter your password" id="password"  name="password"><br>

       
        <input type="password"class="type" placeholder="confirm your password" id="confirm_password" name="confirm_password"><br>
      
<div class="user">
   <input type="submit" class="button" name="register" value="Register">

    </div>
    <?php if (isset($msg)) {
        echo $msg;
    } ?>
    </form>
   
    

</body>
</html>
















