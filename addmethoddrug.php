<?php
include 'header/head.php';
?>
<title>เพิ่มวิธีการให้ยา</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barmethoddrug.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มวิธีการให้ยา</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพิ่มวิธีการให้ยา
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
                                                                        <input class="form-control" type="text" name="ID_methoddrug" id="ID_methoddrug" style='height:40px; font-size:16px;width: 100%;'>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label>วิธีการให้ยา</label>
                                                                        <input class="form-control" type="text" name="methoddrug_m" id="methoddrug_m" style='height:40px; font-size:16px;width: 100%;'>
                                                                    </div>
                                                                    <div align='center'>
                                                                        <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="counter pull-right"></span>
                                                <div id="select_methoddrug"></div>
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
        select_methoddrug();
        $("#btnSend").click(function() {
            inser_methoddrug();
        });
    });

    function select_methoddrug() {
        var jsonObj = {
            "namef": "select_methoddrug"
        }

        $.ajax({
            type: "POST",
            url: "controller/addmethoddrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_methoddrug').html(result);
            }
        });
    }

    function inser_methoddrug() {
        var ID_methoddrug = document.getElementById("ID_methoddrug").value;
        var methoddrug_m = document.getElementById("methoddrug_m").value;

        var jsonObj = {
            "namef": "inser_methoddrug",
            "ID_methoddrug": ID_methoddrug,
            "methoddrug_m": methoddrug_m,
        }
        if (methoddrug_m != "" && methoddrug_m != null) {
            $.ajax({
                type: "POST",
                url: "controller/addmethoddrug.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addmethoddrug.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่วิธีการให้ยา");
        }
    }

    function methoddrug_delete(ID_methoddrug) {
        var jsonObj = {
            "namef": "methoddrug_delete",
            "ID_methoddrug": ID_methoddrug
        }

        $.ajax({
            type: "POST",
            url: "controller/addmethoddrug.php",
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