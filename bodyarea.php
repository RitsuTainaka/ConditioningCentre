<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 11:40 PM
 */

include_once ("header.php");

$customerdetails = explode('|',$_GET['customerdetail']);

$customerid = $customerdetails[0];
$customername = $customerdetails[1];
$selectedprogram = $_GET['program'];
xdebug_var_dump($customerid);
xdebug_var_dump($customername);
xdebug_var_dump($selectedprogram);

$page = "bodyarea";
?>

<div class="grid-container-bodyarea">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="bodyarea">
        <div class="btn-group">
            <a href="#" class="btn btn-primary btn-block">Chest & Legs</a>
            <a href="#" class="btn btn-primary btn-block">Legs</a>
        </div>
        <div class="btn-group">
            <a href="#" class="btn btn-primary btn-block">Shoulders & Back</a>
        </div>
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
