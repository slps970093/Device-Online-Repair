    <div class="nav">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">操作已完成</div>
        <?php } ?>
        <?php if(isset($_GET['failed'])) { ?>
        <div class="alert alert-warning" role="alert">操作失敗，請聯絡系統管理員</div>
        <?php } ?>
        <h1>設備維修管理介面</h1>
        <hr>
        <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo site_url('admin/device/repair/add'); ?>'">新增</button>
        <table class="table table-striped">
          <tr>
            <td>編號</td>
            <td>設備類別</td>
            <td>設備名稱</td>
            <td>故障類別</td>
            <td>位置</td>
            <td>狀態</td>
            <td>檢視資料</td>
            <td>修改</td>
            <td>刪除</td>
          </tr>
          <?php foreach ($result as $row) { ?>
          <?php $id = $row['id']; ?>
          <tr class="active">
            <td><?php echo $id; ?></td>
            <td><?php echo $row['dc_name']; ?></td>
            <td><?php echo $row['dn_name']; ?></td>
            <td><?php echo $row['fc_name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['StatusName']; ?></td>
            <td><button type="button" class="btn btn-primary" onclick="javascript:location.href='<?php echo site_url('admin/device/repair/view/').$id; ?>'">檢視資料</button></td>
            <td><button type="button" class="btn btn-warning" onclick="javascript:location.href='<?php echo site_url('admin/device/repair/update/').$id; ?>'">修改</button></td>
            <td><button type="button" class="btn btn-danger" onclick="javascript:location.href='<?php echo site_url('admin/device/repair/delete/').$id; ?>'">刪除</button></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>
  </body>
</html>
