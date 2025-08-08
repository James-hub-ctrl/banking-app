<?php

require 'db_connect.php';

if (isset($_POST['register_btn']) and $_POST['register_btn'] == 'Register') {
    $sql = ' SELECT * FROM account1_tbl';
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();
    if ($row) {
        $the_account_number = $row['account_no'] + 1;
    } else {
        $the_account_number = 100000001;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_name = $_POST['account_name'];
    $account_balance = $_POST['account_balance'];

    $sql =
        'INSERT INTO account1_tbl (username,password,account_no,account_name,account_balance)  VALUES(?,?,?,?,?)';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $username,
        $password,
        $the_account_number,
        $account_name,
        $account_balance,
    ]);

    echo 'account created successfully';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="banking_system.css">

    <style>

nav{
    background-color: white;
    box-shadow: 3px 3px 5px rgba(0,0,0,0.1);
    position:fixed;
top:0;
margin: 0;
left: 0;

width:100%;
    
   }
   body{
    padding: 9rem;
   }
   li{

    list-style: none;
   }

ul li{
    list-style: none;
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
   .sidebar1{
left: 0;
height:100vh;

background-color:blue;
color: blue;
width:  200px;
z-index:1;
background-color: 0f172a;
box-shadow: -10px 0 10px rgba(0,0,0,0.1);
box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
padding:    1.5rem;
display: flex;
top: 0;
position: fixed;
flex-direction: column;

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

       
       
.sidebar, a{

display:block;
padding: ;
margin-bottom:  30px;
border-radius:4pxx;
}


        
.sidebar1{
left: 0;
height:100vh;

background-color:blue;
color: blue;
width:  200px;
z-index:1;
background-color: 0f172a;
box-shadow: -10px 0 10px rgba(0,0,0,0.1);
box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
padding:    1rem;
display: flex;
top: 0;
position: fixed;
flex-direction: column;

}
h3, h4{

display:flex;
color:white;
}
.svg{

float:left;
}
img{

float:left;
}

a{

color:white;
text-decoration: none;
}
.card{

margin-left:12rem;
height:500px;
margin-bottom:2rem;
}
form{

    
margin-bottom:2rem;
}

</style>
</head>
<body>
<nav>
        <ul class="sidebar"> 
     <li onclick=hideSidebar()><a href="#"><img src="close_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"></a></li>  
    <li><a href="bank.php">Dashboard </a></li>
    
<li><a href="About.php">About</a></li>
    <li> <a href="contact_us.html">Contact us</a></li>
<li><a href="log out.php">log out</a></li>
        </ul>
        <ul> 
       <li class=""><a href="bank.php">Dashboard</a></li>  
       <li class="hidOnMobile"> <a href="About.php">About</a></li>
       <li class="hidOnMobile"><a href="contact_us.html">Contact us</a></li>>
       <li class="hidOnMobile"><a href="help.html">Help</a></li>
       <li class="hidOnMobile"><a href="log out.php">log out</a></li>
       <li class="menu-button" onclick=showSidebar()><a href=#><img src="menu_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"  height="26"  width="26"></a></li>
                 </ul>
        </nav>


        <div class="main">
    <aside class="sidebar1">
    <a href="bank.php" >    
   <h3>     
         <img src="menu_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"  height="26"  width="26" alt="Menu Icon"   width="24" height="24">
        Dashboard </h3></a>
        <ul class="rice">
            <a href="create_account.php">

                <h3>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
 
                Create account</h3></a>

         <a href="make_withdrawal.php">
            <h4><svg xmlns="http://www.w3.org/2000/svg" class="svg" height="24px" viewBox="0 -960 960 960"
          width="24px" fill="#1f1f1f"><path d="M838-65 720-183v89h-80v-226h226v80h-90l118 118-56
          57ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54
           54 85.5 127T880-480q0 20-2 40t-6 40h-82q5-20 7.5-40t2.5-40q0-20-2.5-40t-7.5-40H654q3 20 4.5 40t1.5 40q0 20-1.5 40t-4.5
            40h-80q3-20 4.5-40t1.5-40q0-20-1.5-40t-4.5-40H386q-3 20-4.5 40t-1.5 40q0 20 1.5 40t4.5 40h134v80H404q12 43
             31 82.5t45 75.5q20 0 40-2.5t40-4.5v82q-20 2-40 4.5T480-80ZM170-400h136q-3-20-4.5-40t-1.5-40q0-20 1.5-40t4.5-40H170q-5
              20-7.5 40t-2.5 40q0 20 2.5 40t7.5 40Zm34-240h118q9-37 22.5-72.5T376-782q-55 18-99 54.5T204-640Zm172 462q-18-34-31.5-69.5T322-320H204q29 
              51 73 87.5t99 54.5Zm28-462h152q-12-43-31-82.5T480-798q-26 36-45 75.5T404-640Zm234
               0h118q-29-51-73-87.5T584-782q18 34 31.5 69.5T638-640Z"/></svg>

            
         Make Withdrawal</h4></a>
            <a href="make_deposit.php">Make deposit</a></li>


            <a href="make_transfer1.php">
    
            <h3>  <img src="account_balance_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg">
           Make Transfer</h3></a>
           <img src="c:\Users\USER\Desktop\db_bank\users\images\home_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.png">
        
        </ul>
    </aside>







    
  
    <form action="create_account.php" method="post">
    <div class="card">
  
        <div> Costumers name</div>
        <input type="text" placeholder="costumer name" required>

    <label for="username">Choose Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Choose Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="account_name">Full Name:</label>
        <input type="text" id="account_name" name="account_name" required>
        <br>
        <label for="account_balance">How much to deposit:</label>
        <input type="text" id="account_balance" name="account_balance" required>
        <br>
        <input type="submit" name="register_btn" value="Register">
        </div>

    </form>

    <script src="bank.js">
      </script>


    
</body>
</html>