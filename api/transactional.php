<?php
session_start();

require 'db_connect.php';

// get data from form
$account_number = $_POST['account_number'];
$type = $_POST['type'];
$amount = $_POST['amount'];

// basic validation
if (
    !empty($account_number) &&
    is_numeric($amount) &&
    ($type == 'credit' || $type == 'debit')
) {
    $sql = "INSERT INTO transaction (account_number,  type,amount) 
                  
                   ('$account_number',  '$type','$amount')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$account_number, $type, $amount]);

    if ($result) {
        echo 'Transaction added successfully.';
    } else {
        echo 'Error adding transaction: ' . mysqli_error($connection);
    }
} else {
    echo 'Please enter valid data.';
}

// close connection
mysqli_close($connection);
?>
    
    
    ---
    
    
    
    ---
    
 
    <form method="post" action="add_transaction.php">
        <input type="text" name="account_no" placeholder="Account Number" required><br>
        <input type="number" name="amount" step="0.01" placeholder="Amount" required><br>
        <select name="type" required>
            <option value="credit">Credit</option>
            <option value="debit">Debit</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Transaction History</h2>
    <table>

    <tr>

    <th>Type</th>
<th>Amount</th>

    </tr>



    
    <tr>
<td>


    
    </table>
    
</body>
</html>
