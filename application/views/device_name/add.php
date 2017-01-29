    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h1>新增設備名稱</h1>
        <hr>
        <?php validation_errors(); ?>
        <?php echo form_open('admin/device/name/add'); ?>
          <label for="name">名稱</label>
          <input type="text" name="name" class="form-control"><br>
          <input type="submit" name="submit" class="btn btn-default" value="送出">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
