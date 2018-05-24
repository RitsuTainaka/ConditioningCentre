<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 3:07 PM
 */
include_once ('include/core.php');
$program = $_GET['program'];
?>
<div id="myModalCustomer" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Add New User</h4>
            </div>
            <div class="modal-body">
                <form id="newuserform" class="login-form grid-container-addcustomer" method="post" action="processnewcustomer.php" >
                    <div class="newcustomer-textboxes">
                        <input type="hidden" name="program" value="<?php echo $program; ?>">
                        <input type="text" name="name" placeholder="Customer Name" required>
                        <input type="text" name="address" placeholder="Customer Address" required>
                        <input type="text" name="phone" placeholder="Customer Phone" required>
                        <input type="text" name="email" placeholder="Customer E-Mail" required>
                        <input type="text" name="age" placeholder="Customer Age" required>
                        <select name="gender" required>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    <div class="newcustomer-coachselect">
                        <label>Coach: </label>
                        <select name="coach">
                            <option value="" selected></option>
                            <?php
                                $sql = "SELECT accountID, username FROM CoachLoginAccount";
                                $db = new db();
                                $result = $db::query($sql);

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo '<option value="'.$row['accountID'].'">'.$row['username'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="editcustomer-programselect">
                        <label>Program:</label>
                        <select name="program" required>
                            <?php

                            $sql = "SELECT programName, programID FROM Program";
                            $result = $db::query($sql);

                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <option value="<?php echo $row['programID'] .'|'.$row['programName']; ?>" <?php echo ($row['programName'] === $program) ? "selected":""; ?>><?php echo $row['programName']; ?></option>
                                <?php
                            }
                            ?>
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
