<?php
session_start();

require 'db_connect.php';
$username = $_SESSION['username'];

if (!isset($username)) {
    header('location:.php');
}

$sql = "SELECT * FROM account1_tbl where username= '$username' ";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="banking_system.css">
</head>
<body>
<nav>
        <ul class="sidebar"> 
     <li onclick=hideSidebar()><a href="#"><img src="close_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"></a></li>  
    <li><a href="port.html">About me </a></li>
    <li> <a href="organization.html">Recent post</a></li>
<li><a href="oke3.html">About</a></li>
<li><a href="login1.html">login</a></li>
<li><a href="signup.html">signup</a></li>
        </ul>

        <ul> 
       <li class=""><a href="yam.html">coding2go</a></li>  
       <li class="hidOnMobile"><a href="port.html">About me </a></li>
       <li class="hidOnMobile"> <a href="organization.html">Recent post</a></li>
       <li class="hidOnMobile"><a href="oke3.html">About</a></li>
       <li class="hidOnMobile"><a href="login1.html">login</a></li>
       <li class="hidOnMobile"><a href="signup.html">signup</a></li>
       <li class="menu-button" onclick=showSidebar()><a href=#><img src="menu_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"  height="26"  width="26"></a></li>
                 </ul>
        </nav>



    <table>
    <tr>
<td><a href='create_account.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create_account&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a href='check_balance.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;check balance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a href='make_withdrawal.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;make_withdrawal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a href='make_deposit.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;make_deposit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td?><a href='make_transfer.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;make_transfer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a href='log out.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;log out&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
     
    </tr>
    </table>


    <?php if ($row) {
        echo 'Account Balance = ' . $row['account_balance'];
    } ?>
</body>
</html>