<?php

$con = mysqli_connect("localhost","root","") or die("unable to connect");
mysqli_select_db($con,"project");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="feedback1.css">
</head>
<body>
    <div class="container">
        <form action="fcheck.php" method="POST">
            <div class="form">
                <h1>Your Feedback is Important for Us</h1>
                    <input name="uname" type="text" class="username" placeholder="Enter username">
                <div class="rating">
                    <input type="radio" name="emoji" id="emoji1" checked>
                    <label for="emoji1">
                        <img src="happyemoji.png" title="Satisfactory" height="100" width="100">
                        <h4>Satisfactory</h4>
                    </label>
                    <input type="radio" name="emojii" id="emoji2">
                    <label for="emoji2">
                        <img src="medium.jpg" title="Helpful" height="100" width="100">
                        <h4>Helpful</h4>
                    </label>
                    <input type="radio" name="emojis" id="emoji3">
                    <label for="emoji3">
                        <img src="sad emoji.jpg" title="Not Useful" height="100" width="100">
                        <h4>Not Useful</h4>
                    </label>
                </div>
                <div class="sub">
                     <input name="submitbtn" type="submit" value="Submit"> 
                </div>
            <?php   
            if(isset($_POST['submitbtn']))
            {
                echo '<script type="text/javascript"> alert("Feedback submitted") </script>';

                $username = $_POST['uname'];
                $emoji = $_POST['emoji'];
                $emoji = $_POST['emojii'];
                $emoji = $_POST['emojis'];


                $query = "select * FROM feedback WHERE username='$username'";
                $query_run = mysqli_query($con,$query);
            }
            ?>

            </div>
        </form>
    </div>
</body>
</html>