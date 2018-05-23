<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/20/2018
 * Time: 2:11 AM
 */
//$db = new db();
?>

<div class="grid-container-login">
    <div class="helpbtn">
        <button class="btn-default">Help</button>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="login-form">
        <form id="loginform" method="post" action="processlogin.php">
            <div class="form-login">
                <h4>Welcome back.</h4>
                <input name="username" type="text" id="username" autocomplete="username" class="form-control input-lg " placeholder="username" />
                <br>
                <input name="password" type="password" autocomplete="current-password" id="password" class="form-control input-lg" placeholder="password" />
                <br>
                <div class="wrapper">
                    <span class="group-btn">
                        <a href="#" class="btn btn-primary btn-lg btn-block">Forgot Password</a>
                        <button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById("navback").parentNode.removeChild(document.getElementById("navback"));
    document.getElementById("navbartext").textContent = "Login";
</script>
