<?php
if (!isset($username)) {
    header('location:login.php');
}

if (
    isset($_POST['make_transfer']) and
    $_POST['make_transfer'] == 'make_transfer'
) {
    //Get Sender account details
    $sql = "SELECT * FROM account1_tbl WHERE username = '$username'";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

    //Get Receiver account details
    $receiver_account_no = $_POST['recipient_account_no'];
    $sql = "SELECT * FROM account1_tbl WHERE account_no = '$receiver_account_no'";
    $stmt = $pdo->query($sql);
    $row_r = $stmt->fetch();

    $transferAmount = $_POST['transfer_amount'];
    $sender_new_balance = $row['account_balance'] - $transferAmount;
    $receiver_new_balance = $row_r['account_balance'] + $transferAmount;

    if ($transferAmount <= 0) {
        $msg = 'invalid transfer';
    } else {
        $sql = "UPDATE account1_tbl SET account_balance = ? where username= '$username'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$sender_new_balance]);

        $sql = "UPDATE account1_tbl SET account_balance = ? where account_no = '$receiver_account_no'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$receiver_new_balance]);
        $msg = 'Transfer Successful';
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
    .sidebar1{
left: 0;
height:100vh;

background-color:blue;
color: blue;
width:  50px;
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
    <a href="bank.php" > <h2>Dashboard</h2></a>
        <ul class="rice">
            <li class="ben"><a href="create_account.php">Create account</a></li>
            <li class="ben"><a href="check_balance.php"></a></li>
            <li class="ben"><a href="make_withdrawal.php">Make Withdrawal</a></li>
            <li class="ben"><a href="make_deposit.php">Make deposit</a></li>
            <li class="ben"><a href="make_transfer.php">Make Transfer</a></li>
    
        </ul>
    </aside>



        <div class="card">
            <h3>Transfer funds</h3>
        </div>

<form action="make_transfer.php" method="post">

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
</form>

    <?php if (isset($msg)) {
        $msg;
    } ?>
</body>
</html>
   