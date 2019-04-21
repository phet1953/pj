<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_far(){
    include '../connect/connect.php';
    $strsql = "select * from farm where Isdelete = '0' ";
    $query = mysqli_query($conn,$strsql);
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-4'><center>ฃื่อฟาร์ม</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-4'><center>ฃื่อเจ้าของฟาร์ม</center></th>
         <th bgcolor='#ffe6ee' class='col-md-3 col-xs-1'><center>เบอร์โทรศัพท์(เจ้าของ)</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-3'><center>ชื่อผู้จัดการฟาร์ม</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-3'><center>เบอร์โทรศัพท์(ผู้จัดการ)</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-3'><center>ที่อยู่ฟาร์ม</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-3'><center>เบอร์โทรศัพท์(ฟาร์ม)</center></th>
         <th bgcolor='#ffe6ee' class='col-md-2 col-xs-3'><center>รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่</center></th>
         <th bgcolor='#ffe6ee' class='col-md-4 col-xs-3'>สถานะ</th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            $num = strlen($re['mowntel_m']);
            if($num == 9){
                $num = "0".$re['mowntel_m'];
            }
            $num1 = strlen($re['telfarm_t']);
            if($num1 == 9){
                $num1 = "0".$re['telfarm_t'];
            } 
            $num2 = strlen($re['farmtel_f']);
            if($num2 == 9){
                $num2 = "0".$re['farmtel_f'];
            }   
            echo "<tr id='".$re['ID_farm']."'>";
            echo "<td><div>".$re['far_f']."</div></td>";
            echo "<td><div>".$re['farmown_f']."</div></td>";
            echo "<td><div align='center'>".$num."</div></td>";
            echo "<td><div>".$re['farfarm_f']."</div></td>";
            echo "<td><div align='center'>".$num1."</div></td>";
            echo "<td><div>".$re['farmaddress_f']."</div></td>";
            echo "<td><div align='center'>".$num2."</div></td>";
            echo "<td><div>".$re['warrantdate_w']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_farm']."' onclick=edit_far('".$re['ID_farm']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=delete_far('".$re['ID_farm']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";

        }
        echo "</tbody>
        </table>";    
            

    }
}

function inser_far(){
    isset($_REQUEST['far_f']) ? $far_f = $_REQUEST['far_f'] : $far_f = '';
    isset($_REQUEST['farmown_f']) ? $farmown_f = $_REQUEST['farmown_f'] : $farmown_f = '';
    isset($_REQUEST['mowntel_m']) ? $mowntel_m = $_REQUEST['mowntel_m'] : $mowntel_m = '';
    isset($_REQUEST['farfarm_f']) ? $farfarm_f = $_REQUEST['farfarm_f'] : $farfarm_f = '';
    isset($_REQUEST['telfarm_t']) ? $telfarm_t = $_REQUEST['telfarm_t'] : $telfarm_t = '';
    isset($_REQUEST['farmaddress_f']) ? $farmaddress_f = $_REQUEST['farmaddress_f'] : $farmaddress_f = '';
    isset($_REQUEST['farmtel_f']) ? $farmtel_f = $_REQUEST['farmtel_f'] : $farmtel_f = '';
    isset($_REQUEST['warrantdate_w']) ? $warrantdate_w = $_REQUEST['warrantdate_w'] : $warrantdate_w = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO farm (far_f,farmown_f, mowntel_m, farfarm_f, telfarm_t, farmaddress_f, farmtel_f, warrantdate_w) VALUE('".$far_f."','".$farmown_f."','".$mowntel_m."','".$farfarm_f."','".$telfarm_t."','".$farmaddress_f."','".$farmtel_f."','".$warrantdate_w."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }
}

function edit_far(){

}

function delete_far(){
    isset($_REQUEST['ID_farm']) ? $ID_farm = $_REQUEST['ID_farm'] : $ID_farm = '';

    include '../connect/connect.php';

    $strsql = "UPDATE farm SET IsDelete = '1' WHERE ID_farm = '".$ID_farm."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_farm));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  

}

?>