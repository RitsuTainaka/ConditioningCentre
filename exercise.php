<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/23/2018
 * Time: 10:40 PM
 */

include_once ("header.php");
if(!isset($_SESSION['login_user']))
{
    header("refresh:0; url=" . "http://rukiax.noip.me/ConditioningCentre/");
    die;
}

$customerid = $_GET['customerid'];
$customername = $_GET['customername'];
$selectedprogram = $_GET['program'];
$bodyarea = $_GET['area'];
$page = "exercise";
?>

    <div class="grid-container-exercise">
        <div class="helpbtn">
            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
        </div>
        <div class="logo">
            <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
        </div>
        <div class="exercisebtns">
            <div class="btn-group-justified">
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Bench Press" class="btn btn-primary ">Bench Press</a>
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Bent Over Row" class="btn btn-primary">Bent Over Row</a>
            </div>
            <div class="btn-group-justified">
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Military Press" class="btn btn-primary ">Military Press</a>
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Fat Grip Curl" class="btn btn-primary ">Fat Grip Curl</a>
            </div>
            <div class="btn-group-justified">
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Waiter Carry" class="btn btn-primary">Waiter Carry</a>
                <a href="tracker.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>&exercise=Push Up" class="btn btn-primary ">Push Up</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("navbartext").innerHTML = "Select Exercise";
        document.getElementById("navback").style.display ="block";
        document.getElementById("navback").href = "bodyarea.php?customerdetail=<?php echo $customerid . "|" . $customername?>&program=<?php echo $selectedprogram;?>";

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