<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/19/2018
 * Time: 3:25 AM
 */
include_once ("header.php");
?>
<div class="maincontent">
    <?php
    if(isset($_SESSION['login_user'])) {
        include ("mainmenu.php");
    }
    else {
        include("login.php");
    }
    ?>
</div>

<?php
include_once ("footer.php");
