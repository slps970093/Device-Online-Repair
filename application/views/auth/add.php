<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h1>新增管理者</h1>
      <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/auth/add'); ?>

            <label for="username">帳號</label>
            <input type="text" name="username" class="form-control">
            <label for="password">密碼</label>
            <input type="password" name="password" class="form-control">
            <input type="submit" name="submit" class="btn btn-default" value="送出" />
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
</html>
