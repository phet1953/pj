<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_compadrug(){
    $strsql = "select * from compadrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อบริษัท</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_compadrug']."'>";
            echo "<td><div align='center'>".$re['compadrug_c']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_compadrug']."' onclick=compadrug_edit('".$re['ID_compadrug']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=compadrug_delete('".$re['ID_compadrug']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_compadrug(){
    isset($_REQUEST['ID_compadrug']) ? $ID_compadrug = $_REQUEST['ID_compadrug'] : $ID_compadrug = '';
    isset($_REQUEST['compadrug_c']) ? $compadrug_c = $_REQUEST['compadrug_c'] : $compadrug_c = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO compadrug (ID_compadrug, compadrug_c) VALUE('".$ID_compadrug."','".$compadrug_c."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function compadrug_delete(){
    isset($_REQUEST['ID_compadrug']) ? $ID_compadrug = $_REQUEST['ID_compadrug'] : $ID_compadrug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE compadrug SET IsDelete = '1' WHERE ID_compadrug = '".$ID_compadrug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_compadrug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>