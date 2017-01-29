    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>更新設備故障資料</h1>
        <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/device/repair/update'); ?>
          <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
          <label for="category">設備分類</label>
          <select name="category" class="form-control">
            <?php foreach ($device_category_lst as $row) { ?>
              <?php $id =  $row['id']; ?>
              <?php if($id == $result['device_category']){ ?>
                <option value="<?php echo $id; ?>" selected="selected"><?php echo $row['dc_name']; ?></option>
              <?php }else{ ?>
                <option value="<?php echo $id; ?>"><?php echo $row['dc_name']; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
          <label for="name">設備名稱</label>
          <select name="name" class="form-control">
            <?php foreach ($device_name_lst as $row) { ?>
            <?php $id =  $row['id']; ?>
            <?php if($id == $result['device_name']){ ?>
              <option value="<?php echo $id; ?>" selected="selected"><?php echo $row['dn_name']; ?></option>
            <?php }else{ ?>
              <option value="<?php echo $id; ?>"><?php echo $row['dn_name']; ?></option>
            <?php } ?>
            <?php } ?>
          </select>
          <label for="location">位置</label>
          <input type="text" name="location" class="form-control" value="<?php echo $result['location']; ?>">
          <label for="fault">故障分類</label>
          <select name="fault" class="form-control">
            <?php foreach ($fault_category_lst as $row) { ?>
              <?php $id =  $row['id']; ?>
              <?php if($id == $result['fault_category']){ ?>
                <option value="<?php echo $id; ?>" selected="selected"><?php echo $row['fc_name']; ?></option>
              <?php }else{ ?>
                <option value="<?php echo $id; ?>"><?php echo $row['fc_name']; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
          <label for="remark">備註</label>
          <textarea name="remark" rows="8" cols="80" class="form-control" ><?php echo $result['description']; ?></textarea>
          <h3>管理者自行新增或修改</h3>
          <hr>
          <label for="status">維修狀態</label>
          <select class="form-control" name="status">
            <?php foreach ($repair_status_lst as $row) { ?>
              <?php $id = $row['id']; ?>
              <?php if($id == $result['is_status']){ ?>
                <option value="<?php echo $id; ?>" selected="selected"><?php echo $row['StatusName']; ?></option>
              <?php }else{ ?>
                <option value="<?php echo $id; ?>"><?php echo $row['StatusName']; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
          <label for="description">說明</label>
          <textarea name="description" rows="8" cols="80" class="form-control">
            <?php echo $result['description']; ?>
          </textarea>
          <input type="submit" name="submit" class="btn btn-default" value="送出">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
