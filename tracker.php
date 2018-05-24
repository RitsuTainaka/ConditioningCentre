<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/23/2018
 * Time: 11:22 PM
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
$exercise = $_GET['exercise'];
$page = "tracker";

?>

<div class="grid-container-tracker">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
    </div>
    <div class="title">
        <h4 id="titlemessage"></h4>
    </div>
    <div class="trackerform">
        <form id="trackerform" method="post" action="processtracker.php">
            <div class="grid-container-trackerboxes">
                <div class="prevresults">
                    <h4>Previous Record</h4>
                    <input type="text" class="input-lg fitfill" disabled value="<?php echo prevResult($customerid, areaid($bodyarea), exeid($exercise)); ?>">KG
                </div>
                <div class="newresults">
                    <h4>Current Record</h4>
                        <input type="text" class="input-lg fitfill" name="newvalue"/>KG
                        <input type="hidden" name="customername" value="<?php echo $customername ;?>"/>
                        <input type="hidden" name="customerid" value="<?php echo $customerid ;?>"/>
                        <input type="hidden" name="program" value="<?php echo $selectedprogram ;?>"/>
                        <input type="hidden" name="areaid" value="<?php echo areaid($bodyarea);?>"/>
                        <input type="hidden" name="exerciseid" value="<?php echo exeid($exercise) ;?>"/>
                        <input type="hidden" name="areaname" value="<?php echo $bodyarea?>"/>
                        <input type="hidden" name="exercisename" value="<?php echo $exercise ;?>"/>
                        <input type="hidden" name="coachid" value="<?php echo $_SESSION['accountid']; ?>"/>
                </div>
            </div>
            <div class="trackersubmit">
                <input name="submit" type="submit" class="btn btn-primary btn-lg" value="submit"/>
            </div>
        </form>
    </div>
</div>
    <script type="text/javascript">
        document.getElementById("navbartext").innerHTML = "Exercise Tracker";
        document.getElementById("titlemessage").innerHTML = "<?php echo $customername . '<br>' . $exercise ?>";
        document.getElementById("navback").style.display ="block";
        document.getElementById("navback").href = "exercise.php?customerid=<?php echo $customerid; ?>&customername=<?php echo $customername; ?>&program=<?php echo $selectedprogram; ?>&area=<?php echo urlencode($bodyarea);?>";

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

function prevResult($cid, $aid, $eid){
    $db = new db();
    $mainsql = "SELECT `Result`.`resultWeight` FROM `Result` WHERE `Result`.`fkAreaID` = '$aid' AND `Result`.`fkExerciseID` = '$eid' AND `Result`.`fkCustomerID` = '$cid' ORDER BY `Result`.`resultDate`DESC LIMIT 1";
    $result = $db::query($mainsql);
    return mysqli_fetch_array($result)['resultWeight'];
}

function areaid($area){
    $db = new db();
    $areaidsql = "SELECT `BodyArea`.`areaID` FROM `BodyArea` WHERE`areaName` = '$area'";
    $result = $db::query($areaidsql);
    return mysqli_fetch_array($result)['areaID'];
}

function exeid($exercise){
    $db = new db();
    $exesql = "SELECT `Exercise`.`exerciseID` FROM `Exercise` WHERE`exerciseName` = '$exercise'";
    $result = $db::query($exesql);
    return mysqli_fetch_array($result)['exerciseID'];
}

