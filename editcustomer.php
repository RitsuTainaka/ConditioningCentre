<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 3:22 PM
*/
include_once ('include/core.php');
$cid = $_GET['userid'];
$selectedProgram = $_GET['program'];
?>
<div id="myModalEditCustomer" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Edit Member</h4>
            </div>
            <div class="modal-body">
                <form id="newuserform" class="login-form grid-container-addcustomer" method="post" action="processeditcustomer.php" >
                    <div class="newcustomer-textboxes">
                        <?php
                        $db = new db();
                        $sql = "SELECT * FROM Customer WHERE customerID = '$cid'";
                        $result = $db::query($sql);
                        $row = mysqli_fetch_array($result);
                        $coachsql = "SELECT fkAccountID FROM CoachCustomer WHERE fkCustomerID = '$cid'";
                        $coachresult = $db::query($coachsql);
                        $coachid = mysqli_fetch_array($coachresult)['fkAccountID'];

                        $enrolledsql = "SELECT fkProgramID FROM EnrolledProgram WHERE fkCustomerID ='$cid'";
                        $enrolledresult = $db::query($enrolledsql);
                        $enrolledid = mysqli_fetch_array($enrolledresult)['fkProgramID'];
                        ?>
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                        <input type="text" name="name" placeholder="Member Name" value="<?php echo $row['customerName'];?>" required>
                        <input type="text" name="address" placeholder="Member Address" value="<?php echo $row['customerAddress'];?>" required>
                        <input type="text" name="phone" placeholder="Member Phone" value="<?php echo $row['customerPhone'];?>" required>
                        <input type="text" name="email" placeholder="Member E-Mail" value="<?php echo $row['customerEmail'];?>" required>
                        <input type="text" name="age" placeholder="Member Age" value="<?php echo $row['customerAge'];?>" required>
                        <select name="gender" required>
                            <option value="m" <?php echo ($row['gender'] == "m") ? "selected":""; ?>>Male</option>
                            <option value="f" <?php echo ($row['gender'] == "f") ? "selected":""; ?>>Female</option>
                            <option value="o" <?php echo ($row['gender'] == "o") ? "selected":""; ?>>Other</option>
                        </select>
                    </div>
                    <div class="newcustomer-coachselect">
                        <label>Coach: </label>
                        <select name="coach">
                            <?php
                            $sql = "SELECT accountID, username FROM CoachLoginAccount";

                            $result = $db::query($sql);

                            while($row = mysqli_fetch_array($result))
                            {
                             ?>
                                <option value="<?php echo $row['accountID']; ?>" <?php echo ($row['accountID'] === $coachid) ? "selected":""; ?>><?php echo $row['username']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="editcustomer-programselect">
                        <label>Program:</label>
                        <select name="program">
                            <?php
                            $sql = "SELECT programName, programID FROM Program";

                            $result = $db::query($sql);

                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <option value="<?php echo $row['programID'] .'|'.$row['programName']; ?>" <?php echo ($row['programID'] === $enrolledid) ? "selected":""; ?>><?php echo $row['programName']; ?></option>
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
