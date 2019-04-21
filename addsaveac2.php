<?php
include 'header/head.php';
?>
<title>PIGFARM</title>
<?php
include 'header/barsaveac.php';
include 'script/script.php';
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
                                            <div class="col-md-12">
                                                <?PHP
                                                $setnum = $_GET['num'];
                                                $setactivity = $_GET['activity'];

                                                if ($setactivity == "ผสม") {
                                                    $sql = "SELECT * FROM inbreed WHERE ID_inbreed = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        echo '<label>เบอร์พ่อ :</label>';
                                                        echo '<select id="number_fa" name="breederdad">';
                                                        $sql = "SELECT No_b FROM breederdad";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option>" . $row['No_b'] . "</option><br>";
                                                        }
                                                        echo '</select><br><br>';
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ได้รับยา") {
                                                    $sql = "SELECT * FROM ingetminnisin WHERE ID_getmedicin = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        echo '<label>ชื่อยา :</label>';
                                                        echo '<select id="ya" name="medicin">';
                                                        echo '<option value="">เลือกชื่อยา</option>';
                                                        $sql = "SELECT medicin_m FROM medicin";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['medicin_m'] . ">" . $row['medicin_m'] . "</option>";
                                                        }
                                                        echo '</select>';
                                                        //                                echo '<label>ปริมาณ :</label> <input  class="form-group" type="text" name="volume"> value='$re['volume_v'];'>'."<br>";     
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ป่วย") {
                                                    $sql = "SELECT * FROM insick WHERE ID_insick = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        echo '<label>อาการป่วย :</label>';
                                                        echo '<select id="ya" name="sick">';
                                                        echo '<option value="">เลือกอาการป่วย</option>';
                                                        $sql = "SELECT sick_s FROM sick";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['sick_s'] . ">" . $row['sick_s'] . "</option>";
                                                        }
                                                        echo '</select>';
                                                        //                                echo '<label>หมายเหตุ :</label> <input  class="form-group" type="text" name="sickk" value=" echo $re['note_n'];">'."<br>";  
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ทำวัคซีน") {
                                                    $sql = "SELECT * FROM indrug WHERE ID_indrug = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        echo '<label>ชื่อวัคซีน :</label>';
                                                        echo '<select id="ya" name="drug">';
                                                        echo '<option value="">เลือกชื่อวัคซีน</option>';
                                                        $sql = "SELECT drug_d FROM drug";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['drug_d'] . ">" . $row['drug_d'] . "</option>";
                                                        }
                                                        echo '</select><br><br>';
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "กลับสัด") {
                                                    $sql = "SELECT * FROM inreturn_animal WHERE ID_inreturn_animal = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>หมายเหตุ :</label><input  class="form-group" type="text" name="return" value=" echo $re['note_n'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ตาย") {
                                                    $sql = "SELECT * FROM indead WHERE ID_indead = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>หมายเหตุ :</label><input  class="form-group" type="text" name="dead" value=" echo $re['note_n'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ตรวจท้อง") {
                                                    $sql = "SELECT * FROM incheck_up WHERE ID_incheck_up = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        echo '<label>ผล :</label>';
                                                        echo '<select id="ya" name="results">';
                                                        echo '<option value="">เลือกผลการตรวจ</option>';
                                                        $sql = "SELECT checkbelly_c FROM checkbelly";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['checkbelly_c'] . ">" . $row['checkbelly_c'] . "</option>";
                                                        }
                                                        echo '</select>';
                                                        //                                echo '<label>กำหนดคลอด :</label><input  class="form-group" type="text" name="define" value=" echo $re['define_d'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "แท้ง") {
                                                    $sql = "SELECT * FROM inabortion WHERE ID_inabortion = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>ข้อความ :</label><input  class="form-group" type="text" name="text" value=" echo $re['text_t'];">'."<br>";                             
                                                        //                                echo '<label>อายุที่แท้ง :</label><input  class="form-group" type="text" name="abortion" value=" echo $re['abortion_a'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "คลอด") {
                                                    $sql = "SELECT * FROM indeliver WHERE ID_indeliver = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>ลูกทั้งหมด :</label><input  class="form-group" type="text" name="allpigs" value=" echo $re['allpigs'];">'."<br>";                             
                                                        //                                echo '<label>ลูกมีชีวิต :</label><input  class="form-group" type="text" name="piglet_alive" value=" echo $re['piglet_alive'];">'."<br>";
                                                        //                                echo '<label>ตายแรกคลอด :</label><input  class="form-group" type="text" name="dead_pig_birth" value=" echo $re['dead_pig_birth'];">'."<br>";                             
                                                        //                                echo '<label>ลูกกรอก :</label><input  class="form-group" type="text" name="eooukornou" value=" echo $re['eooukornou'];">'."<br>";
                                                        //                                echo '<label>นน.ครอก :</label><input  class="form-group" type="text" name="pork_litter" value=" echo $re['pork_litter'];">'."<br>";                             
                                                        //                                echo '<label>เฉลี่ย นน.ลูกสุกร :</label><input  class="form-group" type="text" name="average_piglets" value=" echo $re['average_piglets'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ฝากเลี้ยง") {
                                                    $sql = "SELECT * FROM indeposit_piglet WHERE ID_deposit_piglet = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>จำนวน :</label><input  class="form-group" type="text" name="number_n" value=" echo $re['breder_b'];">'; 
                                                        echo '<label>เบอร์แม่ที่ฝาก :</label>';
                                                        echo '<select id="ya" name="breder_b">';
                                                        echo '<option value="">เลือกเบอร์แม่ที่ฝาก</option>';
                                                        $sql = "SELECT No_b FROM breeder";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                        }
                                                        echo '</select><br><br>';
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "รับเลี้ยง") {
                                                    $sql = "SELECT * FROM inpiglet WHERE ID_piglet = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>จำนวน :</label><input  class="form-group" type="text" name="number_n" value=" echo $re['breder_b'];">';     
                                                        echo '<label>เบอร์แม่ที่ฝาก :</label>';
                                                        echo '<select id="ya" name="breder_b">';
                                                        echo '<option value="">เลือกเบอร์แม่ที่ฝาก</option>';
                                                        $sql = "SELECT No_b FROM breeder";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['No_b'] . ">" . $row['No_b'] . "</option>";
                                                        }
                                                        echo '</select><br><br>';
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "หย่านม") {
                                                    $sql = "SELECT * FROM inwean WHERE ID_wean = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>จำนวน :</label><input  class="form-group" type="text" name="number_n" value=" echo $re['number_n'];">'."<br>";                             
                                                        //                                echo '<label>นน.ครอก :</label><input  class="form-group" type="text" name="pork_litter" value=" echo $re['pork_litter'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ลูกหมูตาย") {
                                                    $sql = "SELECT * FROM inpiglet_dies WHERE ID_piglet_dies = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>จำนวน :</label><input  class="form-group" type="text" name="number_n" value=" echo $re['number_n'];">';                             
                                                        echo '<label>สาเหตุ:</label>';
                                                        echo '<select id="ya" name="cause_c">';
                                                        echo '<option value="">สาเหตุการตาย</option>';
                                                        $sql = "SELECT resdie_r FROM resdie";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<option value=" . $row['resdie_r'] . ">" . $row['resdie_r'] . "</option>";
                                                        }
                                                        echo '</select><br><br>';
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else if ($setactivity == "ท้องลม") {
                                                    $sql = "SELECT * FROM inwind_belly WHERE ID_wind_belly = " . $setnum . " AND Isdelete = 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div align="center" >';
                                                        echo '<form action="Update/Updatesaveac1.php" method="POST" name="" style="width: 100%">';
                                                        echo '<label>เบอร์หู :</label>' . $row['breeder_b'] . "<br>";
                                                        echo '<label>วันที่บันทึก :</label>' . $row['date_d'] . "<br>";
                                                        echo '<label>เหตุการณ์กิจกรรม :</label>' . $row['activity_a'] . "<br>";
                                                        //                                echo '<label>ข้อความ :</label><input  class="form-group" type="text" name="text_t value=" echo $re['text_t'];">'."<br>";
                                                        echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>';
                                                        //                                echo '<button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" onclick="window.location.href='../addsaveac';" value="Submit">ยกเลิก</button>';
                                                        echo '</from>';
                                                        echo '</div>';
                                                    }
                                                } else { }

                                                ?>
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