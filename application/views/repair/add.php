    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>新增設備故障資料</h1>
        <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/device/repair/add'); ?>
        <label for="category">設備分類</label>
        <select name="category" class="form-control">
          <option value="" selected="selected">請選擇</option>
          <?php foreach ($device_category_lst as $row) { ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['dc_name']; ?></option>
          <?php } ?>
        </select>
        <label for="name">設備名稱</label>
        <select name="name" class="form-control">
          <option value="" selected="selected">請選擇</option>
          <?php foreach ($device_name_lst as $row) { ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['dn_name']; ?></option>
          <?php } ?>
        </select>
        <label for="location">位置</label>
        <input type="text" name="location" class="form-control">
        <label for="fault">故障分類</label>
        <select name="fault" class="form-control">
          <option value="" selected="selected">請選擇</option>
          <?php foreach ($fault_category_lst as $row) { ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['fc_name']; ?></option>
          <?php } ?>
        </select>
        <label for="remark">備註</label>
        <textarea name="remark" rows="8" cols="80" class="form-control"></textarea>
        <input type="submit" name="submit" class="btn btn-default" value="送出">
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
