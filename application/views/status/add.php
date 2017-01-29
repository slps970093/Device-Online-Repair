    <div class="nav">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php echo form_open('admin/device/repair/status/add'); ?>
          <label for="name">狀態名：</label>
          <input type="text" name="name" class="form-control">
          <input type="submit" name="submit" value="送出" class="btn btn-default">
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </body>
</html>
