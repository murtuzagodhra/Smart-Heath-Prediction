<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
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
        <form id="register" class="input-group">
        <input type="text" class="input-field" placeholder="Patient Name" required>
        <input type="text" class="input-field" placeholder="Address" required>
        <input type="text" class="input-field" placeholder="Mobile No." required>
        <input type="text" class="input-field" placeholder="Username" required>
        <input type="text" class="input-field" placeholder="Enter Password" required>
        <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
        <button type="submit" class="submit-btn">Register</button>  
     </form>
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