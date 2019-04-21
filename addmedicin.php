<?php
include 'header/head.php';
?>
<title>ข้อมูลการเพิ่มยาในฟาร์ม</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditmedicin.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
  <div class="colorlib-services">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
          <h2 class="colorlib-heading">ข้อมูลการเพิ่มยาในฟาร์ม</h2>
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
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+ข้อมูลการเพิ่มยาในฟาร์ม
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body" style="border-radius: 20px">
                        <form action="" method="POST" name="" style="width: 100%">
                          <div class="panel-body" style="border-radius: 20px">
                            <div class="col-md-12">
                              <div class="col-md-6 form-group">
                                <label>รหัสยา</label>
                                <input class="form-control" type="text" name="ID_medicin" id="ID_medicin" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-6 form-group" id="select_option1">

                              </div>
                              <div class="col-md-6 form-group">
                                <label>ชื่อยา</label>
                                <input class="form-control" type="text" name="medicin_m" id="medicin_m" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-6 form-group" id="select_option2">

                              </div>
                              <div class="col-md-6 form-group">
                                <label>ชื่อสารออกฤทธิ์</label>
                                <input class="form-control" type="text" name="act_a" id="act_a" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-4 form-group" id="select_option3">

                              </div>
                              <div class="col-md-2 form-group">
                                <label>% ของยา</label>
                                <input class="form-control" type="text" name="percent_p" id="percent_p" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-6 form-group">
                                <label>เลขทะเบียนยา</label>
                                <input class="form-control" type="text" name="registration_r" id="registration_r" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-6 form-group">
                                <label>ระยะหยุดยา(วัน)</label>
                                <input class="form-control" type="text" name="stop_s" id="stop_s" style='height:40px; font-size:16px;width: 100%;'>
                              </div>
                              <div class="col-md-6 form-group" id="select_option4">

                              </div>
                              <div class="col-md-6 form-group">
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
                        <div id="select_medicin"></div>
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
    select_option1();
    select_option2();
    select_option3();
    select_option4();
    select_medicin();
    $("#btnSend").click(function() {
      inser_medicin();
    });
  });

  function select_option1() {
    var jsonObj = {
      "namef": "select_option1"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option1').html(result);
      }
    });
  }

  function select_option2() {
    var jsonObj = {
      "namef": "select_option2"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option2').html(result);
      }
    });
  }

  function select_option3() {
    var jsonObj = {
      "namef": "select_option3"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option3').html(result);
      }
    });
  }

  function select_option4() {
    var jsonObj = {
      "namef": "select_option4"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option4').html(result);
      }
    });
  }

  function select_medicin() {
    var jsonObj = {
      "namef": "select_medicin"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_medicin').html(result);
      }
    });
  }

  function inser_medicin() {
    var ID_medicin = document.getElementById("ID_medicin").value;
    var selectA = document.getElementById("selectA").value;
    var medicin_m = document.getElementById("medicin_m").value;
    var selectB = document.getElementById("selectB").value;
    var act_a = document.getElementById("act_a").value;
    var selectC = document.getElementById("selectC").value;
    var percent_p = document.getElementById("percent_p").value;
    var registration_r = document.getElementById("registration_r").value;
    var stop_s = document.getElementById("stop_s").value;
    var selectD = document.getElementById("selectD").value;
    var use_u = document.getElementById("use_u").value;

    var jsonObj = {
      "namef": "inser_medicin",
      "ID_medicin": ID_medicin,
      "selectA": selectA,
      "medicin_m": medicin_m,
      "selectB": selectB,
      "act_a": act_a,
      "selectC": selectC,
      "percent_p": percent_p,
      "registration_r": registration_r,
      "stop_s": stop_s,
      "selectD": selectD,
      "use_u": use_u,
    }
    if (selectA != "" && selectA != null) {
      if (medicin_m != "" && medicin_m != null) {
        if (selectB != "" && selectB != null) {
          if (act_a != "" && act_a != null) {
            if (selectC != "" && selectC != null) {
              if (percent_p != "" && percent_p != null) {
                if (registration_r != "" && registration_r != null) {
                  if (stop_s != "" && stop_s != null) {
                    if (selectD != "" && selectD != null) {
                      $.ajax({
                        type: "POST",
                        url: "controller/addmedicin.php",
                        data: jsonObj,
                        success: function(result) {
                          alert(result.message);
                          if (result.status == 1) {
                            window.location = 'addmedicin.php';
                          }
                        }
                      });
                    } else {
                      alert("กรุณาใส่ชื่อบริษัท");
                    }
                  } else {
                    alert("กรุณาใส่ระยะหยุดยา(วัน)");
                  }
                } else {
                  alert("กรุณาใส่เลขทะเบียนยา");
                }
              } else {
                alert("กรุณาใส่ % ของยา");
              }
            } else {
              alert("กรุณาใส่วิธีการให้ยา");
            }
          } else {
            alert("กรุณาใส่ชื่อสารออกฤทธิ์");
          }
        } else {
          alert("กรุณาใส่ขนาดการใช้ยา");
        }
      } else {
        alert("กรุณาใส่ชื่อยา");
      }
    } else {
      alert("กรุณาใส่ขนาดยา");
    }
  }
 
  function medicin_delete(ID_medicin) {
    var jsonObj = {
      "namef": "medicin_delete",
      "ID_medicin": ID_medicin
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
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