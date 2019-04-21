<?php
include 'header/head.php'; 
?>
<title>PIGFARM</title>
<?php
include 'header/bareditdrug.php';
include 'script/script.php';   
include 'connect/connect.php';
?>
<div id="colorlib-main">
 <div class="colorlib-services">
  <div class="colorlib-narrow-content">
   <div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

     <h2 class="colorlib-heading">เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม</h2>
    </div>
   </div>
   <div class="row row-bottom-padded-md">
    <div class="col-md-12">
     <div class="row">
      <div class="col-md-12">
       <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
        <div class="colorlib-icon" style="border-radius: 20px">
         <i class="flaticon-worker"></i>
        </div>
        <div class="colorlib-text">
         <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
           <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม
            </a>
           </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
           <div class="panel-body" style="border-radius: 20px">
               <form action="Insert/Insertdrug.php" method="POST" name="" style="width: 100%">
             <div class="panel-body" style="border-radius: 20px">
              <div class="col-md-12">
               <div class="col-md-6 form-group">
                 <label>รหัสวัคซีน</label>
                 <input  class="form-control" type="text" name="codevac" size=30>
               </div>
                   <div class="col-md-6">
                     <label>ชื่อบริษัท</label>
                     <select id="selectA" name="comname" class="form-control" style="width:75%;">
                        <option value="">เลือกรายการ</option>
                        <?php
                        $sql = "select compadrug_c from compadrug";
                          $q = mysqli_query($conn, $sql);                        
                            while ($re = mysqli_fetch_array($q)) {
                        ?>
                        <option><?php echo $re['compadrug_c']; ?></option>
                        <?php } ?>  
                      </select><br>
                    </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>วัคซีนป้องกันโรค</label
                 <input class="form-control" type="text" name="vacdisease">
                </div>
               </div>
                <div class="col-md-6">
                <div class="form-group">
                 <label>ปริมาณการใช้(ซีซี/ตัว)</label>
                 <input  class="form-control" type="text" name="vacquality" size=30>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>ชื่อผลิตภัณฑ์</label>
                 <input class="form-control" type="text" name="vacname">
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>ข้อบ่งใช้</label>
                 <input  class="form-control" type="text" name="vacuse" size=30>
                </div>
               </div>
              </div>
                 <br>
             <div align="center">
                 <button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>
             </div>
             </div>    
             </form>
            <?php
            require ("connect/connect.php");
            $perpage = 10;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $start = ($page - 1) * $perpage;

            $sql = "select * from drug limit {$start} , {$perpage} ";
            $q = mysqli_query($conn, $sql);
           ?>
          <span class="counter pull-right"></span>
           <table class="table table-hover table-bordered results">
            <thead>
             <tr>
                <th bgcolor="#ffe6ee" class="col-md-1 col-xs-0"><center>วัคซีนป้องกันโรค</center></th>
                <th bgcolor="#ffe6ee" class="col-md-2 col-xs-1"><center>ชื่อผลิตภัณฑ์</center></th>
                <th bgcolor="#ffe6ee" class="col-md-1 col-xs-2"><center>ปริมาณการใช้(ซีซี/ตัว)</center></th>
                <th bgcolor="#ffe6ee" class="col-md-1 col-xs-1"><center>ชื่อบริษัท</center></th>
                <th bgcolor="#ffe6ee" class="col-md-1 col-xs-1"><center>ข้อบ่งใช้</center></th>
                <th bgcolor="#ffe6ee" class="col-md-1 col-xs-1"><center>สถานะ</center></th>
             </tr>
             </thead>
            <tbody>
            <tr>
              <?php
              $i = 0;
              while ($re = mysqli_fetch_array($q)) {
               $i++;
               ?>
               <tr >
                   <td><div style="size: 20px"><?php echo $re['drug_d']; ?></div></td>
                    <td><div style="size: 20px"><?php echo $re['product_p']; ?></div></td>
                    <td><div style="size: 20px"><?php echo $re['cc_c']; ?></div></td>
                    <td><div style="size: 20px"><?php echo $re['com_c']; ?></div></td>
                    <td><div style="size: 20px"><?php echo $re['use_u']; ?></div></td>
                <td>
                    <a href = 'adddrug2.php?CusID=<?=$re["ID_drug"];?>'><img src="https://img.icons8.com/dusk/24/000000/edit-property.png"></a>
                 <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='Delect/Delectdrug.php?CusID=<?php echo $re["ID_drug"];?>';}"><img src="https://img.icons8.com/plasticine/24/000000/filled-trash.png"></a>
                </td>
               </tr>
               <?php
              }
              ?>
            </table>
           </tbody>
          <div>
            <?php
            $sql2 = "select * from drug";
            $q2 = mysqli_query($conn, $sql2);
            $total_record = mysqli_num_rows($q2);
            $total_page = ceil($total_record / $perpage);
            ?>    
            <?php
            mysqli_close($conn);
            ?>

            <!-- End Sample Area -->
            <nav aria-label="Page navigation example">
             <ul class="pagination">
              <li class="page-item">
                  <a class="page-link" href="adddrug.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
               </a>
              </li>
              <?php for ($re = 1; $re <= $total_page; $re++) { ?>
              <li class="page-item">
                  <a class="page-link" href="adddrug.php?page=<?php echo $re; ?>"><?php echo $re; ?></a></li>
               <?php } ?>
               <li class="page-item">
                   <a class="page-link" href="adddrug.php?page=<?php echo $total_page; ?>" aria-label="Next">
                 <span aria-hidden="true">&raquo;</span>
                </a>
               </li>
              </ul>
             </nav>
            </div> 

         </div></div></div></div></div></div></div></div></div></div></div></div>



