<?php
include 'header/head.php'; 
?>
<title>PIGFARM</title>
<?php
include 'header/barshowac.php';
include 'script/script.php';    
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">ตารางแสดงกิจกรรมสุกรแม่พันธ์ุ</h2>
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
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">ประวัติกิจกรรมสุกร
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body" style="border-radius: 20px">
                            <div class="row">
                                <div class="col-md-12">                 
        
            <div class="col-md-12" >  
             <div class="card">
              <div class="card-body">
               <div id="table" class="table-editable">
                   <form action="showactivity.php" method="post">
                       <select id="breeder_select" class="form-control-static" style="width: 30%" name="breeder_select">
                           <option value="">ทั้งหมด</option>
                           <?PHP
                           $sql = "SELECT No_b FROM breeder";
                            $query = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value=".$row['No_b'].">".$row['No_b']."</option>";
                                }
                           ?>
                       </select>
                       <input type='submit'>
                   </form>
                <table class="table table-hover table-bordered results">
                    <thead>
                 <tr>
                  <th bgcolor="#ffe6ee"  class="col-md-2 col-xs-2"><center>เบอร์หูแม่พันธุ์</center></th>
                  <th bgcolor="#ffe6ee"  class="col-md-2 col-xs-2"><center>วันที่</center></th>
                  <th bgcolor="#ffe6ee"  class="col-md-2 col-xs-2"><center>เหตุการณ์กิจกรรม</center></th>
                  <th bgcolor="#ffe6ee"  class="col-md-2 col-xs-2"><center>แก้ไข/ลบข้อมูล</center></th>

                 </tr>
                 </thead>
                 <tbody>                    
                    <?PHP                    
                    if(isset($_POST['breeder_select'])){
                         $breeder = $_POST['breeder_select'];
                    }else{
                        $breeder = "";
                    }
                    if($breeder != ""){
                        $sql = "SELECT activity_a FROM activity";
                        $query = mysqli_query($conn,$sql);
                        $numrow = mysqli_num_rows($query);
                        $i = 1; 
                        do{
                            $sql = "";
                            if($i == 1){
                                $sql = "SELECT ID_inbreed AS num,breeder_b,date_d,activity_a FROM inbreed WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 2){
                                $sql = "SELECT ID_getmedicin AS num,breeder_b,date_d,activity_a FROM ingetminnisin WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 3){
                                $sql = "SELECT ID_insick AS num,breeder_b,date_d,activity_a FROM insick WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 4){
                                $sql = "SELECT ID_indrug AS num,breeder_b,date_d,activity_a FROM indrug WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 5){
                                $sql = "SELECT ID_inreturn_animal AS num,breeder_b,date_d,activity_a FROM inreturn_animal WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 6){
                                $sql = "SELECT ID_indead AS num,breeder_b,date_d,activity_a FROM indead WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 7){
                                $sql = "SELECT ID_incheck_up AS num,breeder_b,date_d,activity_a FROM incheck_up WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 8){
                                $sql = "SELECT ID_inabortion AS num,breeder_b,date_d,activity_a FROM inabortion WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 9){
                                $sql = "SELECT ID_indeliver AS num,breeder_b,date_d,activity_a FROM indeliver WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 10){
                                $sql = "SELECT ID_deposit_piglet AS num,breeder_b,date_d,activity_a FROM indeposit_piglet WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 11){
                                $sql = "SELECT ID_piglet AS num,breeder_b,date_d,activity_a FROM inpiglet WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 12){
                                $sql = "SELECT ID_wean AS num,breeder_b,date_d,activity_a FROM inwean WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 13){
                                $sql = "SELECT ID_piglet_dies AS num,breeder_b,date_d,activity_a FROM inpiglet_dies WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }else if($i == 14){
                                $sql = "SELECT ID_wind_belly AS num,breeder_b,date_d,activity_a FROM inwind_belly WHERE breeder_b = '".$breeder."' AND Isdelete = 0";
                            }
                            else{
                                $sql = "";
                            }
                            if($sql != ""){ 
                                $query = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($query) > 0){
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr><td class='pt-3-half' contenteditable='true'>".$row['breeder_b']."</td>";
                                        echo "<td class='pt-3-half' contenteditable='true'>".$row['date_d']."</td>";
                                        echo "<td class='pt-3-half' contenteditable='true'>".$row['activity_a']."</td>";           
                                        echo "<td><center><a href ='addsaveac2.php?num=".$row['num']."&activity=".$row['activity_a']."'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></a>"
                                        . "<a href=''><img src='https://img.icons8.com/plasticine/24/000000/search.png'></a>"
                                        . "<a href=''><img src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'></a></center></td></tr>";
                                    }
                                }
                            }
                            $i++;
                        }while ($numrow >= $i);
                    }else{
                        $sql = "SELECT  activity_a FROM activity";
                        $query = mysqli_query($conn,$sql);
                        $numrow = mysqli_num_rows($query);
                        $i = 1;                   
                        do{
                            $sql = "";
                            if($i == 1){
                                $sql = "SELECT ID_inbreed AS num,breeder_b,date_d,activity_a FROM inbreed WHERE Isdelete = 0";
                            }else if($i == 2){
                                $sql = "SELECT ID_getmedicin AS num,breeder_b,date_d,activity_a FROM ingetminnisin WHERE Isdelete = 0";
                            }else if($i == 3){
                                $sql = "SELECT ID_insick AS num,breeder_b,date_d,activity_a FROM insick WHERE Isdelete = 0";
                            }else if($i == 4){
                                $sql = "SELECT ID_indrug AS num,breeder_b,date_d,activity_a FROM indrug WHERE Isdelete = 0";
                            }else if($i == 5){
                                $sql = "SELECT ID_inreturn_animal AS num,breeder_b,date_d,activity_a FROM inreturn_animal WHERE Isdelete = 0";
                            }else if($i == 6){
                                $sql = "SELECT ID_indead AS num,breeder_b,date_d,activity_a FROM indead WHERE Isdelete = 0";
                            }else if($i == 7){
                                $sql = "SELECT ID_incheck_up AS num,breeder_b,date_d,activity_a FROM incheck_up WHERE Isdelete = 0";
                            }else if($i == 8){
                                $sql = "SELECT ID_inabortion AS num,breeder_b,date_d,activity_a FROM inabortion WHERE Isdelete = 0";
                            }else if($i == 9){
                                $sql = "SELECT ID_indeliver AS num,breeder_b,date_d,activity_a FROM indeliver WHERE Isdelete = 0";
                            }else if($i == 10){
                                $sql = "SELECT ID_deposit_piglet AS num,breeder_b,date_d,activity_a FROM indeposit_piglet WHERE Isdelete = 0";
                            }else if($i == 11){
                                $sql = "SELECT ID_piglet AS num,breeder_b,date_d,activity_a FROM inpiglet WHERE Isdelete = 0";
                            }else if($i == 12){
                                $sql = "SELECT ID_wean AS num,breeder_b,date_d,activity_a FROM inwean WHERE Isdelete = 0";
                            }else if($i == 13){
                                $sql = "SELECT ID_piglet_dies AS num,breeder_b,date_d,activity_a FROM inpiglet_dies WHERE Isdelete = 0";
                            }else if($i == 14){
                                $sql = "SELECT ID_wind_belly AS num,breeder_b,date_d,activity_a FROM inwind_belly WHERE Isdelete = 0";
                            }
                            else{
                                $sql = "";
                            }
                            if($sql != ""){
                                $query = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($query) > 0){
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr><td class='pt-3-half' contenteditable='true'>".$row['breeder_b']."</td>";
                                        echo "<td class='pt-3-half' contenteditable='true'>".$row['date_d']."</td>";
                                        echo "<td class='pt-3-half' contenteditable='true'>".$row['activity_a']."</td>";           
                                        echo "<td><center><a href ='addsaveac2.php?num=".$row['num']."&activity=".$row['activity_a']."'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></a>"
                                        . "<a href=''><img src='https://img.icons8.com/plasticine/24/000000/search.png'></a>"
                                        . "<a href=''><img src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'></a></center></td></tr>";
                                    }
                                }
                            }
                            $i++;
                        }while ($numrow >= $i);
                    }                    
                    ?>                                
                  </tbody>
                  </table>
                     </div>
                    </div>
                   </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div></div></div></div></div></div></div></div>


