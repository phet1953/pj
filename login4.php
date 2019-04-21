<?php 
session_start();
       /*
        *status 1 = boss
        *status 2 = fn
        *status 3 = std
       */
        //connection
                  include 'connect/connect.php';
        //รับค่า user & password
                  $mem_username = $_POST['ursername'];
                  $mem_password = $_POST['password'];
                  //$mem_password = md5($_POST['password']);
        //query 
                  $sql="SELECT * FROM login Where id='".$mem_username."' and pw='".$mem_password."'";

                  $result = mysqli_query($conn,$sql);
        
                  if(mysqli_num_rows($result) == 1){

                      $row = mysqli_fetch_array($result);

                      isset($_REQUEST['id']) ? $row["id"] = $_REQUEST['id'] : $row["id"] = '';
                      isset($_REQUEST['pw']) ? $row["pw"] = $_REQUEST['pass'] : $row["pw"] = '';
                      
                      $_SESSION["ID_login"] = $row["duty_d"];
                      $_SESSION["login"] = $row["id"]." ".$row["pw"];
//                      $_SESSION["ID_login"] = $row["ID_login"];

                      if($row["id"] == "admin" && $row["pw"] == "admin1234"){
                        echo json_encode(array('status' => 'admin','message'=> 'Loggin admin OK'));
                    }else if($row["id"] == "vete" && $row["pw"] == "vete1234"){
                        echo json_encode(array('status' => 'vete','message'=> 'Loggin vete OK'));
                    }else if($row["id"] == "staff" && $row["pw"] == "staff1234"){
                        echo json_encode(array('status' => 'staff','message'=> 'Loggin staff OK'));    
                    }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

       
?>