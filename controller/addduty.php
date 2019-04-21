<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_duty(){
    $strsql = "select * from duty where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>หน้าที่ในฟาร์ม</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_duty']."'>";
            echo "<td><div align='center'>".$re['duty_d']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_duty']."' onclick=duty_edit('".$re['ID_duty']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=duty_delete('".$re['ID_duty']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_duty(){
    isset($_REQUEST['duty_d']) ? $duty_d = $_REQUEST['duty_d'] : $duty_d = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO duty (duty_d) VALUE('".$duty_d."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function duty_delete(){
    isset($_REQUEST['ID_duty']) ? $ID_duty = $_REQUEST['ID_duty'] : $ID_duty = '';

    include '../connect/connect.php';

    $strsql = "UPDATE duty SET IsDelete = '1' WHERE ID_duty = '".$ID_duty."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_duty));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>