<?php
include 'header/head.php';
?>
<title>เพื่มผลการตรวจท้อง</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/barcheckbelly.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพื่มผลการตรวจท้อง</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพื่มผลการตรวจท้อง
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="" method="POST" name="bt1" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12" align='center'>
                                                            <div class="col-md-12 form-group" align='center' style="width:100%">
                                                                <label>ผลการตรวจท้อง</label>
                                                                <input class="form-control" type="text" name="checkbelly_c" id="checkbelly_c" style='height:40px; font-size:16px;width: 50%;'>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div align='center'>
                                                            <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="counter pull-right"></span>
                                                <div id="select_checkbelly"></div>                          
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
    select_checkbelly();
    $("#btnSend").click(function() {
        inser_checkbelly();
    });
});

        function select_checkbelly() {
            var jsonObj = {
                "namef": "select_checkbelly"
            }

            $.ajax({
                type: "POST",
                url: "controller/addcheckbelly.php",
                data: jsonObj,
                dataType: "html",
                success: function(result) {
                    $('#select_checkbelly').html(result);
                }
            });
        }    

        function inser_checkbelly(){
            var checkbelly_c = document.getElementById("checkbelly_c").value;
            var jsonObj = {
                "namef": "inser_checkbelly",
                "checkbelly_c": checkbelly_c,
            }
            if(checkbelly_c != "" && checkbelly_c != null){
                $.ajax({
                type: "POST",
                url: "controller/addcheckbelly.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addcheckbelly.php';
                    }
                }
            });
            }else{
                alert("กรุณาใส่ผลการตรวจท้อง");
            }
        }

        function checkbelly_delete(ID_checkbelly) {
            var jsonObj = {
                "namef": "checkbelly_delete",
                "ID_checkbelly": ID_checkbelly
            }

            $.ajax({
                type: "POST",
                url: "controller/addcheckbelly.php",
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