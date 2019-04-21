<?php
include 'header/head.php';
?>
<title>เพิ่มหน่วยนับขนาดการใช้ยา</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barmunitdrug.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
  <div class="colorlib-services">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
          <h2 class="colorlib-heading">เพิ่มหน่วยนับขนาดการใช้ยา</h2>
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
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพิ่มหน่วยนับขนาดการใช้ยา
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
                                    <input class="form-control" type="text" name="ID_munitdrug" id="ID_munitdrug" style='height:40px; font-size:16px;width: 100%;'>
                                  </div>
                                  <div class="col-md-6 form-group">
                                    <label>ชื่อหน่วยนับขนาดการใช้ยา</label>
                                    <input class="form-control" type="text" name="munitdrug_m" id="munitdrug_m" style='height:40px; font-size:16px;width: 100%;'>
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
                        <div id="select_munitdrug"></div>
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
<script type="text/javascript">
  $(document).ready(function() {
    select_munitdrug();
    $("#btnSend").click(function() {
      inser_munitdrug();
    });
  });

  function select_munitdrug() {
    var jsonObj = {
      "namef": "select_munitdrug"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmunitdrug.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_munitdrug').html(result);
      }
    });
  }

  function inser_munitdrug() {
    var ID_munitdrug = document.getElementById("ID_munitdrug").value;
    var munitdrug_m = document.getElementById("munitdrug_m").value;

    var jsonObj = {
      "namef": "inser_munitdrug",
      "ID_munitdrug": ID_munitdrug,
      "munitdrug_m": munitdrug_m,
    }
    if (munitdrug_m != "" && munitdrug_m != null) {
      $.ajax({
        type: "POST",
        url: "controller/addmunitdrug.php",
        data: jsonObj,
        success: function(result) {
          alert(result.message);
          if (result.status == 1) {
            window.location = 'addmunitdrug.php';
          }
        }
      });
    } else {
      alert("กรุณาใส่ ชื่อหน่วยนับ [ขนาดการใช้ยา]");
    }
  }

  function munitdrug_delete(ID_munitdrug) {
    var jsonObj = {
      "namef": "munitdrug_delete",
      "ID_munitdrug": ID_munitdrug
    }

    $.ajax({
      type: "POST",
      url: "controller/addmunitdrug.php",
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