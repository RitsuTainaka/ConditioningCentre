<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 1:03 PM
 */

include_once ("header.php");
?>

<div class="grid-container-admin">
    <div class="useradminbtns">
        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg" id = "adduserbtn" name="adduserbtn">Add New User</a>
        <a data-toggle="modal" href="#myModalEdit" class="btn btn-primary btn-lg" id = "edituserbtn" name="adduserbtn">Edit User</a>
    </div>
</div>
<div class="modal-container"></div>

    <script type="text/javascript">
        document.getElementById("navbartext").innerHTML = "Admin";
        document.getElementById("navback").style.display ="block";
        document.getElementById("navback").href = "index.php";

        $(document).ready(function() {
            console.debug("Here");
            $('body').on('click', '.btn' , function (event) {
                event.stopPropagation();
                var url;
                var $test = event.target.id;
                if($test === "adduserbtn")
                {
                    url = "adduser.php";
                    $('.modal-container').load(url, function (result) {
                        $('#myModal').modal({show: true});
                    });
                }
                else if($test === "edituserbtn")
                {
                    url = "edituser.php";
                    $('.modal-container').load(url, function (result) {
                        $('#myModalEdit').modal({show: true});
                    });
                }
            });
        });

        $(document).on("hidden.bs.modal", "#myModal", function () {
            $('#myModal').remove(); // Remove from DOM.
        });
        $(document).on("hidden.bs.modal", "#myModalEdit", function () {
            $('#myModalEdit').remove(); // Remove from DOM.
        });

    </script>

<?php
include_once ("footer.php");