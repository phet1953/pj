<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_option(){

    $strsql = "select compadrug_c from compadrug";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ชื่อบริษัท</label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['compadrug_c']."'>".$re['compadrug_c']."</option>";
        }
        echo "</select>";
    }
}

function select_drug(){
    $strsql = "select * from drug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วัคซีนป้องกันโรค</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อผลิตภัณฑ์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ปริมาณการใช้(ซีซี/ตัว)</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อบริษัท</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ข้อบ่งใช้</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_drug']."'>";
            echo "<td><div align='center'>".$re['drug_d']."</div></td>";
            echo "<td><div align='center'>".$re['product_p']."</div></td>";
            echo "<td><div align='center'>".$re['cc_c']."</div></td>";
            echo "<td><div align='center'>".$re['com_c']."</div></td>";
            echo "<td><div align='center'>".$re['use_u']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_drug']."' onclick=drug_edit('".$re['ID_drug']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=drug_delete('".$re['ID_drug']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_drug(){
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['drug_d']) ? $drug_d = $_REQUEST['drug_d'] : $drug_d = '';
    isset($_REQUEST['cc_c']) ? $cc_c = $_REQUEST['cc_c'] : $cc_c = '';
    isset($_REQUEST['product_p']) ? $product_p = $_REQUEST['product_p'] : $product_p = '';
    isset($_REQUEST['use_u']) ? $use_u = $_REQUEST['use_u'] : $use_u = '';
    isset($_REQUEST['ID_drug']) ? $ID_drug = $_REQUEST['ID_drug'] : $ID_drug = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO drug (com_c, drug_d, cc_c, product_p, use_u , ID_drug) VALUE('".$select_option."','".$drug_d."','".$cc_c."','".$product_p."','".$use_u."','".$ID_drug."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function drug_delete(){
    isset($_REQUEST['ID_drug']) ? $ID_drug = $_REQUEST['ID_drug'] : $ID_drug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE drug SET IsDelete = '1' WHERE ID_drug = '".$ID_drug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_drug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>