<?php
include 'header/head.php';
?>
<title>PIGFARM</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barstaff.php';
include 'script/script.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-work">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มข้อมูลเจ้าหน้า้ที่</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">ข้อมูลเจ้าหน้าที่
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <div class="col-md-12">
                                                    <form action="" method="POST" name="" style="width: 100%">
                                                        <div class="panel-body" style="border-radius: 20px">
                                                            <div class="col-md-12">
                                                                <div class="col-md-6 form-group">
                                                                    <label>username</label>
                                                                    <input class="form-control input-normal" type="text"  name="user" id="user" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>password</label>
                                                                    <input class="form-control input-normal" type="text"  name="pass" id="pass" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>ชื่อ-สกุล</label>
                                                                    <input class="form-control input-normal" type="text"  name="name_n" id="name_n" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>ชื่อเล่น</label>
                                                                    <input class="form-control" type="text"  name="lastname_l" id="lastname_l" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>เลขบัตรประชาชน</label>
                                                                    <input class="form-control" type="text" maxlength="13" minlength="13" name="idcard" id="idcard" style='height: 40px; width: 100%;font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>วันเกิด</label>
                                                                    <input class="form-control" type="date" name="birthday_b" id="birthday_b" style='height:40px; width: 76%; font-size:16px;padding: 0px 60px;'>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label>ที่อยู่</label>
                                                                    <input class="form-control" type="text"  name="house_no" id="house_no" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>รหัสไปรษณีย</label>
                                                                    <input class="form-control" type="text" maxlength="6" minlength="6"  name="postal_code" id="postal_code" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>อีเมล</label>
                                                                    <input class="form-control" type="text"  name="email_e" id="email_e" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label>เลขประกอบวิชาชีพ</label>
                                                                    <input class="form-control" type="text"  name="professional_number" id="professional_number" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div class="col-md-6 form-group" id="select_option">
                                                                    
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label>เบอร์โทร</label>
                                                                    <input class="form-control" type="text" maxlength="10" minlength="10"  name="tel_t" id="tel_t" style='height:40px; font-size:16px;'>
                                                                </div>
                                                                <div align="center">
                                                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <br>
                                                <br>
                                                <span class="counter pull-right"></span>
                                                <div id="select"></div>
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
            select();
            select_option();
            $("#btnSend").click(function() {
                inser_staff();
            });


        });

    function select() {
        var jsonObj = {
            "namef": "select_staff"
        }

        $.ajax({
            type: "POST",
            url: "controller/addstaff.php",
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
                url: "controller/addstaff.php",
                data: jsonObj,
                dataType: "html",
                success: function(result) {
                    $('#select_option').html(result);
                }
            });        
    }    

    function inser_staff(){
            var user = document.getElementById("user").value;
            var pass= document.getElementById("pass").value;
            var name_n = document.getElementById("name_n").value;
            var lastname_l = document.getElementById("lastname_l").value;
            var idcard = document.getElementById("idcard").value;
            var house_no = document.getElementById("house_no").value;
            var postal_code = document.getElementById("postal_code").value;
            var email_e = document.getElementById("email_e").value;
            var birthday_b = document.getElementById("birthday_b").value;
            var professional_number = document.getElementById("professional_number").value;
            var selectA = document.getElementById("selectA").value;
            var tel_t = document.getElementById("tel_t").value;

            var jsonObj = {
                "namef": "inser_staff",
                "user": user,
                "pass": pass,
                "name_n": name_n,
                "lastname_l": lastname_l,
                "idcard": idcard,
                "house_no": house_no,
                "postal_code": postal_code,
                "email_e": email_e,
                "birthday_b": birthday_b,
                "professional_number": professional_number,
                "selectA": selectA,
                "tel_t": tel_t
            }
            if (user != "" && user != null) {
                if (pass != "" && pass != null) {
                    if (name_n != "" && name_n != null) {
                        if (idcard != "" && idcard != null) {
                            if (house_no != "" && house_no != null) {
                                if (email_e != "" && email_e != null) {
                                    if (birthday_b != "" && birthday_b != null) {
                                        if (professional_number != "" && professional_number != null) {
                                            if (selectA != "" && selectA != null) {
                                                if (tel_t != "" && tel_t != null) {
                                                    $.ajax({
                                                    type: "POST",
                                                    url: "controller/addstaff.php",
                                                    data: jsonObj,
                                                    success: function(result) {
                                                        alert(result.message);
                                                        if (result.status == 1) {
                                                            window.location = 'addstaff.php';
                                                        }
                                                    }
                                                    });
                                                } else {
                                                    alert("กรุณาใส่เบอร์โทร");
                                                }
                                            } else {
                                                alert("กรุณาเลือกหน้าที่");
                                            }
                                        } else {
                                            alert("กรุณาใส่เลขประกอบวิชาชีพ");
                                        }
                                    } else {
                                        alert("กรุณาใส่วันเกิด");
                                    }
                                } else {
                                    alert("กรุณาใส่อีเมล");
                                }
                            } else {
                                alert("กรุณาใส่ที่อยู่");
                            }
                        } else {
                        alert("กรุณาใส่เลขบัตรประชาชน");
                    }
                } else {
                    alert("กรุณาใส่ชื่อ-สกุล");
                }
            } else {
                alert("กรุณาใส่password");
            }
        } else {
                alert("กรุณาใส่username");
            }    
    }

    function login_delete(ID_login) {
            var jsonObj = {
                "namef": "login_delete",
                "ID_login": ID_login
            }

            $.ajax({
                type: "POST",
                url: "controller/addstaff.php",
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