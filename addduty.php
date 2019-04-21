<?php
include 'header/head.php';
?>
<title>เพิ่มตำแหน่งหน้าที่ในฟาร์ม</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditduty.php';
include 'script/script.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มตำแหน่งหน้าที่ในฟาร์ม</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพิ่มตำแหน่งหน้าที่ในฟาร์ม
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form name="frm" method="post" action="">
                                                            <div class="panel-body" style="border-radius: 20px">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12 form-group" align="center">
                                                                        <label>ตำแหน่งหน้าที่ในฟาร์ม</label>
                                                                        <input type="text" class="form-control" name="duty_d" id="duty_d" style='height:40px; font-size:16px;width: 50%;'>
                                                                        <br>
                                                                        <div align='center'>
                                                                            <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="counter pull-right"></span>
                                                <div id="select_duty"></div>
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
        select_duty();
        $("#btnSend").click(function() {
            inser_duty();
        });
    });

    function select_duty() {
        var jsonObj = {
            "namef": "select_duty"
        }

        $.ajax({
            type: "POST",
            url: "controller/addduty.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_duty').html(result);
            }
        });
    }

    function inser_duty() {
        var duty_d = document.getElementById("duty_d").value;
        var jsonObj = {
            "namef": "inser_duty",
            "duty_d": duty_d,
        }
        if (duty_d != "" && duty_d != null) {
            $.ajax({
                type: "POST",
                url: "controller/addduty.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addduty.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่ตำแหน่งหน้าที่ในฟาร์ม");
        }
    }

    function duty_delete(ID_duty) {
        var jsonObj = {
            "namef": "duty_delete",
            "ID_duty": ID_duty
        }

        $.ajax({
            type: "POST",
            url: "controller/addduty.php",
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