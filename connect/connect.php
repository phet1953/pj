<?php
            $host = "localhost";
            $user = "root";
            $pass = "root";
            $dbname = "projeckpig";
            $conn = new mysqli($host,$user,$pass,$dbname);
            mysqli_set_charset($conn, "utf8");
            
            if($conn){
                echo "";
                
            }
            else
            {
                echo "MySQL Connect Failed : Error : ".mysqli_error();
            }
            
//            function connect(){
//            $host = "localhost";
//            $user = "root";
//            $pass = "root";
//            $dbname = "projeckpig";
//            $conn = new mysqli($host,$user,$pass,$dbname);
//            mysqli_set_charset($conn, "utf8");
//            return $conn;
//            }
            ?>
            
            



