<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/20/2018
 * Time: 2:11 AM
 */
//$db = new db();
$page = "login";
?>

<div class="grid-container-login">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
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
                        <a href="#myModalForgot" data-toggle="modal" class="btn btn-primary btn-lg btn-block" id="forgotpass" name="forgotpass">Forgot Password</a>
                        <button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal-container"></div>
<script>
    document.getElementById("navback").parentNode.removeChild(document.getElementById("navback"));
    document.getElementById("navbartext").textContent = "Login";
    $(document).ready(function() {
        $('body').on('click', '.btn' , function (event) {
            event.stopPropagation();
            var url;
            var $test = event.target.id;

            if($test === "modallink")
            {
                var id = $('#'+event.target.id).attr("name");
                url = "help.php?page=" + id;
                $('.modal-container').load(url, function (result) {
                    $('#myModal').modal({show: true});
                });
            }
            else if($test === "forgotpass")
            {
                url = "forgotpass.php";
                $('.modal-container').load(url, function (result) {
                    $('#myModalForgot').modal({show: true});
                });
            }
        });
    });

    $(document).on("hidden.bs.modal", "#myModal", function () {
        $('#myModal').remove(); // Remove from DOM.
    });
    $(document).on("hidden.bs.modal", "#myModalCustomer", function () {
        $('#myModalCustomer').remove(); // Remove from DOM.
    });
    $(document).on("hidden.bs.modal", "#myModalEditCustomer", function () {
        $('#myModalEditCustomer').remove(); // Remove from DOM.
    });
</script>
