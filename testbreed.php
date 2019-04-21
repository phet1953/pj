<?php
include 'header/head.php';
?>
<title>เพื่มสายพันธ์ุ</title>
<?php
include 'header/bareditpig.php';
include 'script/script.php';
include 'connect/connect.php';
?>
<div id="colorlib-main">
    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">

                    <h2 class="colorlib-heading">เพื่มสายพันธ์ุ</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-13">
                    <div class="row">
                        <div class="col-md-13">
                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon" style="border-radius: 20px">
                                    <i class="flaticon-worker"></i>
                                </div>

                                <div class="colorlib-text">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพื่มสายพันธ์ุสุกร
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body" style="border-radius: 20px">
                                                <form action="Insert/Insertbreed.php" method="POST" name="bt1" style="width: 100%">
                                                    <div class="panel-body" style="border-radius: 20px">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12 form-group" align="center">
                                                                <label>เพื่มสายพันธ์ุ</label>
                                                                <input class="form-control" type="text" style="width: 50%" name="breed">
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div align='center'>
                                                            <button class="btn btn-primary btn-send-message" style="border-radius: 10px" type="submit" value="Submit">ยืนยัน</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php
                                                ini_set('display_errors', 1);
                                                error_reporting(~0);

                                                $strKeyword = null;

                                                if (isset($_POST["txtKeyword"])) {
                                                        $strKeyword = $_POST["txtKeyword"];
                                                    }
                                                ?>

                                                <?php
                                                require("connect/connect.php");
                                                $perpage = 5;
                                                if (isset($_GET['page'])) {
                                                    $page = $_GET['page'];
                                                } else {
                                                    $page = 1;
                                                }
                                                $start = ($page - 1) * $perpage;

                                                $sql = "select * from breed WHERE breed_b LIKE '%" . $strKeyword . "%' limit {$start} , {$perpage} ";
                                                $q = mysqli_query($conn, $sql);
                                                ?>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 form-group" align="center">
                                                            <form name="frmSearch" method="post" action="addbreed.php">
                                                                <div class="col-md-8">
                                                                    <input name="txtKeyword" type="search" class="form-control " style="width: 50%" placeholder="ค้นหา" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="counter pull-right"></span>
                                                <table class="table table-hover table-bordered results">
                                                    <thead>
                                                        <tr>
                                                            <th bgcolor="#ffe6ee" class="col-md-10 col-xs-2"><center>สายพันธ์ุ</center></th>
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
                                                            <tr>
                                                                <td><div style="size: 20px"><?php echo $re['breed_b']; ?></div></td>
                                                                <td>
                                                                    <a href='addbreed2.php?CusID=<?= $re["ID_breed"]; ?>'><img src="https://img.icons8.com/dusk/24/000000/edit-property.png"></a>
                                                                    <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='Delect/Delectbreed.php?CusID=<?php echo $re["ID_breed"]; ?>';}"><img src="https://img.icons8.com/plasticine/24/000000/filled-trash.png"></a>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>