<?php
include 'header/head.php'; 
?>
<title>PIGFARM</title>
<?php
include 'header/bareditpigac.php';
include 'script/script.php';
include 'connect/connect.php';
?>

<div id="colorlib-main">
 <div class="colorlib-services">
  <div class="colorlib-narrow-content">
   <div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

     <h2 class="colorlib-heading">เพื่มกิจกรรม</h2>
   </div>
 </div>
 <div class="row row-bottom-padded-md">
  <div class="col-md-12">
   <div class="row">
    <div class="col-md-12">
     <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
      <div class="colorlib-icon" style="border-radius: 20px">
       <i class="flaticon-sketch"></i>
     </div>
     <div class="colorlib-text">
       <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo" style="border-radius: 20px">
         <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพื่มกิจกรรมสุกร
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
       <div class="panel-body" style="border-radius: 20px">
        <div class="row">
         <div class="col-md-12">                 

          <form name="frm" method="post" action="Insert/Insertactivity.php">
           <div class="panel-body" style="border-radius: 20px">                           
            <div class="col-md-12">
             <div class="col-md-12 form-group" align="center">
                   <label>ชื่อกิจกรรม</label>
                   <input type="text" class="form-control" style="width: 50%" placeholder="ชื่อกิจกรรม" aria-label="Recipient's username" aria-describedby="basic-addon2" name="activityname">
              <br>
              <center>
              <div class="input-group-append">
               <button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit"  value="Submit">ยืนยัน</button>
             </div>
              </center>
           </div>
       </div>
     </div>
    </form>
   </div>
 </div>
<?php
           require ("connect/connect.php");
           $perpage = 5;
           if (isset($_GET['page'])) {
            $page = $_GET['page'];
           } else {
            $page = 1;
           }
           $start = ($page - 1) * $perpage;

           $sql = "select * from activity limit {$start} , {$perpage} ";
           $q = mysqli_query($conn, $sql);
           ?>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
    <thead>
   <tr>
    <th bgcolor="#ffe6ee" class="col-md-10 col-xs-2"><center>กิจกรรม</center></th>
    <th bgcolor="#ffe6ee" class="col-md-10 col-xs-2"><center>สถานะ</center></th>
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

                <td><div style="size: 20px"><?php echo $re['activity_a']; ?></div></td>
                <td>
                 <a href ='addactivity2.php?CusID=<?=$re["ID_activity"];?>'><img src="https://img.icons8.com/dusk/24/000000/edit-property.png"></a>
                 <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='Delect/Delectactivity.php?CusID=<?php echo $re["ID_activity"];?>';}"><img src="https://img.icons8.com/plasticine/24/000000/filled-trash.png"></a>
                </td>

               </tr>
               <?php
              }
              ?> 


</tbody>
</table>
<div>
            <?php
            $sql2 = "select * from activity";
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
                  <a class="page-link" href="addactivity.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
               </a>
              </li>
              <?php for ($re = 1; $re <= $total_page; $re++) { ?>
              <li class="page-item">
                  <a class="page-link" href="addactivity.php?page=<?php echo $re; ?>"><?php echo $re; ?></a></li>
               <?php } ?>
               <li class="page-item">
                   <a class="page-link" href="addactivity.php?page=<?php echo $total_page; ?>" aria-label="Next">
                 <span aria-hidden="true">&raquo;</span>
                </a>
               </li>
              </ul>
             </nav>
            </div> 

</div></div></div></div></div></div></div></div></div></div></div></div>


