<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลแม่พันธ์ุ</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditpigmom.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพิ่มข้อมูลแม่พันธ์ุ</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลแม่พันธ์ุ
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="" method="POST" name="bt1" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูแม่พันธู์พันธู์</label>
                                                                <input class="form-control" name="number" id="number" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูแม่ของพ่อพันธู์</label>
                                                                <input class="form-control" name="det" id="det" type="text" style='height:40px; font-size:16px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>วันที่เกิด</label>
                                                                <input type="date" class="form-control" name="datbirth" id="datbirth" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                                            </div>
                                                            <div class="col-md-4 form-group" id="select_option" align="center">

                                                            </div>
                                                            <div class="col-md-4 form-group" align="center">
                                                                <label>เบอร์หูแม่ของแม่พันธู์</label>
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

        function select() {
            var jsonObj = {
                "namef": "select_mom"
            }

            $.ajax({
                type: "POST",
                url: "controller/addmom.php",
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
                url: "controller/addmom.php",
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
            var datbirth = document.getElementById("datbirth").value;
            var selectA = document.getElementById("selectA").value;
            var mom = document.getElementById("mom").value;
            var datfrom = document.getElementById("datfrom").value;
            var no = document.getElementById("no").value;

            var jsonObj = {
                "namef": "insermom",
                "number": number,
                "det": det,
                "datbirth": datbirth,
                "selectA": selectA,
                "mom": mom,
                "datfrom": datfrom,
                "no": no
            }

            if (number != "" && number != null) {
                if (det != "" && det != null) {
                    if (datbirth != "" && datbirth != null) {
                        if (selectA != "" && selectA != null) {
                            if (mom != "" && mom != null) {
                                if (datfrom != "" && datfrom != null) {
                                    $.ajax({
                                        type: "POST",
                                        url: "controller/addmom.php",
                                        data: jsonObj,
                                        success: function(result) {
                                            alert(result.message);
                                            if (result.status == 1) {
                                                window.location = 'addmom.php';
                                            }
                                        }
                                    });
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
                        alert("กรุณาใส่วันเกิด");
                    }
                } else {
                    alert("กรุณาใส่เบอร์หูพ่อของพ่อพันธู์");
                }
            } else {
                alert("กรุณาใส่เบอร์หูพ่อพันธู์");
            }
        }

        function edit(ID_breederdad) {
            var txt = "myModal" + ID_breeder;
            var modal = document.getElementById(txt);

            var btn = document.getElementById("edit" + ID_breeder);

            btn.onclick = function() {
                modal.style.display = "block";
            }

            /*var jsonObj = {"namef":"dad_updete","ID_breederdad":ID_breederdad}

                $.ajax({
                    type: "POST",
                    url: "controller/adddad.php",
                    data: jsonObj,
                    success: function(result) {
                    alert(result.message);		
                    if(result.status == 1){
                        $("#" + result.num).hide();
                    }
                }
            });*/

        }

        function mom_delete(ID_breeder) {
            var jsonObj = {
                "namef": "mom_delete",
                "ID_breeder": ID_breeder
            }

            $.ajax({
                type: "POST",
                url: "controller/addmom.php",
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

    <?php
    include 'script/script.php';
    ?>