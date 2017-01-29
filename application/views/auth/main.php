    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">操作已完成</div>
        <?php } ?>
        <?php if(isset($_GET['failed'])) { ?>
        <div class="alert alert-warning" role="alert">操作失敗，請聯絡系統管理員</div>
        <?php } ?>
        <h1>帳戶管理系統</h1><hr>
        <button type="button" class="btn btn-default" onclick="location.href='<?php echo $add_url; ?>'">新增資料</button><br>
        <table class="table">
            <tr>
                <td>帳戶名稱</td>
                <td>修改帳號</td>
                <td>修改密碼</td>
                <td>刪除</td>
            </tr>
            <?php foreach ($usr_data as $row) { ?>
            <tr>
                <?php $id = $row['uid']; ?>
                <td><?php echo $row['uUsername']; ?></td>
                <td><button type="button" class="btn btn-default" onclick="location.href='<?php echo $updateUsr_url.$id;?>'">修改管理者名稱</button></td>
                <td><button type="button" class="btn btn-default" onclick="location.href='<?php echo $updatePwd_url.$id;?>'">修改管理者密碼</button></td>
                <td>
                  <?php if($id != 1){ ?>
                  <button type="button" class="btn btn-warning" onclick="location.href='<?php echo $delete_url.$id;?>'">刪除</button>
                  <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
