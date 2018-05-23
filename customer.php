<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 2:44 PM
 */

$selectedProgram = $_GET['program'];
include_once ("header.php");
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
            <select name="customerdetail" class="customerselection" >
        <?php
            while($row = mysqli_fetch_array($result)) {

                $value = $row['customerID'] ."|". $row['customerName'];
                echo '<option value="' . $value .  '">' . $row['customerName'] . '</option>';
                        }?>
                    </select>
                    <input type="hidden" name="program" value="<?php echo $selectedProgram ?>">
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Select</button>
                    <a href="#" class="btn btn-primary btn-block">Edit Customer</a>
                    <a href="#" class="btn btn-primary btn-block">Add Customer</a>
                </form>

    </div>
</div>

<script type="text/javascript">
    document.getElementById("navbartext").innerHTML = "Select Customer";
    document.getElementById("titlemessage").textContent = "Customer Selection";
    document.getElementById("navback").style.visibility ="visible";
    document.getElementById("navback").href = "program.php";

    $(document).ready(function() {
        $('body').on('click', '.btn' , function (event) {
            event.stopPropagation();
            var id = $('#'+event.target.id).attr("name");
            var url;
            var $test = event.target.id.substring(0,9);
            if($test === "modallink")
            {
                url = "help.php?page=" + id;
            }
            console.debug(url);
            $('.modal-container').load(url, function (result) {
                $('#myModal').modal({show: true});
            });
        });
    });

    $(document).on("hidden.bs.modal", "#myModal", function () {
        $('#myModal').remove(); // Remove from DOM.
    });

</script>
<?php
include_once ("footer.php");