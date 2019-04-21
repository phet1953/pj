<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_methoddrug(){
    $strsql = "select * from methoddrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วิธีการให้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_methoddrug']."'>";
            echo "<td><div align='center'>".$re['methoddrug_m']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_methoddrug']."' onclick=methoddrug_edit('".$re['ID_methoddrug']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=methoddrug_delete('".$re['ID_methoddrug']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_methoddrug(){
    isset($_REQUEST['ID_methoddrug']) ? $ID_methoddrug = $_REQUEST['ID_methoddrug'] : $ID_methoddrug = '';
    isset($_REQUEST['methoddrug_m']) ? $methoddrug_m = $_REQUEST['methoddrug_m'] : $methoddrug_m = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO methoddrug (ID_methoddrug, methoddrug_m) VALUE('".$ID_methoddrug."','".$methoddrug_m."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function methoddrug_delete(){
    isset($_REQUEST['ID_methoddrug']) ? $ID_methoddrug = $_REQUEST['ID_methoddrug'] : $ID_methoddrug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE methoddrug SET IsDelete = '1' WHERE ID_methoddrug = '".$ID_methoddrug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_methoddrug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>