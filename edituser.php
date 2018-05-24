<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 1:10 PM
 */
include ('include/core.php');
?>
<div id="myModalEdit" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Edit User</h4>
            </div>
            <div class="modal-body">
                <form id="edituserform" class="login-form grid-container-edituser" method="post" action="processedituser.php" >
                    <div class="edituser-selectuser">
                        <label>Select user to edit:</label>
                        <select name="user">
                            <?php
                            $sql = "SELECT accountID, username FROM CoachLoginAccount";
                            $db = new db();
                            $result = $db::query($sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo '<option value="'. $row['accountID'] . '">'. $row['username'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="newuser-textboxes">
                        <input type="text" name="newusername" placeholder="New Username" autocomplete="off">
                        <input type="password" name="newpassword" placeholder="New Password" autocomplete="off">
                        <input type="email" name="newemail" placeholder="New Email" autocomplete="off">
                    </div>
                    <div class="newuser-roleselect">
                        <label>New Role: </label>
                        <select name="newaccountlevel">
                            <option value="" selected></option>
                            <option value="1">Registered User</option>
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
