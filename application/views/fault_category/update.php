    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>修改故障分類</h1>
        <hr>
        <?php validation_errors(); ?>
        <?php echo form_open('admin/fault/category/update'); ?>
          <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
          <label for="name">名稱</label>
          <input type="text" name="name" value="<?php echo $result['fc_name']; ?>">
          <input type="submit" name="submit" value="btn btn-default">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
