<?php
include 'header/head.php';
?>
<title>จุดประสงค์การใช้ยา</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barobjdrug.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">จุดประสงค์การใช้ยา</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพื่มจุดประสงค์การใช้ยา
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
                                                                        <input class="form-control" type="text" name="ID_objdrug" id="ID_objdrug" style='height:40px; font-size:16px;width: 100%;'>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label>จุดประสงค์การใช้ยา</label>
                                                                        <input class="form-control" type="text" name="objdrug_o" id="objdrug_o" style='height:40px; font-size:16px;width: 100%;'>
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
                                                <div id="select_objdrug"></div>
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
        select_objdrug();
        $("#btnSend").click(function() {
            inser_objdrug();
        });
    });

    function select_objdrug() {
        var jsonObj = {
            "namef": "select_objdrug"
        }

        $.ajax({
            type: "POST",
            url: "controller/addobjdrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_objdrug').html(result);
            }
        });
    }

    function inser_objdrug() {
        var ID_objdrug = document.getElementById("ID_objdrug").value;
        var objdrug_o = document.getElementById("objdrug_o").value;

        var jsonObj = {
            "namef": "inser_objdrug",
            "ID_objdrug": ID_objdrug,
            "objdrug_o": objdrug_o,
        }
        if (objdrug_o != "" && objdrug_o != null) {
            $.ajax({
                type: "POST",
                url: "controller/addobjdrug.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addobjdrug.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่จุดประสงค์การใช้ยา");
        }
    }

    function objdrug_delete(ID_objdrug) {
        var jsonObj = {
            "namef": "objdrug_delete",
            "ID_objdrug": ID_objdrug
        }

        $.ajax({
            type: "POST",
            url: "controller/addobjdrug.php",
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