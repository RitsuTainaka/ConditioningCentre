<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 2:00 PM
 */
include_once ("header.php");
$page = "program";
?>

<div class="grid-container-program">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="title">
        <h4 id="titlemessage"></h4>
    </div>
    <div class="programbuttons">
        <div class="btn-block">
            <a href="customer.php?program=energised" class="btn btn-primary btn-block btn-lg">Energised</a>
            <a href="customer.php?program=energisedfemale" class="btn btn-primary btn-lg btn-block disabled">Energised Female</a>
        </div>
        <div class="btn-block">
            <a href="customer.php?program=juggernaut" class="btn btn-primary btn-lg btn-block disabled">Juggernaut</a>
            <a href="customer.php?program=personal" class="btn btn-primary btn-lg btn-block disabled">Personal</a>
        </div>
    </div>
</div>
    <div class="modal-container"></div>

<script type="text/javascript">
    document.getElementById("navbartext").innerHTML = "Session Select";
    document.getElementById("titlemessage").textContent = "Session Selection";
    document.getElementById("navback").style.visibility ="visible";
    document.getElementById("navback").href = "index.php";

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