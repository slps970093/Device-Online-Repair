<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h1>修改管理者密碼</h1>
      <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/auth/pwd_update'); ?>
            <label for="id"></label>
            <input name="id" type="hidden" value="<?php echo $target_data['uid']; ?>">
            <label for="username">帳號</label>
            <input type="text" name="username" class="form-control" readonly="readonly" value="<?php echo $target_data['uUsername'];?>">
            <label for="password">密碼</label>
            <input type="password" name="password" class="form-control">
            <input type="submit" name="submit" class="btn btn-default" value="送出" />
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
