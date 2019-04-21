<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_activity(){
    $strsql = "select * from activity where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>กิจกรรม</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_activity']."'>";
            echo "<td><div align='center'>".$re['activity_a']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_activity']."' onclick=activity_edit('".$re['ID_activity']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=activity_delete('".$re['ID_activity']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_activity(){
    isset($_REQUEST['activity_a']) ? $activity_a = $_REQUEST['activity_a'] : $activity_a = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO activity (activity_a) VALUE('".$activity_a."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function activity_delete(){
    isset($_REQUEST['ID_activity']) ? $ID_activity = $_REQUEST['ID_activity'] : $ID_activity = '';

    include '../connect/connect.php';

    $strsql = "UPDATE activity SET IsDelete = '1' WHERE ID_activity = '".$ID_activity."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_activity));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>