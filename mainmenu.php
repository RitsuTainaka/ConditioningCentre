<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 1:02 PM
 */
$page = "MainMenu";
?>

<div class="grid-container-mainmenu">
    <div class="helpbtn">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm" id = "modallink" name="<?php echo $page; ?>">Help</a>
    </div>
    <div class="logo">
        <img class="center" src="assets/img/logo.png" alt="Fitness Centre Logo">
    </div>
    <div class="title">
        <h4 id="titlemessage"></h4>
    </div>
</div>
<div class="modal-container"></div>
<script>
    document.getElementById("navback").parentNode.removeChild(document.getElementById("navback"));
    document.getElementById("navbartext").textContent = "Main Menu";
    document.getElementById("titlemessage").textContent = "Welcome <?php echo $_SESSION['login_user']; ?>";
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