<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditdrug.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon" style="border-radius: 20px">
                                    <i class="flaticon-worker"></i>
                                </div>
                                <div class="colorlib-text">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="" method="POST" name="" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4 form-group">
                                                                <label>รหัสวัคซีน</label>
                                                                <input class="form-control" type="text" name="ID_drug" id="ID_drug" style='height:40px; font-size:16px;width: 100%;'>
                                                            </div>
                                                            <div class="col-md-4" id="select_option">

                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>วัคซีนป้องกันโรค</label>
                                                                <input class="form-control" type="text" name="drug_d" id="drug_d" style='height:40px; font-size:16px;width: 100%;'>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>ปริมาณการใช้(ซีซี/ตัว)</label>
                                                                <input class="form-control" type="text" name="cc_c" id="cc_c" style='height:40px; font-size:16px;width: 100%;'>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>ชื่อผลิตภัณฑ์</label>
                                                                <input class="form-control" type="text" name="product_p" id="product_p" style='height:40px; font-size:16px;width: 100%;'>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>ข้อบ่งใช้</label>
                                                                <input class="form-control" type="text" name="use_u" id="use_u" style='height:40px; font-size:16px;width: 100%;'>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div align='center'>
                                                            <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="counter pull-right"></span>
                                                <div id="select_drug"></div>
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
        select_option();
        select_drug();
        $("#btnSend").click(function() {
            inser_drug();
        });
    });

    function select_option() {
        var jsonObj = {
            "namef": "select_option"
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option').html(result);
            }
        });
    }

    function select_drug() {
        var jsonObj = {
            "namef": "select_drug"
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_drug').html(result);
            }
        });
    }

    function inser_drug() {
        var selectA = document.getElementById("selectA").value;
        var drug_d = document.getElementById("drug_d").value;
        var cc_c = document.getElementById("cc_c").value;
        var product_p = document.getElementById("product_p").value;
        var use_u = document.getElementById("use_u").value;
        var ID_drug = document.getElementById("ID_drug").value;

        var jsonObj = {
            "namef": "inser_drug",
            "selectA": selectA,
            "drug_d": drug_d,
            "cc_c": cc_c,
            "product_p": product_p,
            "use_u": use_u,
            "ID_drug": ID_drug,
        }
        if (selectA != "" && selectA != null) {
            if (drug_d != "" && drug_d != null) {
                if (cc_c != "" && cc_c != null) {
                    if (product_p != "" && product_p != null) {
                        $.ajax({
                            type: "POST",
                            url: "controller/adddrug.php",
                            data: jsonObj,
                            success: function(result) {
                                alert(result.message);
                                if (result.status == 1) {
                                    window.location = 'adddrug.php';
                                }
                            }
                        });
                    } else {
                        alert("กรุณาใส่ชื่อผลิตภัณฑ์");
                    }
                } else {
                    alert("กรุณาใส่ปริมาณการใช้(ซีซี/ตัว)");
                }
            } else {
                alert("กรุณาใส่วัคซีนป้องกันโรค");
            }
        } else {
            alert("กรุณาใส่ชื่อบริษัท");
        }
    }

    function drug_delete(ID_drug) {
        var jsonObj = {
            "namef": "drug_delete",
            "ID_drug": ID_drug
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
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