<?php
    include 'db.php';
    $db = new db();
    include 'session.php';
    $session = new session();
    $session::init();
    $session::checksession();
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $old = mysqli_real_escape_string($db->link, $_POST['old']);
        $new = mysqli_real_escape_string($db->link, $_POST['new']);
        $confirm = mysqli_real_escape_string($db->link, $_POST['confirm']);
        if ($new != $confirm) {
            echo "New password not matched.";
        }else{
        $query = "SELECT * FROM admin WHERE password = '$old'";
        $result = $db->select($query);
            if ($result) {
                $query ="UPDATE admin
                SET
                password = '$new'
                WHERE id = '1'
                ";
                $update = $db->update($query);
                if ($update) {
                    echo "updated successfully<a href='login.php'>Login here</a>";
                }else{
                    echo "update failed";
                }
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change pass</title>
    <style>
        body{
            margin: 0 auto;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        input{
            font-size:3vh;
        }
        form{
            margin:0;
        }
        td{
            font-size:3vh;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td><input type="text" name="old">Old password</td>
            </tr>
            <tr>
                <td><input type="text" name="new">New password</td>
            </tr>
            <tr>
                <td><input type="text" name="confirm">Confirm new password</td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>