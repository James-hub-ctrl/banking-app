<?php
session_start();
require 'db_connect.php';

$username = $_SESSION['username'];

if (!isset($username)) {
    header('Location: login.php');
    exit();
}

if (
    isset($_POST['make_transfer']) &&
    $_POST['make_transfer'] == 'make_transfer'
) {
    $receiver_account_no = $_POST['recipient_account_no'];
    $transferAmount = floatval($_POST['transfer_amount']);

    // Get sender details
    $stmt = $pdo->prepare('SELECT * FROM account1_tbl WHERE username = ?');
    $stmt->execute([$username]);
    $sender = $stmt->fetch();
    $sender_account_no = $sender['account_no'];

    // Get receiver details
    $stmt = $pdo->prepare('SELECT * FROM account1_tbl WHERE account_no = ?');
    $stmt->execute([$receiver_account_no]);
    $receiver = $stmt->fetch();

    if (!$receiver) {
        $msg = 'Recipient account does not exist.';
    } elseif ($transferAmount <= 0) {
        $msg = 'Invalid transfer amount.';
    } elseif ($transferAmount > $sender['account_balance']) {
        $msg = 'Insufficient balance.';
    } else {
        // Update sender balance
        $new_sender_balance = $sender['account_balance'] - $transferAmount;
        $stmt = $pdo->prepare(
            'UPDATE account1_tbl SET account_balance = ? WHERE username = ?'
        );
        $stmt->execute([$new_sender_balance, $username]);

        // Update receiver balance
        $new_receiver_balance = $receiver['account_balance'] + $transferAmount;
        $stmt = $pdo->prepare(
            'UPDATE account1_tbl SET account_balance = ? WHERE account_no = ?'
        );
        $stmt->execute([$new_receiver_balance, $receiver_account_no]);

        // Save the transaction
        $stmt = $pdo->prepare(
            'INSERT INTO transaction_tbl (sender_account_no, receiver_account_no, amount) VALUES (?, ?, ?)'
        );
        $stmt->execute([
            $sender_account_no,
            $receiver_account_no,
            $transferAmount,
        ]);

        $msg = 'Transfer Successful.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
   .sidebar, a{

display:block;
padding: ;
margin-bottom:  30px;
border-radius:4pxx;
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
body{

    padding: 7rem;
}
.form{

    text-align:center;

}

.card{

    margin-left:12rem;
    height:450px;
}
    

a{

color:white;
text-decoration: none;
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
       <li class=""><a href="bank.php"></a></li>  
       <li class="hidOnMobile"> <a href="About.php">About</a></li>
       <li class="hidOnMobile"><a href="contact_us.html">Contact us</a></li>
       
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





        <div class="ard">
               </div>

               <h6>Transfer funds</h6>
     
<div class="card">
<form action="make_transfer1.php" method="post">

<label for="amount">enter your account_no</label>
    <input type="text" id="sender_account_no" name="sender_account_no" required>
   <br>
   
    <label for="amount">Recipient_account_no</label>
    <input type="text" id="recipient_account_no" name="recipient_account_no" required>
   <br>
   <label for="amount">transfer amount</label>
    <input type="text" id="transfer_amount" name="transfer_amount" required>
    <br>
    <input type="submit" name="make_transfer" value="make_transfer">

    <div class="form-group">
        <label for="transfer-note">Note</label>
        <input type="text" name="transfer note" placeholder=" reason for transfer">
        </div>
    </div>
</form>

<?php if (isset($msg)): ?>
    <p><?php echo $msg; ?></p>
<?php endif; ?>



<script src="bank.js">
      </script>


</body>
</html>
   
