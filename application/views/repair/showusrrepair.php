    <div style="text-align:center;">
      <h1>各設備維修狀況查詢</h1>
      <hr>
    </div>
    <div class="nav">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="repair-info">
          <table class="table table-striped">
            <tr>
              <td>裝置分類</td>
              <td>裝置名稱</td>
              <td>故障原因</td>
              <td>設備位置</td>
              <td>新增時間</td>
              <td>備註</td>
              <td>維修狀態</td>
              <td>說明</td>
            </tr>
            <?php foreach ($result as $row) { ?>
            <tr>
              <td><?php echo $row['dc_name']; ?></td>
              <td><?php echo $row['dn_name']; ?></td>
              <td><?php echo $row['fc_name']; ?></td>
              <td><?php echo $row['location']; ?></td>
              <td><?php echo $row['add_datetime']; ?></td>
              <td><?php echo $row['remark']; ?></td>
              <td><?php echo $row['StatusName']; ?></td>
              <td><?php echo $row['description']; ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
    <div style="text-align:center;">
      <hr>
      使用Codeigniter 3 / BootStrap 3 製作
    </div>
  </body>
</html>
