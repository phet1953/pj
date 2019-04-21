<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_breed(){
    $strsql = "select * from breed where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สายพันธ์ุ</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_breed']."'>";
            echo "<td><div align='center'>".$re['breed_b']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_breed']."' onclick=breed_edit('".$re['ID_breed']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=breed_delete('".$re['ID_breed']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_breed(){
    isset($_REQUEST['breed']) ? $breed = $_REQUEST['breed'] : $breed = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO breed (breed_b) VALUE('".$breed."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function breed_delete(){
    isset($_REQUEST['ID_breed']) ? $ID_breed = $_REQUEST['ID_breed'] : $ID_breed = '';

    include '../connect/connect.php';

    $strsql = "UPDATE breed SET IsDelete = '1' WHERE ID_breed = '".$ID_breed."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_breed));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>