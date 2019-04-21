        <?php
	ini_set('display_errors', 1);
	error_reporting(~0);
        include '../connect/connect.php';
        
        echo $_POST["breeder"];
        echo $_POST["date"];
        echo $_POST["activity"];
        $check = $_POST["activity"];
        isset($_REQUEST['activity']) ? $text = $_REQUEST['activity'] : $text = '';
        
        if($check == "ผสม"){
            $sql = "INSERT INTO `inbreed` (`ID_inbreed`, `breeder_b`, `date_d`, `activity_a`, `breederdad_d`, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["breederdad"]."', '0')"; 
        }else if($check == "ได้รับยา"){
            $sql = "INSERT INTO `ingetminnisin` (`ID_getmedicin`, `breeder_b`, `date_d`, `activity_a`, `medicin_m`, volume_v, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["medicin"]."', '".$_POST["volume"]."','0')";
        }else if($check == "ป่วย"){
            $sql = "INSERT INTO `insick` (`ID_insick`, `breeder_b`, `date_d`, `activity_a`, `sick_s`, note_n, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["sick"]."', '".$_POST["sickk"]."','0')";
        }else if($check == "ทำวัคซีน"){
            $sql = "INSERT INTO `indrug` (`ID_indrug`, `breeder_b`, `date_d`, `activity_a`, `drug_d`, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["drug"]."','0')";
        }else if($check == "กลับสัด"){
            $sql = "INSERT INTO `inreturn_animal` (`ID_inreturn_animal`, `breeder_b`, `date_d`, `activity_a`, `note_n`, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["return"]."','0')";
        }else if($check == "ตาย"){
            $sql = "INSERT INTO `indead` (`ID_indead`, `breeder_b`, `date_d`, `activity_a`, `note_n`, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["dead"]."','0')";
        }else if($check == "ตรวจท้อง"){
            $sql = "INSERT INTO `incheck_up` (`ID_incheck_up`, `breeder_b`, `date_d`, `activity_a`, `results_r`, define_d, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["results"]."', '".$_POST["define"]."','0')";
        }else if($check == "แท้ง"){
            $sql = "INSERT INTO `inabortion` (`ID_inabortion`, `breeder_b`, `date_d`, `activity_a`, `text_t`, abortion_a, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["text"]."', '".$_POST["abortion"]."','0')";
        }else if($check == "คลอด"){
            $sql = "INSERT INTO `indeliver` (`ID_indeliver`, `breeder_b`, `date_d`, `activity_a`, `allpigs`, piglet_alive,dead_pig_birth ,eooukornou ,pork_litter ,average_piglets , `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["allpigs"]."', '".$_POST["piglet_alive"]."', '".$_POST["dead_pig_birth"]."','".$_POST["eooukornou"]."','".$_POST["pork_litter"]."','".$_POST["average_piglets"]."','0')";
        }else if($check == "ฝากเลี้ยง"){
            $sql = "INSERT INTO `indeposit_piglet` (`ID_deposit_piglet`, `breeder_b`, `date_d`, `activity_a`, `number_n`, breder_b, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["number_n"]."', '".$_POST["breder_b"]."','0')";
        }else if($check == "รับเลี้ยง"){
            $sql = "INSERT INTO `inpiglet` (`ID_piglet`, `breeder_b`, `date_d`, `activity_a`, `number_n`, breder_b, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["number_n"]."', '".$_POST["breder_b"]."','0')";
        }else if($check == "หย่านม"){
            $sql = "INSERT INTO `inwean` (`ID_wean`, `breeder_b`, `date_d`, `activity_a`, `number_n`, pork_litter, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["number_n"]."', '".$_POST["pork_litter"]."','0')";
        }else if($check == "ลูกหมูตาย"){
            $sql = "INSERT INTO `inpiglet_dies` (`ID_piglet_dies`, `breeder_b`, `date_d`, `activity_a`, `number_n`, cause_c, note_n, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["number_n"]."', '".$_POST["cause_c"]."', '".$_POST["note_n"]."','0')";
        }else if($check == "ท้องลม"){
            $sql = "INSERT INTO `inwind_belly` (`ID_wind_belly`, `breeder_b`, `date_d`, `activity_a`, text_t, `Isdelete`) VALUES (NULL, '".$_POST["breeder"]."', '".$_POST["date"]."', '".$_POST["activity"]."', '".$_POST["text_t"]."','0')";
        }else{
            echo "Error save";
        }      
	$query = mysqli_query($conn,$sql);
        if($query) {
		echo "Record add successfully";
	} else {
            echo "Error Save <br>.[".$sql."]";
        }
        mysqli_close($conn);       
?>
        <script>
            window.location='../addsaveac.php';
        </script>