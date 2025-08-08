<?php
session_start();
require 'db_connect.php';

if (isset($_POST['login_btn']) and $_POST['login_btn'] == 'Login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = ' SELECT * FROM account1_tbl WHERE username= ? AND password = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $row = $stmt->fetch();

    if ($row) {
        $_SESSION['username'] = $username;
        header('location:bank.php');
    } else {
        $msg = 'user account not found';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>



        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
    
            body{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color:#fff;
            width:100%;
            height:100vh;
           display:flex;
           justify-content: center;
           align-items: center;
           background-color: black;

        }



        nav{
    background-color: white;
    box-shadow: 3px 3px 5px rgba(0,0,0,0.1);
    position:fixed;
top:0;
margin: 0;

width:100%;
    
   }

   nav ul{
    
    width:100%;
    list-style-type: none;
    display:flex;
    justify-content: flex-end;
    align-items: center;

   }
   nav li{
    height:50px;

   }

   nav a{

    height:100%;
    padding: 0 30px;
    text-align: center;
    display:flex;
    align-items: center;
    color:black;
    }

   nav a:hover{
    background-color: #fff;
    
   }
nav li:first-child{

margin-right:auto;

}

.sidebar{
position:fixed;
top:0;
margin: 0;
justify-content: space-between;
right: 0;
height:100vh;
color: black;
width: 250px;
z-index:999;
background-color: rgba(255,255,255,0.2);
box-shadow: -10px 0 10px rgba(0,0,0,0.1);
display:none;
backdrop-filter: blur(10px);
flex-direction: column;
align-items: flex-start;
justify-content: flex-start;
}

.sidebar li{


width:100%;

}
.menu-button{
display:none;
}

.sidebar a{
width:100%;
}

@media(max-width:800px) {

.hidOnMobile{

    display:none
}
.menu-button{
    display: block;
}
}
@media (max-width:400px) {

.sidebar{
    width:100%;
}
}

        form{
            width:300px;
            height:390px;
            background:linear-gradient(#ffffff34,#ffffff22);
            backdrop-filter:blur(12px);
            border:1px solid #ffffff83;
            box-shadow: 0 8px 32px #0000008a;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form h1{
            margin-top: 30px;
        }
        
        .type{
            width: 250px;
            height:35px;
            outline: none;
            background-color: transparent;
            border-radius: 30px;
            margin-top: 6px;
            padding: 10px;
        }
        input::placeholder{
            color:#ffffffb9;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
        }
    
.pot{
    font-size: 1rem;
    width: 40rem;
    letter-spacing: 0.08em;
    height:65px;
    border-radius: 40px;
    margin-right: 2.2nem;
}


.user{
    width: 250px;
    
 font-size: 0.8rem;
    display:flex;
    justify-content: space-between;
    align-items: center;
    margin-top 0.5em;
}
.button{
    outline:none;
    border: none;
    font-size: 0.8rem;
    padding: 10px 105px;
    border-radius: 30px;
    cursor:pointer;
    margin-top:20px;

}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<nav>
        <ul class="sidebar"> 
     <li onclick=hideSidebar()><a href="#"><img src="close_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"></a></li>  
    <li><a href="port.html">Dashboard</a></li>
    <li> <a href="About.php">About</a></li>
<li><a href="help.html">Help</a></li>
<li><a href="log out.php">Log out</a></li>
<li><a href="signup.php">signup</a></li>
        </ul>

        <ul> 
       <li class=""  style="margin-left: 3em;"><a href="bank.php" >Dashboard</a></li>  
       <li class="hidOnMobile"><a href="About.php"> About</a></li>
       <li class="hidOnMobile"> <a href="organization.html">Contact us</a></li>
       <li class="hidOnMobile"><a href="help.html">Help</a></li>
       <li class="hidOnMobile"><a href="log out.php">Log out</a></li>
       <li class="menu-button" onclick=showSidebar()><a href=#>
    </ul>
        </nav>




<form action ="login.php" method="post">

          <label for="username"></label>
          <input type="text" id="username" name="username" placeholder="enter your name"class="type" required>
        <br>

        <label for="password"></label>
       <input type="password" id=password name="password"placeholder="enter your password" class="type" required>
       <br>

       <div class="user">
       <p> <input type="checkbox" > Remember me</p>
       
       
       <br>
    


   <a href="navbar.html">forgot password?</a><br>
   <br>
</div>

       <input type="submit" name=login_btn value="Login"  class="button">
       </p>

</form>

</body>
</html>



<?php if (isset($msg)) {
    echo $msg;
} ?>




</body>
</html>
