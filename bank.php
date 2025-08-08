<?php
session_start();
require 'db_connect.php';
$username = $_SESSION['username'];

if (!isset($username)) {
    header('location:login.php');
}
$stmt = $pdo->prepare(
    'SELECT account_balance FROM account1_tbl WHERE username = ?'
);
$stmt->execute([$username]);
$balance = $stmt->fetch()['account_balance'];
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
gap:    1em;
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
.bts{


    color:white;
}
.bte{
    color:black;
}
.as{

    float:left;
}
h3, h4{

    display:flex;
    color:white;
 
}

.sidebar, a{

    display:block;
    padding: ;
    margin-bottom:  30px;
    border-radius:4pxx;
}


.svg{

    float:left;
}
img{

    float:left;
}

        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        h2{
text-align:left;

        }
        .balance{


            text-align:left;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
        }
        th {
            background: #eee;
        }
    
.rice{


    color:purple;
    text-decoration:none;
    
    text-align: center;
       
gap:3rem;


}
a{

    color:purple;
    text-decoration:none;
}

    </style>
</head>
<body>


    <nav>
        <ul class="sidebar"> 
     <li onclick=hideSidebar()><a href="#"><img src="close_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg" ></a></li>  
    <li><a href="port.html">Dashboard</a></li>
    <li> <a href="About.php">About</a></li>
    
    <li class="hidOnMobile"> <a href="contact_us.html">Contact us</a></li>
<li><a href="help.html">Help</a></li>
<li><a href="log out.php">Log out</a></li> 

        </ul>



        <ul> 
       <li class=""><a href="bank.php" >


</a></li>  
       <li class="hidOnMobile"><a href="About.php"> About</a></li>
       <li class="hidOnMobile"> <a href="contact_us.html">Contact us</a></li>
       <li class="hidOnMobile"><a href="help.html">Help</a></li>
       <li class="hidOnMobile"><a href="log out.php">Log out</a></li>

         <li class="menu-button" onclick=showSidebar()><a href=#><img src="menu_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"
           height="26"  width="26"></a></li>
     
     
        
        
    </li>
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
        </ul>
    </aside>




    <section class="dashboard">
        <div class="card">
        <h3>Welcome, <?php echo htmlspecialchars($username); ?></h3>
            <h3>Current Balance</h3>
            <div class="balance">
                
            
₦<?php echo number_format($balance, 2); ?>
             
</div>

</div>  
        <div class="card">
        <div class="cardactions">
     <button class="btn"><a href="create_account.php"class="bts">Create account</a></button>
        <button class="btn"><a href="make_withdrawal.php"class="bts" >make withdraw</a> </button>
        <button class="btn"><a href="make_deposit.php" class="bts">Make deposit</a></button>
        <button class="btn"><a href="make_transfer1.php" class="bts" >make_transfer</button>
    </div>
    </div>





    <div class="card">
        <h3> Recent transaction</h3>
        <ul>



        
    

        <?php
        $username = $_SESSION['username'];

        if (!isset($username)) {
            header('location:login.php');
            exit();
        }

        // Get current user account number
        $stmt = $pdo->prepare(
            'SELECT account_no FROM account1_tbl WHERE username = ?'
        );
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        $account_no = $user['account_no'];

        // Get all transactions (sent or received)
        $stmt = $pdo->prepare(
            'SELECT * FROM transaction_tbl WHERE sender_account_no = ? OR receiver_account_no = ? ORDER BY transfer_time DESC'
        );
        $stmt->execute([$account_no, $account_no]);
        $transactions = $stmt->fetchAll();
        ?>

<h2>Transaction History for Account Number: <?php echo htmlspecialchars(
    $account_no
); ?></h2>

    <table class="bte">


        <thead>
            <tr>
                <th>Sender Account</th>
                <th>Receiver Account</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($transactions) > 0): ?>
                <?php foreach ($transactions as $trans): ?>
                    <tr>
                        <td><?php echo htmlspecialchars(
                            $trans['sender_account_no']
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $trans['receiver_account_no']
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $trans['amount']
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $trans['transfer_time']
                        ); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No transactions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        </ul>
    </div>





    </section>
    


    



        <script>
            function showSidebar() {
  const sidebar = document.querySelector('.sidebar')
  sidebar.style.display = 'flex'
}

function hideSidebar() {
  const sidebar = document.querySelector('.sidebar')
  sidebar.style.display = 'none'
}

      </script>
</body>
</html>

