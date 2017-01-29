    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>新增裝置分類</h1>
        <hr>
        <?php validation_errors(); ?>
        <?php echo form_open('admin/device/category/add'); ?>
          <label for="name">名稱</label>
          <input type="text" name="name" class="form-control">
          <input type="submit" name="submit" value="送出" class="btn btn-default">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
