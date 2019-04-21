<?php
include 'header/head.php';
?>
<title>เพื่มกิจกรรม</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditpigac.php';
include 'connect/connect.php';
?>

<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพื่มกิจกรรม</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon" style="border-radius: 20px">
                                    <i class="flaticon-sketch"></i>
                                </div>
                                <div class="colorlib-text">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo" style="border-radius: 20px">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพื่มกิจกรรมสุกร
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form name="frm" method="post" action="">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12 form-group" align="center">
                                                                <label>ชื่อกิจกรรม</label>
                                                                <input type="text" class="form-control" name="activity_a" id="activity_a" style='height:40px; font-size:16px;width: 50%;'>
                                                                <br>
                                                                <div align='center'>
                                                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="counter pull-right"></span>
                                                <div id="select_activity"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select_activity();
        $("#btnSend").click(function() {
            inser_activity();
        });
    });

    function select_activity() {
        var jsonObj = {
            "namef": "select_activity"
        }

        $.ajax({
            type: "POST",
            url: "controller/addactivity.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_activity').html(result);
            }
        });
    }

    function inser_activity() {
        var activity_a = document.getElementById("activity_a").value;
        var jsonObj = {
            "namef": "inser_activity",
            "activity_a": activity_a,
        }
        if (activity_a != "" && activity_a != null) {
            $.ajax({
                type: "POST",
                url: "controller/addactivity.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addactivity.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่กิจกรรม");
        }
    }

    function activity_delete(ID_activity) {
        var jsonObj = {
            "namef": "activity_delete",
            "ID_activity": ID_activity
        }

        $.ajax({
            type: "POST",
            url: "controller/addactivity.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    $("#" + result.num).hide();
                }
            }
        });
    }
</script>

<?PHP
include 'script/script.php';
?>