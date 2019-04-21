<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_saveac()
{
    echo"<table class='table table-hover table-bordered results'>";
        echo"<thead>";
            echo"<tr>";
                echo"<th bgcolor='#ffe6ee' class='col-md-2 col-xs-2'><center>เบอร์หูแม่พันธุ์</center></th>";
                echo"<th bgcolor='#ffe6ee' class='col-md-2  col-xs-2'><center>วันที่</center></th>";
                echo"<th bgcolor='#ffe6ee'class='col-md-2 col-xs-2'><center>เหตุการณ์กิจกรรม</center></th>";
                echo"<th bgcolor='#ffe6ee'class='col-md- 2 col-xs-2'><center>หมายเหตุ</center></th>";
            echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
        $sql = "SELECT activity_a FROM activity";
        include '../connect/connect.php';
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
        echo"</tbody>";
    echo"</table>";

}
