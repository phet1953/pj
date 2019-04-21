<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_objdrug(){
    $strsql = "select * from objdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>จุดประสงค์การใช้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_objdrug']."'>";
            echo "<td><div align='center'>".$re['objdrug_o']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_objdrug']."' onclick=objdrug_edit('".$re['ID_objdrug']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=objdrug_delete('".$re['ID_objdrug']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_objdrug(){
    isset($_REQUEST['ID_objdrug']) ? $ID_objdrug = $_REQUEST['ID_objdrug'] : $ID_objdrug = '';
    isset($_REQUEST['objdrug_o']) ? $objdrug_o = $_REQUEST['objdrug_o'] : $objdrug_o = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO objdrug (ID_objdrug, objdrug_o) VALUE('".$ID_objdrug."','".$objdrug_o."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function objdrug_delete(){
    isset($_REQUEST['ID_objdrug']) ? $ID_objdrug = $_REQUEST['ID_objdrug'] : $ID_objdrug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE objdrug SET IsDelete = '1' WHERE ID_objdrug = '".$ID_objdrug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_objdrug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>