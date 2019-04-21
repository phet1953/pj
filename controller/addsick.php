<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_sick(){
    $strsql = "select * from sick where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>อาการป่วย</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_sick']."'>";
            echo "<td><div align='center'>".$re['sick_s']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_sick']."' onclick=sick_edit('".$re['ID_sick']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=sick_delete('".$re['ID_sick']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_sick(){
    isset($_REQUEST['sick_s']) ? $sick_s = $_REQUEST['sick_s'] : $sick_s = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO sick (sick_s) VALUE('".$sick_s."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function sick_delete(){
    isset($_REQUEST['ID_sick']) ? $ID_sick = $_REQUEST['ID_sick'] : $ID_sick = '';

    include '../connect/connect.php';

    $strsql = "UPDATE sick SET IsDelete = '1' WHERE ID_sick = '".$ID_sick."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_sick));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>