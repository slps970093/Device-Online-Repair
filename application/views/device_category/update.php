    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>修改裝置分類</h1>
        <hr>
        <?php validation_errors(); ?>
        <?php echo form_open('admin/device/category/update'); ?>
          <input type="hidden" name="id" value="<?php echo $result['id']; ?>" class="form-control">
          <label for="name">名稱</label>
          <input type="text" name="name" value="<?php echo $result['dc_name']; ?>" class="form-control">
          <input type="submit" name="submit" value="送出" class="btn btn-default">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
