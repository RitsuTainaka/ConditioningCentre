<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 2:44 PM
 */

$selectedProgram = $_GET['program'];
include_once ("header.php");
if(!isset($_SESSION['login_user']))
{
    header("refresh:0; url=" . "http://rukiax.noip.me/ConditioningCentre/");
    die;
}
$db = new db();
$page = "customer";
?>

<div class="grid-container-customer">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="customerselect">
        <?php
            $sql = "SELECT Customer.customerName, Customer.customerID  FROM `Customer` 
                    INNER JOIN `EnrolledProgram` ON `EnrolledProgram`.`fkCustomerID` = `Customer`.`customerID` 
                    LEFT JOIN `Program` ON `EnrolledProgram`.`fkProgramID` = `Program`.`programID`
                    WHERE `Program`.`programName` = '$selectedProgram'";
            $result = $db::query($sql);
            ?>
        <form method="get" action="bodyarea.php">
            <select name="customerdetail" class="customerselection" onchange="selected_cid()" >
        <?php
            while($row = mysqli_fetch_array($result)) {

                        $value = $row['customerID'] ."|". $row['customerName'];
                        echo '<option value="' . $value .  '">' . $row['customerName'] . '</option>';
                        }?>
                    </select>
                    <input type="hidden" name="program" value="<?php echo $selectedProgram ?>">
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Select</button>
                    <a data-toggle="modal" href="#myModalEditCustomer" class="btn btn-primary btn-block" id = "editcustomer" name="editcustomer">Edit Member</a>
                    <a data-toggle="modal" href="#myModalCustomer" class="btn btn-primary btn-block" id = "newcustomer" name="newcustomer">Add Member</a>
                </form>
    </div>
</div>
    <div class="modal-container"></div>
<script type="text/javascript">
    var $current_selected_customer_id;
    document.getElementById("navbartext").innerHTML = "Select Customer";
    document.getElementById("navback").style.display ="block";
    document.getElementById("navback").href = "program.php";

    $(document).ready(function() {
        console.debug("Here");
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
            else if($test === "newcustomer")
            {
                url = "addcustomer.php?program=<?php echo $selectedProgram; ?>";
                $('.modal-container').load(url, function (result) {
                    $('#myModalCustomer').modal({show: true});
                });
            }
            else if($test === "editcustomer")
            {
                console.debug("Here");
                url = "editcustomer.php?userid=" + $current_selected_customer_id + "&program=<?php echo $selectedProgram; ?>" ;
                $('.modal-container').load(url, function (result) {
                    $('#myModalEditCustomer').modal({show: true});
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
    function selected_cid() {
        var temp = $(".customerselection").val().split("|", 1);
        $current_selected_customer_id = temp;
    }

</script>
<?php
include_once ("footer.php");