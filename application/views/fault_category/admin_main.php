    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">操作已完成</div>
        <?php } ?>
        <?php if(isset($_GET['failed'])) { ?>
        <div class="alert alert-warning" role="alert">操作失敗，請聯絡系統管理員</div>
        <?php } ?>
        <h1>故障分類管理</h1><hr>
        <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo site_url('admin/fault/category/add'); ?>'">新增</button>
        <table class="table">
          <tr>
            <td>編號</td>
            <td>名稱</td>
            <td>修改</td>
            <td>刪除</td>
          </tr>
          <?php foreach ($result as $row) { ?>
          <?php $id = $row['id']; ?>
          <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $row['fc_name']; ?></td>
            <td><button type="button" class="btn btn-warning" onclick="javascript:location.href='<?php echo site_url('admin/fault/category/update/').$id; ?>'">修改</button></td>
            <td><button type="button" class="btn btn-danger" onclick="javascript:location.href='<?php echo site_url('admin/fault/category/delete/').$id; ?>'">刪除</button></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
