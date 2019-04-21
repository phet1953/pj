<?php
include 'header/head.php';
?>
<title>เพื่มอาการป่วย</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/baraddsick.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพื่มอาการป่วย</h2>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพื่มอาการป่วย
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="" method="POST" name="bt1" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12 form-group" align="center">
                                                                <label>ชื่ออาการป่วย</label>
                                                                <input class="form-control" type="text" name="sick_s" id="sick_s" style='height:40px; font-size:16px;width: 50%;'>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <br><br><br>
                                                        <div align='center'>
                                                            <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="counter pull-right"></span>
                                                <div id="select_sick"></div>
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
    select_sick();
    $("#btnSend").click(function() {
        inser_sick();
    });
});

        function select_sick() {
            var jsonObj = {
                "namef": "select_sick"
            }

            $.ajax({
                type: "POST",
                url: "controller/addsick.php",
                data: jsonObj,
                dataType: "html",
                success: function(result) {
                    $('#select_sick').html(result);
                }
            });
        }    

        function inser_sick(){
            var sick_s = document.getElementById("sick_s").value;
            var jsonObj = {
                "namef": "inser_sick",
                "sick_s": sick_s,
            }
            if(sick_s != "" && sick_s != null){
                $.ajax({
                type: "POST",
                url: "controller/addsick.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addsick.php';
                    }
                }
            });
            }else{
                alert("กรุณาใส่อาการป่วย");
            }
        }

        function sick_delete(ID_sick) {
            var jsonObj = {
                "namef": "sick_delete",
                "ID_sick": ID_sick
            }

            $.ajax({
                type: "POST",
                url: "controller/addsick.php",
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