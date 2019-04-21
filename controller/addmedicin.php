<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_option1(){

    $strsql = "select unitdrug_u from unitdrug";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ขนาดยา</label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['unitdrug_u']."'>".$re['unitdrug_u']."</option>";
        }
        echo "</select>";
    }
}

function select_option2(){

    $strsql = "select munitdrug_m from munitdrug";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ขนาดการใช้ยา</label>
        <select id='selectB' name='selectB' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['munitdrug_m']."'>".$re['munitdrug_m']."</option>";
        }
        echo "</select>";
    }
}

function select_option3(){

    $strsql = "select methoddrug_m from methoddrug";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>วิธีการให้ยา</label>
        <select id='selectC' name='selectC' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['methoddrug_m']."'>".$re['methoddrug_m']."</option>";
        }
        echo "</select>";
    }
}

function select_option4(){

    $strsql = "select compadrug_c from compadrug";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ชื่อบริษัท</label>
        <select id='selectD' name='selectD' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['compadrug_c']."'>".$re['compadrug_c']."</option>";
        }
        echo "</select>";
    }
}

function select_medicin(){
    $strsql = "select * from medicin where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อสารออกฤทธิ์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เลขทะเบียนยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อบริษัท</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ขนาดยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วิธีการให้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ขนาดการใช้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>% ของยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ระยะหยุดยา(วัน)</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ข้อบ่งใช้</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_medicin']."'>";
            echo "<td><div align='center'>".$re['medicin_m']."</div></td>";
            echo "<td><div align='center'>".$re['act_a']."</div></td>";
            echo "<td><div align='center'>".$re['registration_r']."</div></td>";
            echo "<td><div align='center'>".$re['comname_c']."</div></td>";
            echo "<td><div align='center'>".$re['unitdrug_u']."</div></td>";
            echo "<td><div align='center'>".$re['methoddrug_m']."</div></td>";
            echo "<td><div align='center'>".$re['munitdrug_m']."</div></td>";
            echo "<td><div align='center'>".$re['percent_p']."</div></td>";
            echo "<td><div align='center'>".$re['stop_s']."</div></td>";
            echo "<td><div align='center'>".$re['use_u']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_medicin']."' onclick=medicin_edit('".$re['ID_medicin']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=medicin_delete('".$re['ID_medicin']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }

}

function inser_medicin(){
    isset($_REQUEST['ID_medicin']) ? $ID_medicin = $_REQUEST['ID_medicin'] : $ID_medicin = '';
    isset($_REQUEST['selectA']) ? $select_option1 = $_REQUEST['selectA'] : $select_option1 = '';
    isset($_REQUEST['medicin_m']) ? $medicin_m = $_REQUEST['medicin_m'] : $medicin_m = '';
    isset($_REQUEST['selectB']) ? $select_option2 = $_REQUEST['selectB'] : $select_option2 = '';
    isset($_REQUEST['act_a']) ? $act_a = $_REQUEST['act_a'] : $act_a = '';
    isset($_REQUEST['selectC']) ? $select_option3 = $_REQUEST['selectC'] : $select_option3 = '';
    isset($_REQUEST['percent_p']) ? $percent_p = $_REQUEST['percent_p'] : $percent_p = '';
    isset($_REQUEST['registration_r']) ? $registration_r = $_REQUEST['registration_r'] : $registration_r = '';
    isset($_REQUEST['stop_s']) ? $stop_s = $_REQUEST['stop_s'] : $stop_s = '';
    isset($_REQUEST['selectD']) ? $select_option4 = $_REQUEST['selectD'] : $select_option4 = '';
    isset($_REQUEST['use_u']) ? $use_u = $_REQUEST['use_u'] : $use_u = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO medicin (ID_medicin, unitdrug_u, medicin_m, munitdrug_m, act_a, methoddrug_m, percent_p, registration_r, stop_s, comname_c, use_u) VALUE('".$ID_medicin."','".$select_option1."','".$medicin_m."','".$select_option2."','".$act_a."','".$select_option3."','".$percent_p."','".$registration_r."','".$stop_s."','".$select_option4."','".$use_u."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function medicin_delete(){
    isset($_REQUEST['ID_medicin']) ? $ID_medicin = $_REQUEST['ID_medicin'] : $ID_medicin = '';

    include '../connect/connect.php';

    $strsql = "UPDATE medicin SET IsDelete = '1' WHERE ID_medicin = '".$ID_medicin."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_medicin));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>