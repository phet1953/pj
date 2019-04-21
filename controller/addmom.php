<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_mom(){
$strsql = "select * from breeder where Isdelete = '0' ";
include '../connect/connect.php';
$query = mysqli_query($conn,$strsql); 
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์หู</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>สายพันธ์ุ</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>เบอร์หูพ่อของพ่อพันธู์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>เบอร์หูแม่ของแม่พันธู์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันที่เกิด</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันที่เข้าฝูง</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>แหล่งที่มา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            $num = strlen($re['No_b']);
            if($num == 1){
                $num = "000".$re['No_b'];
            }else if($num == 2){
                $num = "00".$re['No_b'];
            }else if($num == 3){
                $num = "0".$re['No_b'];
            }
            $num1 = strlen($re['dad_b']);
            if($num1 == 1){
                $num1 = "000".$re['dad_b'];
            }else if($num1 == 2){
                $num1 = "00".$re['dad_b'];
            }else if($num1 == 3){
                $num1 = "0".$re['dad_b'];
            }
            $num2 = strlen($re['mom_b']);
            if($num2 == 1){
                $num2 = "000".$re['mom_b'];
            }else if($num2 == 2){
                $num2 = "00".$re['mom_b'];
            }else if($num2 == 3){
                $num2 = "0".$re['mom_b'];
            }
            echo "<tr id='".$re['ID_breeder']."'>";
            echo "<td><div align='center'>".$num."</div></td>";
            echo "<td><div>".$re['breed_b']."</div></td>";
            echo "<td><div align='center'>".$num1."</div></td>";
            echo "<td><div align='center'>".$num2."</div></td>";
            echo "<td><div>".$re['birthday_b']."</div></td>";            
            echo "<td><div>".$re['birthfrom_b']."</div></td>";
            echo "<td><div>".$re['form_b']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_breeder']."' onclick=edit('".$re['ID_breeder']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=mom_delete('".$re['ID_breeder']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";

        }
        echo "</tbody>
        </table>";
    }     
}

function select_option(){

    $strsql = "select breed_b from breed";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>สายพันธ์ุ</label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['breed_b']."'>".$re['breed_b']."</option>";
        }
        echo "</select>";
    }
}

function insermom(){
    isset($_REQUEST['number']) ? $number = $_REQUEST['number'] : $number = '';
    isset($_REQUEST['det']) ? $det = $_REQUEST['det'] : $det = '';
    isset($_REQUEST['datbirth']) ? $datbirth = $_REQUEST['datbirth'] : $datbirth = '';
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['mom']) ? $mom = $_REQUEST['mom'] : $mom = '';
    isset($_REQUEST['datfrom']) ? $datfrom = $_REQUEST['datfrom'] : $datfrom = '';
    isset($_REQUEST['no']) ? $no = $_REQUEST['no'] : $no = '';

    include '../connect/connect.php';

    $strsql = "SELECT * FROM `breeder` WHERE No_b = '".$number."'";
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo json_encode(array('status' => '0','message'=> 'fail ซ้ำเบอร์หูแม่พันธู์'));
    }else{
        $strsql = "SELECT * FROM `breederdad` WHERE No_b = '".$number."'";
        $query = mysqli_query($conn,$strsql);
        if (mysqli_num_rows($query) > 0)
        {
            echo json_encode(array('status' => '0','message'=> 'fail ซ้ำเบอร์หูพ่อพันธู์'));
        }else{
            $strsql = "INSERT INTO breeder (No_b, dad_b, mom_b, birthday_b, birthfrom_b, breed_b, form_b) VALUE('".$number."','".$det."','".$mom."','".$datbirth."','".$datfrom."','".$select_option."','".$no."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }
        } 
    }
}

function dad_updete(){
    //isset($_REQUEST['ID_breederdad']) ? $ID_breederdad = $_REQUEST['ID_breederdad'] : $ID_breederdad = '';

    //include '../connect/connect.php';

    //$sql = "UPDATE breederdad SET No_b = '".$_POST["number"]."',breed_b = '".$_POST["selectA"]."',"
      //          . "dad_b = '".$_POST["det"]."',mom_b = '".$_POST["mom"]."',"
        //        . "birthday_b = '".$_POST["datbirth"]."',birthfrom_b = '".$_POST["datfrom"]."',"
          //      . "datdet_d = '".$_POST["datdet"]."',age_b = '".$_POST["age"]."',form_b = '".$_POST["no"]."'";
    //$sql .="WHERE ID_breederdad = '".$_GET["CusID"]."' ";
    //$query = mysqli_query($conn,$sql);

}
function mom_delete(){ 
    isset($_REQUEST['ID_breeder']) ? $ID_breeder = $_REQUEST['ID_breeder'] : $ID_breeder = '';

    include '../connect/connect.php';

    $strsql = "UPDATE breeder SET IsDelete = '1' WHERE ID_breeder = '".$ID_breeder."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_breeder));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  

}
?>