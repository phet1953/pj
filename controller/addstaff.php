<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_staff(){
    $strsql = "select * from staff where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<table class='table table-bordered table-responsive'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>username</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>password</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อ-สกุล</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>ชื่อเล่น</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>เลขบัตรประชาชน</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>ที่อยู่</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>รหัสไปรษณีย</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>อีเมล</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันเกิด</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เลขประกอบวิชาชีพ</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>หน้าที่</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์โทร</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_login']."'>";
            echo "<td><div style='size: 20px'>".$re['user']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['pass']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['name_n']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['lastname_l']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['idcard']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['house_no']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['postal_code']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['email_e']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['birthday_b']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['professional_number']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['duty_d']."</div></td>";
            echo "<td><div style='size: 20px'>".$re['tel_t']."</div></td>";
            echo "<td>
            <input type='image' id='edit".$re['ID_login']."' onclick=login_edit('".$re['ID_login']."') src='https://img.icons8.com/dusk/24/000000/edit-property.png'>
            <input type='image' id='delete' onclick=login_delete('".$re['ID_login']."') src='https://img.icons8.com/plasticine/24/000000/filled-trash.png'>
            </td>";
            echo "<tr>";
        }
        echo "</tbody>
        </table>";
    }
}

function select_option(){
    $strsql = "select duty_d from duty";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>หน้าที่</label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['duty_d']."'>".$re['duty_d']."</option>";
        }
        echo "</select>";
    }
    
}

function inser_staff(){
    isset($_REQUEST['user']) ? $user = $_REQUEST['user'] : $user = '';
    isset($_REQUEST['pass']) ? $pass = $_REQUEST['pass'] : $pass = '';
    isset($_REQUEST['name_n']) ? $name_n = $_REQUEST['name_n'] : $name_n = '';
    isset($_REQUEST['lastname_l']) ? $lastname_l = $_REQUEST['lastname_l'] : $lastname_l = '';
    isset($_REQUEST['idcard']) ? $idcard = $_REQUEST['idcard'] : $idcard = '';
    isset($_REQUEST['house_no']) ? $house_no = $_REQUEST['house_no'] : $house_no = '';
    isset($_REQUEST['postal_code']) ? $postal_code = $_REQUEST['postal_code'] : $postal_code = '';
    isset($_REQUEST['email_e']) ? $email_e = $_REQUEST['email_e'] : $email_e = '';
    isset($_REQUEST['birthday_b']) ? $birthday_b = $_REQUEST['birthday_b'] : $birthday_b = '';
    isset($_REQUEST['professional_number']) ? $professional_number = $_REQUEST['professional_number'] : $professional_number = '';
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['tel_t']) ? $tel_t = $_REQUEST['tel_t'] : $tel_t = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO staff (user, pass, name_n, lastname_l, idcard, house_no, postal_code, email_e, birthday_b, professional_number, duty_d, tel_t) VALUE('".$user."','".$pass."','".$name_n."','".$lastname_l."','".$idcard."','".$house_no."','".$postal_code."','".$email_e."','".$birthday_b."','".$professional_number."','".$select_option."','".$tel_t."')";
    $query = mysqli_query($conn,$strsql);
    if ($query) 
    {
        echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
    }else{
        echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
    }
}

function login_delete(){
    isset($_REQUEST['ID_login']) ? $ID_login = $_REQUEST['ID_login'] : $ID_login = '';

    include '../connect/connect.php';

    $strsql = "UPDATE staff SET ID_login = '1' WHERE ID_login = '".$ID_login."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_login));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>