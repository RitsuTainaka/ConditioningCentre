<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 1:02 PM
 */

?>

<div class="grid-container-mainmenu">
    <div class="helpbtn">
        <button class=" btn-default">Help</button>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="title">
        <h4 id="titlemessage"></h4>
    </div>
</div>
<script>
    document.getElementById("navback").parentNode.removeChild(document.getElementById("navback"));
    document.getElementById("navbartext").textContent = "Main Menu";
    document.getElementById("titlemessage").textContent = "Welcome <?php echo $_SESSION['login_user']; ?>";
</script>