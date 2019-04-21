<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_munitdrug(){
    $strsql = "select * from munitdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>หน่วยนับ[ขนาดการใช้ยา]</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_munitdrug']."'>";
            echo "<td><div align='center'>".$re['munitdrug_m']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_munitdrug']."' onclick=munitdrug_edit('".$re['ID_munitdrug']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=munitdrug_delete('".$re['ID_munitdrug']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_munitdrug(){
    isset($_REQUEST['ID_munitdrug']) ? $ID_munitdrug = $_REQUEST['ID_munitdrug'] : $ID_munitdrug = '';
    isset($_REQUEST['munitdrug_m']) ? $munitdrug_m = $_REQUEST['munitdrug_m'] : $munitdrug_m = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO munitdrug (ID_munitdrug, munitdrug_m) VALUE('".$ID_munitdrug."','".$munitdrug_m."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function munitdrug_delete(){
    isset($_REQUEST['ID_munitdrug']) ? $ID_munitdrug = $_REQUEST['ID_munitdrug'] : $ID_munitdrug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE munitdrug SET IsDelete = '1' WHERE ID_munitdrug = '".$ID_munitdrug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_munitdrug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>