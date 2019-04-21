<?php
include 'header/head.php';
?>
<title>PIGFARM</title>
<?php
include 'header/barcullmom.php';
include 'connect/connect.php';
include 'script/script.php';
?>
<div id="colorlib-main">
  <div class="colorlib-work">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
          <h2 class="colorlib-heading">เงื่อนไขในการคัดทิ้ง</h2>
        </div>
      </div>
      <div class="row row-bottom-padded-md">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="colorlib-text">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เลือกเงื่อนไขการคัดทิ้ง
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body" style="border-radius: 20px">
                      <div class="col-md-6">
                        <table border="2" cellspacing="2" cellpadding="2" width="70%" align="center" style="border: 5px double #6666ff">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" style="border: 2px dashed #809fff">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="background-color: #ffe6f7">
                                  <tbody>
                                    <tr>
                                      <td align="center" valign="middle" style="background-image: url(http://www.yenta4.com/cutie/upload/7/7/465571981930b.gif); height: 20px"></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle">
                                        <p>
                                          <font size="5" color="#3333ff">เงื่อนไขการคัดทิ้ง</font>
                                        </p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="2" cellspacing="2" cellpadding="2" width="70%" align="center" style="border: 5px double #6666ff">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" style="border: 2px dashed #809fff">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="background-color: #ffe6f7">
                                  <tbody>
                                    <tr>
                                      <td align="center" valign="middle" style="background-image: url(http://www.yenta4.com/cutie/upload/7/7/465571981930b.gif); height: 20px"></td>
                                    </tr>
                                    <td align="center" valign="middle">
                                      <h4>1.ผสม</h4>
                                    </td>
                                    <td align="center" valign="middle">
                                      <h4>2.ท้องลม</h4>
                                    </td>
                                    <td align="center" valign="middle">
                                      <h4>3.ได้รับยา</h4>
                                    </td>
                                    <tr>
                                      <td align="center" valign="middle">
                                        <h4>4.ป่วย</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>5.ทำวัคซีน</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>6.กลับสัด</h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle">
                                        <h4>7.ตาย</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>8.ตรวจท้อง</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>9.แท้ง</h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle">
                                        <h4>10.คลอด</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>11.ฝากเลี้ยง</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>12.รับเลี้ยง</h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle">
                                        <h4>13.หย่านม</h4>
                                      </td>
                                      <td align="center" valign="middle">
                                        <h4>14.ลูกหมูตาย</h4>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <form action="" method="post" name="">
                          <div class="content">
                            <div class="form-group">
                              <div class="form-select js-form-select">
                                <label class="form-select__label">เหตุการณ์กิจกรรม</label>
                                <select id="even" name="activity" required style="border-radius: 4px">
                                  <option value="">เลือกกิจกรรม :</option>
                                  <?PHP
                                  $sql = "SELECT activity_a FROM activity";
                                  $query = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value=" . $row['activity_a'] . ">" . $row['activity_a'] . "</option>";
                                  }
                                  ?>
                                </select>
                                <input class="form-group" type="text" style="width: 20%" name="sick">
                              </div>
                            </div>
                            <div class="form-group">
                              <center><button class="btn btn-primary btn-send-message" type="submit" value="Submit" style="border-radius: 10px">ยืนยัน</button></center>
                            </div>
                          </div>
                        </form>
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