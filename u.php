if (isset($_POST['register']) and $_POST['register'] == 'Register') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    if ($_POST['password'] == $_POST['confirm_password']) {
        $password = $_POST['password'];

        $sql = 'INSERT INTO wisdom_tbl(username,email,password) VALUES(?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password]);

        $msg = 'user added successfully';
    } else {
        $msg = 'Incorrect password, please reconfirm';
    }
}
if (isset($_POST['register_btn']) and $_POST['register_btn'] == 'Register') {

