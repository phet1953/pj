<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลกิจกรรม</title>
<?php
include 'header/barsaveac.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-work">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="colorlib-heading">เพิ่มข้อมูลกิจกรรม</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="colorlib-text">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+บันทึกข้อมูลกิจกรรม
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body" style="border-radius: 20px">
                                            <div class="col-md-3">
                                                <form action="Insert/Insertsaveac1.php" method="post">
                                                    <div class="content">
                                                        <!--##########  ----------------  เบอร์หู -------          ################-->
                                                        <div class="form-group">
                                                            <div class="form-select js-form-select">
                                                                <label class="form-select__label">เบอร์หูของแม่พันธุ์หมู </label>
                                                                <select class="form-select__select" name="breeder" style="border-radius: 4px">
                                                                    <option selected disabled>เลือกเบอร์หู:</option>
                                                                    <?PHP
                                                                    $sql = "SELECT No_b FROM breeder";
                                                                    $query = mysqli_query($conn, $sql);
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  วันที่บันทึก -------          ################-->
                                                        <div class="form-group">
                                                            <div class="form-select js-form-select">
                                                                <label class="form-select__label">วันที่บันทึก </label>
                                                                <input type="date" name="date" required style="border-radius: 4px">
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  เหตุการณ์กิจกรรม -------          ################-->
                                                        <div class="form-group">
                                                            <div class="form-select js-form-select">
                                                                <label class="form-select__label">เหตุการณ์กิจกรรม </label>
                                                                <select id="even" name="activity" required style="border-radius: 4px">
                                                                    <option value="">เลือกกิจกรรม :</option>
                                                                    <?PHP
                                                                    $sql = "SELECT activity_a FROM activity";
                                                                    $query = mysqli_query($conn, $sql);
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        echo "<option value=" . $row['activity_a'] . ">" . $row['activity_a'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ผสม -------          ################-->
                                                        <div id="ผสม" style="display:none">
                                                            <label>เบอร์พ่อ :</label>
                                                            <select id="number_fa" name="breederdad">
                                                                <option value="">เลือกเบอร์พ่อ</option>
                                                                <?PHP
                                                                $sql = "SELECT No_b FROM breederdad";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                        </div>
                                                        <!--##########  ----------------  ได้รับยา -------          ################-->
                                                        <div id="ได้รับยา" style="display:none">
                                                            <label>ชื่อยา :</label>
                                                            <select id="ya" name="medicin">
                                                                <option value="">เลือกชื่อยา</option>
                                                                <?PHP
                                                                $sql = "SELECT medicin_m FROM medicin";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['medicin_m'] . ">" . $row['medicin_m'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                            <div>
                                                                <label>ปริมาณ :</label>
                                                                <input class="form-group" type="text" name="volume">
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ป่วย -------          ################-->
                                                        <div id="ป่วย" style="display:none">
                                                            <label>อาการป่วย :</label>
                                                            <select id="ya" name="sick">
                                                                <option value="">เลือกอาการป่วย</option>
                                                                <?PHP
                                                                $sql = "SELECT sick_s FROM sick";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['sick_s'] . ">" . $row['sick_s'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                            <div>
                                                                <label>หมายเหตุ :</label>
                                                                <input class="form-group" type="text" name="sickk">
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ทำวัคซีน -------          ################-->
                                                        <div id="ทำวัคซีน" style="display:none">
                                                            <label>ชื่อวัคซีน :</label>
                                                            <select id="ya" name="drug">
                                                                <option value="">เลือกชื่อวัคซีน</option>
                                                                <?PHP
                                                                $sql = "SELECT drug_d FROM drug";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['drug_d'] . ">" . $row['drug_d'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                        </div>
                                                        <!--##########  ----------------  กลับสัด -------          ################-->
                                                        <div id="กลับสัด" style="display:none">
                                                            <div>
                                                                <label>หมายเหตุ :</label>
                                                                <input class="form-group" type="text" name="return">
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ตาย -------          ################-->
                                                        <div id="ตาย" style="display:none">
                                                            <div>
                                                                <label>หมายเหตุ :</label>
                                                                <input class="form-group" type="text" name="dead">
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ตรวจท้อง -------          ################-->
                                                        <div id="ตรวจท้อง" style="display:none">
                                                            <label>ผล :</label>
                                                            <select id="ya" name="results">
                                                                <option value="">เลือกผลการตรวจ</option>
                                                                <?PHP
                                                                $sql = "SELECT checkbelly_c FROM checkbelly";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['checkbelly_c'] . ">" . $row['checkbelly_c'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                            <div>
                                                                <label>กำหนดคลอด :</label>
                                                                <input class="form-group" type="text" name="define">
                                                            </div><br>
                                                        </div>
                                                        <!--##########  ----------------  แท้ง -------          ################-->
                                                        <div id="แท้ง" style="display:none">
                                                            <div>
                                                                <label>ข้อความ :</label>
                                                                <input class="form-group" type="text" name="text">
                                                            </div>
                                                            <div>
                                                                <label>อายุที่แท้ง :</label>
                                                                <input class="form-group" type="text" name="abortion">
                                                            </div><br>
                                                        </div>
                                                        <!--##########  ----------------  คลอด -------          ################-->
                                                        <div id="คลอด" style="display:none">
                                                            <div>
                                                                <label>ลูกทั้งหมด :</label>
                                                                <input class="form-group" type="text" name="allpigs">
                                                            </div>
                                                            <div>
                                                                <label>ลูกมีชีวิต :</label>
                                                                <input class="form-group" type="text" name="piglet_alive">
                                                            </div>
                                                            <div>
                                                                <label>ตายแรกคลอด :</label>
                                                                <input class="form-group" type="text" name="dead_pig_birth">
                                                            </div>
                                                            <div>
                                                                <label>ลูกกรอก :</label>
                                                                <input class="form-group" type="text" name="eooukornou">
                                                            </div>
                                                            <div>
                                                                <label>นน.ครอก :</label>
                                                                <input class="form-group" type="text" name="pork_litter">
                                                            </div>
                                                            <div>
                                                                <label>เฉลี่ย นน.ลูกสุกร :</label>
                                                                <input class="form-group" type="text" name="average_piglets">
                                                            </div><br>
                                                        </div>
                                                        <!--##########  ----------------  ฝากเลี้ยง -------          ################-->
                                                        <div id="ฝากเลี้ยง" style="display:none">
                                                            <div>
                                                                <label>จำนวน :</label>
                                                                <input class="form-group" type="text" name="number_n">
                                                            </div>
                                                            <label>เบอร์แม่ที่ฝาก :</label>
                                                            <select id="ya" name="breder_b">
                                                                <option value="">เลือกเบอร์แม่ที่ฝาก</option>
                                                                <?PHP
                                                                $sql = "SELECT No_b FROM breeder";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <!--##########  ----------------  รับเลี้ยง -------          ################-->
                                                        <div id="รับเลี้ยง" style="display:none">
                                                            <div>
                                                                <label>จำนวน :</label>
                                                                <input class="form-group" type="text" name="number_n">
                                                            </div>
                                                            <label>เบอร์แม่ที่ฝาก :</label>
                                                            <select id="ya" name="breder_b">
                                                                <option value="">เลือกเบอร์แม่ที่ฝาก</option>
                                                                <?PHP
                                                                $sql = "SELECT No_b FROM breeder";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <!--##########  ----------------  หย่านม -------          ################-->
                                                        <div id="หย่านม" style="display:none">
                                                            <div>
                                                                <label>จำนวน :</label>
                                                                <input class="form-group" type="text" name="number_n">
                                                            </div>
                                                            <div>
                                                                <label>นน.ครอก :</label>
                                                                <input class="form-group" type="text" name="pork_litter">
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ลูกหมูตาย -------          ################-->
                                                        <div id="ลูกหมูตาย" style="display:none">
                                                            <div>
                                                                <label>จำนวน :</label>
                                                                <input class="form-group" type="text" name="number_n">
                                                            </div>
                                                            <label>สาเหตุ:</label>
                                                            <select id="ya" name="cause_c">
                                                                <option value="">สาเหตุการตาย</option>
                                                                <?PHP
                                                                $sql = "SELECT resdie_r FROM resdie";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=" . $row['resdie_r'] . ">" . $row['resdie_r'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <div>
                                                                <label>หมายเหตุ :</label>
                                                                <input class="form-group" type="text" name="note_n">
                                                            </div>
                                                        </div>
                                                        <!--##########  ----------------  ท้องลม -------          ################-->
                                                        <div id="ท้องลม" style="display:none">
                                                            <label>ข้อความ :</label>
                                                            <input class="form-group" type="text" name="text_t">
                                                            <br>
                                                        </div>
                                                        <!--##########  ----------------  button -------          ################-->
                                                        <div class="form-group">
                                                            <button class="btn btn-primary btn-send-message" type="submit" value="Submit" style="border-radius: 10px">ยืนยัน</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--##########  ----------------  javascript -------          ################-->
                                                <script language="javascript">
                                                    $("#even").change(function() {
                                                        var viewID = $("#even option:selected").val();
                                                        $("#even option").each(function() {
                                                            var hideID = $(this).val();
                                                            $("#" + hideID).hide();
                                                            $("#ya").val('');
                                                            $("#pari").val('');
                                                            $("#number_fa").val('');
                                                        });
                                                        $("#" + viewID).show();
                                                    });
                                                </script>
                                            </div>
                                            <!--##########  ----------------  สิ้นสุดส่วนกรอกข้อมูล -------          ################-->
                                            <div class="col-md-9">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="table" class="table-editable">
                                                            <div id="select_saveac"></div>
                                                            <table class="table table-hover table-bordered results">
                                                                <thead>
                                                                    <tr>
                                                                        <th bgcolor="#ffe6ee" class="col-md-2 col-xs-2">
                                                                            <center>เบอร์หูแม่พันธุ์</center>
                                                                        </th>
                                                                        <th bgcolor="#ffe6ee" class="col-md-2 col-xs-2">
                                                                            <center>วันที่</center>
                                                                        </th>
                                                                        <th bgcolor="#ffe6ee" class="col-md-2 col-xs-2">
                                                                            <center>เหตุการณ์กิจกรรม</center>
                                                                        </th>
                                                                        <th bgcolor="#ffe6ee" class="col-md-2 col-xs-2">
                                                                            <center>หมายเหตุ</center>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?PHP
                                                                    $sql = "SELECT activity_a FROM activity";
                                                                    $query = mysqli_query($conn, $sql);
                                                                    $numrow = mysqli_num_rows($query);
                                                                    $i = 1;
                                                                    do {
                                                                        $sql = "";
                                                                        if ($i == 1) {
                                                                            $sql = "SELECT ID_inbreed AS num,breeder_b,date_d,activity_a,breederdad_d FROM inbreed WHERE Isdelete = 0";
                                                                        } else if ($i == 2) {
                                                                            $sql = "SELECT ID_getmedicin AS num,breeder_b,date_d,activity_a,medicin_m,volume_v FROM ingetminnisin WHERE Isdelete = 0";
                                                                        } else if ($i == 3) {
                                                                            $sql = "SELECT ID_insick AS num,breeder_b,date_d,activity_a,sick_s,note_n FROM insick WHERE Isdelete = 0";
                                                                        } else if ($i == 4) {
                                                                            $sql = "SELECT ID_indrug AS num,breeder_b,date_d,activity_a,drug_d FROM indrug WHERE Isdelete = 0";
                                                                        } else if ($i == 5) {
                                                                            $sql = "SELECT ID_inreturn_animal AS num,breeder_b,date_d,activity_a,note_n FROM inreturn_animal WHERE Isdelete = 0";
                                                                        } else if ($i == 6) {
                                                                            $sql = "SELECT ID_indead AS num,breeder_b,date_d,activity_a,note_n FROM indead WHERE Isdelete = 0";
                                                                        } else if ($i == 7) {
                                                                            $sql = "SELECT ID_incheck_up AS num,breeder_b,date_d,activity_a,results_r,define_d FROM incheck_up WHERE Isdelete = 0";
                                                                        } else if ($i == 8) {
                                                                            $sql = "SELECT ID_inabortion AS num,breeder_b,date_d,activity_a,text_t,abortion_a FROM inabortion WHERE Isdelete = 0";
                                                                        } else if ($i == 9) {
                                                                            $sql = "SELECT ID_indeliver AS num,breeder_b,date_d,activity_a,allpigs,piglet_alive,dead_pig_birth,eooukornou,pork_litter,average_piglets FROM indeliver WHERE Isdelete = 0";
                                                                        } else if ($i == 10) {
                                                                            $sql = "SELECT ID_deposit_piglet AS num,breeder_b,date_d,activity_a,number_n,breder_b FROM indeposit_piglet WHERE Isdelete = 0";
                                                                        } else if ($i == 11) {
                                                                            $sql = "SELECT ID_piglet AS num,breeder_b,date_d,activity_a,number_n,breder_b FROM inpiglet WHERE Isdelete = 0";
                                                                        } else if ($i == 12) {
                                                                            $sql = "SELECT ID_wean AS num,breeder_b,date_d,activity_a,number_n,pork_litter FROM inwean WHERE Isdelete = 0";
                                                                        } else if ($i == 13) {
                                                                            $sql = "SELECT ID_piglet_dies AS num,breeder_b,date_d,activity_a,number_n,cause_c,note_n FROM inpiglet_dies WHERE Isdelete = 0";
                                                                        } else if ($i == 14) {
                                                                            $sql = "SELECT ID_wind_belly AS num,breeder_b,date_d,activity_a,text_t FROM inwind_belly WHERE Isdelete = 0";
                                                                        } else {
                                                                            $sql = "";
                                                                        }
                                                                        if ($sql != "") {
                                                                            $query = mysqli_query($conn, $sql);
                                                                            if (mysqli_num_rows($query) > 0) {
                                                                                while ($row = mysqli_fetch_array($query)) {
                                                                                    echo "<tr><td class='pt-2-half'style='width: 15.667%;' contenteditable='true'>" . $row['breeder_b'] . "</td>";
                                                                                    echo "<td class='pt-2-half' contenteditable='true'>" . $row['date_d'] . "</td>";
                                                                                    echo "<td class='pt-2-half' contenteditable='true'>" . $row['activity_a'] . "</td>";
                                                                                    if ($i == 1) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ผสมกับพ่อพันธู์ : " . $row['breederdad_d'] . "</td>";
                                                                                    } else if ($i == 2) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ชื่อยา : ". $row['medicin_m'] ." ปริมาณ : ". $row['volume_v'] ." เม็ด</td>";
                                                                                    } else if ($i == 3) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>อาการป่วย  : ". $row['sick_s'] ." หมายเหตุ  : ". $row['note_n'] ."</td>";
                                                                                    } else if ($i == 4) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ชื่อวัคซีน  : ". $row['drug_d'] ."</td>";
                                                                                    } else if ($i == 5) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : ". $row['note_n'] ."</td>";
                                                                                    } else if ($i == 6) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : ". $row['note_n'] ."</td>";
                                                                                    } else if ($i == 7) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ผล  : ". $row['results_r'] ." กำหนดคลอด  : ". $row['define_d'] ."</td>";
                                                                                    } else if ($i == 8) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ข้อความ   : ". $row['text_t'] ." อายุที่แท้ง   : ". $row['abortion_a'] ."</td>";
                                                                                    } else if ($i == 9) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ลูกทั้งหมด  : ". $row['allpigs'] ." ลูกมีชีวิต : ". $row['piglet_alive'] ."ตายแรกคลอด : ". $row['dead_pig_birth'] ." ลูกกรอก  : ". $row['eooukornou'] ."นน.ครอก  : ". $row['pork_litter'] ." เฉลี่ย นน.ลูกสุกร   : ". $row['average_piglets'] ."</td>";
                                                                                    } else if ($i == 10) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : ". $row['number_n'] ." เบอร์แม่ที่ฝาก  : ". $row['breder_b'] ."</td>";
                                                                                    } else if ($i == 11) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : ". $row['number_n'] ." เบอร์แม่ที่ฝาก  : ". $row['breder_b'] ."</td>";
                                                                                    } else if ($i == 12) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : ". $row['number_n'] ." นน.ครอก  : ". $row['pork_litter'] ."</td>";
                                                                                    } else if ($i == 13) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : ". $row['number_n'] ." สาเหตุ  : ". $row['cause_c'] ." หมายเหตุ  : ". $row['note_n'] ."</td>";
                                                                                    } else if ($i == 14) {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'>ข้อความ  : ". $row['text_t'] ."</td>";
                                                                                    } else {
                                                                                        echo "<td class='pt-2-half' contenteditable='true'></td>";
                                                                                    }
                                                                                    echo "</tr>";
                                                                                }
                                                                            }
                                                                        }
                                                                        $i++;
                                                                    } while ($numrow >= $i);

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    select_saveac();
    });
  });

  function select_saveac() {
    var jsonObj = {
      "namef": "select_saveac"
    }

    $.ajax({
      type: "POST",
      url: "controller/addsaveac.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_saveac').html(result);
      }
    });
  }
</script>
<?PHP
include 'script/script.php';
?>