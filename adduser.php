<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 1:09 PM
 */
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Add New User</h4>
            </div>
            <div class="modal-body">
                <form id="newuserform" class="login-form grid-container-adduser" method="post" action="processnewuser.php" >
                   <div class="newuser-textboxes">
                       <input type="text" name="username" placeholder="username">
                       <input type="password" name="password" placeholder="password">
                       <input type="email" name="email" placeholder="default@someone.com">
                   </div>
                    <div class="newuser-roleselect">
                        <label>Role: </label>
                        <select name="accountlevel">
                            <option value="1" selected>Registered User</option>
                            <option value="100">Admin</option>
                        </select>
                    </div>
                    <div class="newuser-submit">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-group">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>