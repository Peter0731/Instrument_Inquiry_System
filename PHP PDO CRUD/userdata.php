<?php
    include_once 'insertuser.php';
    include_once 'updateuser.php';
?>

<!-- add form modal -->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <!-- 表格標題 -->
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-text-o" aria-hidden="true"></i> 新增使用者</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="adduser" method="POST" enctype="multipart/form-data">

        <!-- 使用者帳號 -->
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">使用者帳號：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-hospital-o" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="account" name="account" required="required" autocomplete="off" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 使用者密碼 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">使用者密碼：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
              </div>
              <input type="password" class="form-control" id="pwd" name="pwd" required="required" autocomplete="off" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 使用者權限 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">使用者權限：</label>
            <div class="input-group mb-3">
              <select name="permission" id="permission" required="required">
                <option value="">請選擇</option>
                <option value="1">管理員</option>
                <option value="2">一般使用者</option>
                <option value="3">檢視人員</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="insertuser" name="insertuser">確定</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add form modal end -->

<!-- edit form modal start -->
<div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <!-- 表格標題 -->
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-text-o" aria-hidden="true"></i> 編輯使用者</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edituserform" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
          <input type="hidden" id="update_UserID" name="update_UserID">

          <!-- 使用者密碼 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">使用者密碼：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
              </div>
              <input type="password" class="form-control" id="editpwd" name="editpwd" autocomplete="off" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>
          <!-- 使用者權限 -->
          <div id="UserPermission" class="form-group" style="display:none;">
            <label for="message-text" class="col-form-label">使用者權限：</label>
            <div class="input-group mb-3">

              <select name="editpermission" id="editpermission" required="required">
                <option value="">請選擇</option>
                <option value="1">管理員</option>
                <option value="2">一般使用者</option>
                <option value="3">檢視人員</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="edituser" name="edituser">確定</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add form modal end -->
