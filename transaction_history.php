<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

$username = $_SESSION['username'];

// Get current user account number
$stmt = $pdo->prepare('SELECT account_no FROM account1_tbl WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo 'User not found.';
    exit();
}

$account_no = $user['account_no'];

// Get all transactions where user is sender or receiver
$stmt = $pdo->prepare(
    'SELECT * FROM transaction_tbl WHERE sender_account_no = ? OR receiver_account_no = ? ORDER BY transfer_time DESC'
);
$stmt->execute([$account_no, $account_no]);
$transactions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 16px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Transaction History for Account Number: <?php echo htmlspecialchars(
        $account_no
    ); ?></h2>

    <table>
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
    </table>

</body>
</html>
