<?php include 'db.php';
$db = new db();
include 'session.php';
$session = new session();
$session::init();
$session::checksession();
?>
    <?php
        $query="SELECT * FROM admin WHERE id = '1'";
        $result = $db->select($query);
        $result = $result->fetch_assoc();
        /*if ($result) {
            echo $result['text1'];
        }else{
            echo "failed";
        }*/
    ?>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $permited = array('mp4');
            $filename = $_FILES['video']['name'];
            $filesize = $_FILES['video']['size'];
            $filetemp = $_FILES['video']['tmp_name'];
            $div = explode('.', $filename);
            $fileext = strtolower(end($div)) ;
            $uniqueimage = 'video.'.$fileext;
            $uploadedimage = "uploads/".$uniqueimage;
            $boxcolor = mysqli_real_escape_string($db->link, $_POST['boxcolor']);
            $text1color = mysqli_real_escape_string($db->link, $_POST['text1color']);
            $text2color = mysqli_real_escape_string($db->link, $_POST['text2color']);
            $text3color = mysqli_real_escape_string($db->link, $_POST['text3color']);
            $contact = mysqli_real_escape_string($db->link, $_POST['contact']);
            $text4color = mysqli_real_escape_string($db->link, $_POST['text4color']);
            $payment = mysqli_real_escape_string($db->link, $_POST['payment']);
            $text5color = mysqli_real_escape_string($db->link, $_POST['text5color']);
            move_uploaded_file($filetemp,"uploads/".$uniqueimage);
            $query ="UPDATE admin
            SET
            video = '$uploadedimage',
            mainbox = '$boxcolor',
            text1 = '$text1color',
            text2 = '$text2color',
            text3 = '$text3color',
            contact = '$contact',
            text4 = '$text4color',
            payment = '$payment',
            text5 = '$text5color'
            WHERE id = '1'
            ";
            $adddesign = $db->update($query);
            if ($adddesign) {
                echo "design updated successfully";
            }else{
                echo "design not updated";
            }
        }
        if (isset($_GET['action']) && $_GET['action'] == "logout") {
            session::destroy();
        } 
    ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><a href="changepass.php" style="text-decoration: none;">change password</a></td>
                    <td><a href="https://htmlcolorcodes.com/" target="_blank" style="text-decoration: none;">Get color codes</a></td>
                    
                </tr>
                <tr>
                    <td>video:</td>
                    <td><input type="file" name="video"></td>
                </tr>
                <tr>
                    <td>Box color :</td>
                    <td><input type="text" name="boxcolor" id="" value="<?php echo $result['mainbox']?>"></td>
                </tr>
                <tr>
                    <td>Text 1 color :</td>
                    <td><input type="text" name="text1color" id="" value="<?php echo $result['text1']?>"></td>
                </tr>
                <tr>
                    <td>Text 2 color :</td>
                    <td><input type="text" name="text2color" id="" value="<?php echo $result['text2']?>"></td>
                </tr>
                <tr>
                    <td>Text 3 color :</td>
                    <td><input type="text" name="text3color" id="" value="<?php echo $result['text3']?>"></td>
                </tr>
                <tr>
                    <td>Contact no :</td>
                    <td><input type="text" name="contact" id="" value="<?php echo $result['contact']?>"></td>
                </tr>
                <tr>
                    <td>Text 4 color :</td>
                    <td><input type="text" name="text4color" id="" value="<?php echo $result['text4']?>"></td>
                </tr>
                <tr>
                    <td>Payment number :</td>
                    <td><input type="text" name="payment" id="" value="<?php echo $result['payment']?>"></td>
                </tr>
                <tr>
                    <td>Text 5 color :</td>
                    <td><input type="text" name="text5color" id="" value="<?php echo $result['text5']?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Update"></td>
                    <td><a href="?action=logout" style="text-decoration: none;">Logout</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>