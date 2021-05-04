<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM reg WHERE username='".$_POST['uname']."' and password='".$_POST['pw']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="pmodule.html";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="patientlogin.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Login</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="patientlogin.css">
</head>
    <body>
    <h1><center>PATIENT LOGIN</center></h1>
<div class="hero">
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">LOG IN</button>
            <button type="button" class="toggle-btn" onclick="register()">REGISTER</button>
        </div>
    <form id="login" class="input-group" action="patientlogin.php" method="post">
        <input name="uname" type="text" class="input-field" placeholder="Enter Email" required>
        <input name="pw" type="text" class="input-field" placeholder="Enter Password" required>
        <input type="checkbox" class="chech-box"><span>Remember Password</span>
        <button name="login" type="submit" class="submit-btn">Log In</button>
     </form>
        <?php
            if(isset($_POST['login']))
            {
                $patientname = $_POST['uname'];
                $password = $_POST['pw'];

                $query = "select * FROM reg WHERE patientname='$patientname' AND password='$password'";

                $query_run = mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    //valid
                    $_SESSION['uname']=$email;
                    header('location:pmodule.html');                }
                else{
                    //invalid
                    echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
                }
            }
            ?>

     <form id="register" class="input-group" action="patientlogin.php" method="post">
        <input name="pname" type="text" class="input-field" placeholder="Patient Name" required>
        <input name="add" type="text" class="input-field" placeholder="Address" required>
        <input name="mobile" type="text" class="input-field" placeholder="Mobile No." required>
        <input name="uname" type="text" class="input-field" placeholder="Username" required>
        <input name="pw" type="text" class="input-field" placeholder="Enter Password" required>
        <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
        <button name="submitbtn" type="submit" class="submit-btn">Register</button>
     </form>
        <?php
            if(isset($_POST['submitbtn']))
            {
                echo '<script type="text/javascript"> alert("Registration successfully done") </script>';

                $patientname = $_POST['pname'];
                $address = $_POST['add'];
                $mobileno = $_POST['mobile'];
                $username = $_POST['uname'];
                $password = $_POST['pw'];

                $query = "select * FROM reg WHERE patientname='$patientname'";
                $query_run = mysqli_query($con,$query);

                if(mysqli_num_rows($query_run)>0)
                {
                    echo '<script type="text/javascript"> alert("user already exist") </script>';
                }
                else
                {
                    $query = "insert into reg values('$patientname', '$address','$mobileno','$username','$password')";
                    $query_run = mysqli_query($con,$query);

                    if($query_run)
                    {
                        echo '<script type="text/javascript"> alert("user registered...go to login page") </script>';

                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("error") </script>';

                    }
                }

            }
        ?>
</div>
</div>
<script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }
    function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
    }
</script>
</body>
</html>
