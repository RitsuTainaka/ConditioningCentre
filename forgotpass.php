<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 6:48 PM
 */

include_once ('include/core.php');
$program = $_GET['program'];
?>
<div id="myModalForgot" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Forgot Password</h4>
            </div>
            <div class="modal-body">
                <form id="forgotpass" class="login-form grid-container-forgotpass" method="post" action="processforgotpass.php" >
                    <div class="forgot-email">
                        <input type="text" name="useremail" placeholder="Email">
                    </div>
                    <div class="newuser-submit">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-group">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


