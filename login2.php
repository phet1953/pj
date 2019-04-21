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

                      $_SESSION["ID_login"] = $row["duty_d"];
                      $_SESSION["login"] = $row["ursername"]." ".$row["password"];
                      $_SESSION["ID_login"] = $row["ID_login"];

                      if($_SESSION["ID_login"] ==  1){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: admininfo.php");

                      }else if ($_SESSION["ID_login"] == 2) {

                        Header("Location: admininfo.php");

                      }else if ($_SESSION["ID_login"] == 3) {

                        Header("Location: veteinfo.php");
                      }else if ($_SESSION["ID_login"] == 4) {

                        Header("Location: staffinfo.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

       
?>