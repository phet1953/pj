<?php
include 'header/head.php';
?>
<title>เพิ่มบริษัทยาและวัคซีน</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barcompadrug.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มบริษัทยาและวัคซีน</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพื่มบริษัทยาและวัคซีน
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
                                                                    <div class="col-md-6 form-group">
                                                                        <label>รหัส</label>
                                                                        <input class="form-control" type="text" name="ID_compadrug" id="ID_compadrug" style='height:40px; font-size:16px;width: 100%;'>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label>ชื่อบริษัท</label>
                                                                        <input class="form-control" type="text" name="compadrug_c" id="compadrug_c" style='height:40px; font-size:16px;width: 100%;'>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div align='center'>
                                                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="counter pull-right"></span>
                                                <div id="select_compadrug"></div>
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
        select_compadrug();
        $("#btnSend").click(function() {
            inser_compadrug();
        });
    });

    function select_compadrug() {
        var jsonObj = {
            "namef": "select_compadrug"
        }

        $.ajax({
            type: "POST",
            url: "controller/addcompadrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_compadrug').html(result);
            }
        });
    }

    function inser_compadrug() {
        var ID_compadrug = document.getElementById("ID_compadrug").value;
        var compadrug_c = document.getElementById("compadrug_c").value;

        var jsonObj = {
            "namef": "inser_compadrug",
            "ID_compadrug": ID_compadrug,
            "compadrug_c": compadrug_c,
        }
        if (compadrug_c != "" && compadrug_c != null) {
            $.ajax({
                type: "POST",
                url: "controller/addcompadrug.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addcompadrug.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่สายพันธู์");
        }
    }

    function compadrug_delete(ID_compadrug) {
        var jsonObj = {
            "namef": "compadrug_delete",
            "ID_compadrug": ID_compadrug
        }

        $.ajax({
            type: "POST",
            url: "controller/addcompadrug.php",
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