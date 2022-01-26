<?php 
include 'db.php';
$db = new db();
include 'session.php';
$session = new session();
$session::init();
?>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = mysqli_real_escape_string($db->link, $_POST['password']);
    if ($password == "") {
        echo "field must not be empty";
    }else{
        $query = "SELECT * FROM admin WHERE id = '1'";
        $result = $db->select($query);
        $result = $result->fetch_assoc();
        if ($result) {
            $passworddb = $result['password'];
            if ($password == $passworddb) {
                session::set("login", true);
                header("Location:admin.php");
            }else {
                $msg="Login failed";
            }
        }
    }
 }
?>
<html>
    <head>
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
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="password">
            <input type="submit" name="submit" value="Login">
        </form>
        <?php if (isset($msg)) {
            echo $msg;
        }?>
    </body>
</html>