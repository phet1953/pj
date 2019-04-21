<?php
include 'header/head.php';
?>
<title>PIGFARM</title>
<script src="js/jquery-1.11.2.min.js"></script>
<?php
include 'header/bareditfarm.php';
include 'script/script.php';
?>

<div id="colorlib-main">
    <div class="colorlib-work">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มข้อมูลทั้งหมดของฟาร์ม</h2>
                </div>
            </div>
<div class="row row-bottom-padded-md">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft" >
                    <div class="colorlib-icon" style="border-radius: 20px">
                        <i class="flaticon-worker"></i>
                    </div>
                    <div class="colorlib-text">
                        <div class="panel panel-default" >
                            <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลทั้งหมดของฟาร์ม
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" >
                                <div class="panel-body" style="border-radius: 20px">
                                    <form action="" method="POST" name="bt1" style="width: 100%">
                                        <div class="panel-body" style="border-radius: 20px"> 
                                            <div class="col-md-12">
                                                <div class="col-md-12 form-group" align="center">
                                                    <label>ชื่อฟาร์ม</label>
                                                    <input class="form-control" type="text" name="far" id="far_f" style='height:40px; font-size:16px; width: 35%;'>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ชื่อเจ้าของฟาร์ม</label>
                                                        <input  class="form-control" type="text" name="farmown" id="farmown_f" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>เบอร์โทรศัพท์(เจ้าของ)</label>
                                                        <input class="form-control" type="text" name="mowntel" id="mowntel_m" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ชื่อผู้จัดการฟาร์ม</label>
                                                        <input class="form-control" type="text" name="farfarm" id="farfarm_f" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>เบอร์โทรศัพท์(ผู้จัดการ)</label>
                                                        <input class="form-control" type="text" name="telfarm" id="telfarm_t" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ที่อยู่ฟาร์ม</label>
                                                        <input class="form-control" type="text" name="farmaddress" id="farmaddress_f" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>เบอร์โทรศัพท์(ฟาร์ม)</label>
                                                        <input class="form-control" type="text" name="farmtel" id="farmtel_f" style='height:40px; font-size:16px;'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่</label>
                                                    <input type="date" class="form-control" name="warrantdate" id="warrantdate_w" style='height:40px; font-size:16px;padding: 0px 60px;'>                                                                     
                                                </div>
                                            </div>
                                            <br><br>
                                            <div align="center">
                                                <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button"  value="Submit">
                                            </div>
                                            </div>
                                            </form>
                                            <span class="counter pull-right"></span>
                                            <div id="select"></div>
                                         </div></div></div></div></div></div></div></div></div></div></div></div>
 <script type="text/javascript">
		$(document).ready(function() {
            select();
            $("#btnSend").click(function() {
                inser();
            });

            
        });

// function check1()
// 	{
// 		var elem = document.getElementById('test_txt').value;
// 		if(!elem.match(/^([a-z])+$/i))
// 		{
// 			alert("กรอกได้เฉพาะตัวเลขและตัวอักษรภาษาอังกฤษเท่านั้น");
// 			document.getElementById('test_txt').value = "";
// 		}
// }
// function check2()
// 	{
// 		var elem = document.getElementById('test_txt').value;
// 		if(!elem.match(/^([0-9])+$/i))
// 		{
// 			alert("กรอกได้เฉพาะตัวเลขและตัวอักษรภาษาอังกฤษเท่านั้น");
// 			document.getElementById('test_txt').value = "";
// 		}
// }
        
function select(){
    var jsonObj = {"namef":"select_far"}

    $.ajax({
		type: "POST",
		url: "controller/addfarm.php",
		data: jsonObj,
		dataType: "html",
		success: function(result) {	
			$('#select').html(result);		
		}
	});
}

function inser(){
    var far_f = document.getElementById("far_f").value;
    var farmown_f = document.getElementById("farmown_f").value;
    var mowntel_m = document.getElementById("mowntel_m").value;
    var farfarm_f = document.getElementById("farfarm_f").value;
    var telfarm_t = document.getElementById("telfarm_t").value;
    var farmaddress_f = document.getElementById("farmaddress_f").value;
    var farmtel_f = document.getElementById("farmtel_f").value;
    var warrantdate_w = document.getElementById("warrantdate_w").value;

    var jsonObj = {"namef":"inser_far","far_f":far_f,"farmown_f":farmown_f,"mowntel_m":mowntel_m,"farfarm_f":farfarm_f,"telfarm_t":telfarm_t,"farmaddress_f":farmaddress_f,"farmtel_f":farmtel_f,"warrantdate_w":warrantdate_w}
    if(far_f != "" && far_f != null){
        if(farmown_f != "" && farmown_f != null){
            if(mowntel_m != "" && mowntel_m != null){
                if(farfarm_f != "" && farfarm_f != null){
                    if(telfarm_t != "" && telfarm_t != null){
                        if(farmaddress_f != "" && farmaddress_f != null){
                            if(warrantdate_w != "" && warrantdate_w != null){
                                $.ajax({
                                    type: "POST",
                                    url: "controller/addfarm.php",
                                    data: jsonObj,
                                    success: function(result) {	
                                        alert(result.message);
                                        if(result.status == 1){
                                            window.location='addfarm.php';
                                        }
                                    }
                                });
                            }else{
                            alert("กรุณาใส่รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่");
                            }
                        }else{
                        alert("กรุณาใส่ที่อยู่ฟาร์ม");
                        }
                    }else{
                    alert("กรุณาใส่เบอร์โทรศัพท์(ผู้จัดการ)");
                    }
                }else{
                alert("กรุณาใส้่ชื่อผู้จัดการฟาร์ม");
                }
            }else{
            alert("กรุณาใส่เบอร์โทรศัพท์(เจ้าของ)");
            }
        }else{
        alert("กรุณาใส่ชื่อเจ้าของฟาร์ม");
        }
    }else{
        alert("กรุณาใส่ชื่อฟาร์ม");
    }
    
}
function delete_far(ID_farm){
    var jsonObj = {"namef":"delete_far","ID_farm":ID_farm}

    $.ajax({
		type: "POST",
		url: "controller/addfarm.php",
		data: jsonObj,
		success: function(result) {
            alert(result.message);		
            if(result.status == 1){
                $("#" + result.num).hide();
            }
		}
	});
}
</script>

<?php
include 'script/script.php';
?>




