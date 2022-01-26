<?php include 'db.php';
$db = new db();
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
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
        <video autoplay muted loop class="myvideo">
            <source src="uploads/video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="container">
            <div class="main" style="background-color: <?php echo $result['mainbox']?>;box-shadow: 0px 0px 30px 3px <?php echo $result['mainboxshadow']?>;">
                <p class="headtext" style="color: <?php echo $result['text1']?>;text-shadow: 0 0 0.2em <?php echo $result['text1']?>;" id="headtext">Payment alert</p>
                <p class="maintext" style="color: <?php echo $result['text2']?>;">সম্মানিত গ্রাহক, আমরা আন্তরিক ভাবে দুঃখিত। 
                    বিল পরিশোধ না করায় আপনার ইন্টারনেট সংযোগটি সয়ংক্রিয় ভাবে 
                    বিচ্ছিন্ন করা হয়েছে।
                </p>
                <div class="contact">
                <img class="phoneimg" src="phone.png" alt="">
                    <p class="contacttext" style="color: <?php echo $result['text3']?>;">
                        <?php echo " ".$result['contact']?>
                    </p>
                </div>
                <div class="bkash">
                    <img class="bkashimg" src="bkash.png" alt="">
                    <p class="bkashtext" style="color: <?php echo $result['text4']?>;">
                        <?php echo $result['payment']?>
                    </p>
                </div>
                <p class="footertext" style="color: <?php echo $result['text5']?>;">
                    নিয়মিত আপনার ইন্টারনেট বিল পরিশোধ করুন।
                </p>
            </div>
        </div>
    </body>
</html>