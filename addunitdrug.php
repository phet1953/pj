<?php
include 'header/head.php';
?>
<title>เพิ่มหน่วยนับขนาดยา</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barunitdrug.php';
?>
<div id="colorlib-main">
  <div class="colorlib-services">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

          <h2 class="colorlib-heading">เพิ่มหน่วยนับขนาดยา</h2>
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
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพิ่มหน่วยนับขนาดยา
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
                                    <input class="form-control" type="text" name="ID_unitdrug" id="ID_unitdrug" style='height:40px; font-size:16px;width: 100%;'>
                                  </div>
                                  <div class="col-md-6 form-group">
                                    <label>ชื่อหน่วยนับขนาดยา</label>
                                    <input class="form-control" type="text" name="unitdrug_u" id="unitdrug_u" style='height:40px; font-size:16px;width: 100%;'>
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
                        <div id="select_unitdrug"></div>
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
    select_unitdrug();
    $("#btnSend").click(function() {
      inser_unitdrug();
    });
  });

  function select_unitdrug() {
    var jsonObj = {
      "namef": "select_unitdrug"
    }

    $.ajax({
      type: "POST",
      url: "controller/addunitdrug.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_unitdrug').html(result);
      }
    });
  }

  function inser_unitdrug() {
    var ID_unitdrug = document.getElementById("ID_unitdrug").value;
    var unitdrug_u = document.getElementById("unitdrug_u").value;

    var jsonObj = {
      "namef": "inser_unitdrug",
      "ID_unitdrug": ID_unitdrug,
      "unitdrug_u": unitdrug_u,
    }
    if (unitdrug_u != "" && unitdrug_u != null) {
      $.ajax({
        type: "POST",
        url: "controller/addunitdrug.php",
        data: jsonObj,
        success: function(result) {
          alert(result.message);
          if (result.status == 1) {
            window.location = 'addunitdrug.php';
          }
        }
      });
    } else {
      alert("กรุณาใส่ หน่วยนับ [ขนาดยา]");
    }
  }

  function unitdrug_delete(ID_unitdrug) {
    var jsonObj = {
      "namef": "unitdrug_delete",
      "ID_unitdrug": ID_unitdrug
    }

    $.ajax({
      type: "POST",
      url: "controller/addunitdrug.php",
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