<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลพ่อพันธ์ุ</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditpigdad.php';
include 'connect/connect.php';
?>

<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพิ่มข้อมูลพ่อพันธ์ุ</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-13">
                    <div class="row">
                        <div class="col-md-13">
                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon" style="border-radius: 20px">
                                    <i class="flaticon-worker"></i>
                                </div>

                                <div class="colorlib-text">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลพ่อพันธ์ุ
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="" method="POST" name="bt1" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูพ่อพันธู์</label>
                                                                <input class="form-control" name="number" id="number" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูพ่อของพ่อพันธู์</label>
                                                                <input class="form-control" name="det" id="det" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>อายุ</label>
                                                                <input class="form-control" type="text" name="age" id="age" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" id="select_option" align="center">

                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูแม่ของพ่อพันธู์</label>
                                                                <input class="form-control" name="mom" id="mom" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>วันที่เข้าฝูง</label>
                                                                <input type="date" class="form-control" name="datfrom" id="datfrom" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>แหล่งที่มา</label>
                                                                <input class="form-control" name="no" id="no" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>วันที่เกิด</label>
                                                                <input type="date" class="form-control" name="datbirth" id="datbirth" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>วันที่คัดออก</label>
                                                                <input type="date" class="form-control" name="datdet" id="datdet" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div align='center'>
                                                            <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="counter pull-right"></span>
                                                <div id="select"></div>
                                                <div>
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
</div>
    <div id="select_edit"></div>

    <script type="text/javascript">
        $(document).ready(function() {
            select();
            select_option();
            $("#btnSend").click(function() {
                inser();
            });


        });

        function Save(ID_breederdad, input_text, out_text) {
            var input_text = document.getElementById(input_text).value;
            var out_text = document.getElementById(out_text).value;

            var jsonObj = {
                "namef": "SaveEdit",
                "ID_breederdad": ID_breederdad,
                "input_text": input_text,
                "out_text": out_text
            }

            $.ajax({
                type: "POST",
                url: "controller/adddad.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    select();
                }
            });
        }

        function select() {
            var jsonObj = {
                "namef": "select_por"
            }

            $.ajax({
                type: "POST",
                url: "controller/adddad.php",
                data: jsonObj,
                dataType: "html",
                success: function(result) {
                    $('#select').html(result);
                }
            });
        }

        function select_option() {
            var jsonObj = {
                "namef": "select_option"
            }

            $.ajax({
                type: "POST",
                url: "controller/adddad.php",
                data: jsonObj,
                dataType: "html",
                success: function(result) {
                    $('#select_option').html(result);
                }
            });
        }

        function inser() {
            var number = document.getElementById("number").value;
            var det = document.getElementById("det").value;
            var age = document.getElementById("age").value;
            var selectA = document.getElementById("selectA").value;
            var mom = document.getElementById("mom").value;
            var datfrom = document.getElementById("datfrom").value;
            var no = document.getElementById("no").value;
            var datbirth = document.getElementById("datbirth").value;
            var datdet = document.getElementById("datdet").value;

            var jsonObj = {
                "namef": "inserpor",
                "number": number,
                "det": det,
                "age": age,
                "selectA": selectA,
                "mom": mom,
                "datfrom": datfrom,
                "no": no,
                "datbirth": datbirth,
                "datdet": datdet
            }

            if (number != "" && number != null) {
                if (det != "" && det != null) {
                    if (age != "" && age != null) {
                        if (selectA != "" && selectA != null) {
                            if (mom != "" && mom != null) {
                                if (datfrom != "" && datfrom != null) {
                                    if (datbirth != "" && datbirth != null) {
                                        if (datdet != "" && datdet != null) {
                                            $.ajax({
                                                type: "POST",
                                                url: "controller/adddad.php",
                                                data: jsonObj,
                                                success: function(result) {
                                                    alert(result.message);
                                                    if (result.status == 1) {
                                                        window.location = 'adddad.php';
                                                    }
                                                }
                                            });
                                        } else {
                                            alert("กรุณาใส่วันที่คัดออก");
                                        }
                                    } else {
                                        alert("กรุณาใส่วันที่เกิด");
                                    }
                                } else {
                                    alert("กรุณาใส่วันที่เข้าฝูง");
                                }
                            } else {
                                alert("กรุณาใส่เบอร์หูแม่ของแม่พันธู์");
                            }
                        } else {
                            alert("กรุณาเลือกสายพันธ์");
                        }
                    } else {
                        alert("กรุณาใส่อายุ");
                    }
                } else {
                    alert("กรุณาใส่เบอร์หูพ่อของพ่อพันธู์");
                }
            } else {
                alert("กรุณาใส่เบอร์หูพ่อพันธู์");
            }
        }

        function edit(check, num) {
            if (check) {
                $(".trigger_popup_fricc").click(function() {
                    $('#TEST' + num).show();
                });
                $('.hover_bkgr_fricc').click(function() {
                    $('#TEST' + num).hide();
                });
                $('.popupCloseButton').click(function() {
                    $('#TEST' + num).hide();
                });
            }

        }

        function dad_delete(ID_breederdad) {
            var jsonObj = {
                "namef": "dad_delete",
                "ID_breederdad": ID_breederdad
            }

            $.ajax({
                type: "POST",
                url: "controller/adddad.php",
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
    <style>
        .hover_bkgr_fricc {
            background: rgba(0, 0, 0, .4);
            cursor: pointer;
            display: none;
            height: 100%;
            position: absolute;
            left: 0px;
            text-align: center;
            top: 0;
            width: 100%;
            z-index: 10000;
        }

        .hover_bkgr_fricc .helper {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        .hover_bkgr_fricc>div {
            background-color: #fff;
            box-shadow: 10px 10px 60px #555;
            display: inline-block;
            height: auto;
            max-width: 551px;
            min-height: 100px;
            vertical-align: middle;
            width: 60%;
            position: relative;
            border-radius: 8px;
            padding: 15px 5%;
        }

        .popupCloseButton {
            background-color: #fff;
            border: 3px solid #999;
            border-radius: 50px;
            cursor: pointer;
            display: inline-block;
            font-family: arial;
            font-weight: bold;
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 25px;
            line-height: 30px;
            width: 30px;
            height: 30px;
            text-align: center;
        }

        .popupCloseButton:hover {
            background-color: #ccc;
        }

        .trigger_popup_fricc {
            cursor: pointer;
            font-size: 20px;
            margin: 20px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
    <?php
    include 'script/script.php';
    ?>