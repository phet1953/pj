<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_resdie(){
    $strsql = "select * from resdie where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สาเหตุการตาย</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_resdie']."'>";
            echo "<td><div align='center'>".$re['resdie_r']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_resdie']."' onclick=resdie_edit('".$re['ID_resdie']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=resdie_delete('".$re['ID_resdie']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_resdie(){
    isset($_REQUEST['resdie_r']) ? $resdie_r = $_REQUEST['resdie_r'] : $resdie_r = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO resdie (resdie_r) VALUE('".$resdie_r."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function resdie_delete(){
    isset($_REQUEST['ID_resdie']) ? $ID_resdie = $_REQUEST['ID_resdie'] : $ID_resdie = '';

    include '../connect/connect.php';

    $strsql = "UPDATE resdie SET IsDelete = '1' WHERE ID_resdie = '".$ID_resdie."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_resdie));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>