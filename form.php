<?php
include_once 'insertcode.php';
include_once 'updatecode.php';
?>

<!-- add form modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <!-- 表格標題 -->
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-text-o" aria-hidden="true"></i> 新增資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">

        <!-- 醫院名稱 -->
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">醫院名稱：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-hospital-o" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="hname" name="hname" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 儀器 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">儀器：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="ins" name="ins" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 裝機時間 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">裝機時間：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="time" name="time">
            </div>
          </div>

          <!-- 序號 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">序號：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="sn" name="sn" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 備註 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">備註：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-commenting" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="remarks" name="remarks" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>
          
          <input type="hidden" id="insert_UserID" name="insert_UserID">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary" id="insertdata" name="insertdata">確定</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add form modal end -->

<!-- edit form modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <!-- 表格標題 -->
        <h5 class="modal-title" id="editModalLabel"><i class="fa fa-file-text-o" aria-hidden="true"></i> 編輯資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editform" method="POST" enctype="multipart/form-data">

        <input type="hidden" id="update_id" name="update_id" />
        <!-- 醫院名稱 -->
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">醫院名稱：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-hospital-o" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="update_hname" name="update_hname" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 儀器 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">儀器：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="update_ins" name="update_ins" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 裝機時間 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">裝機時間：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="update_time" name="update_time">
            </div>
          </div>

          <!-- 序號 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">序號：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="update_sn" name="update_sn" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <!-- 備註 -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">備註：</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-commenting" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="update_remarks" name="update_remarks" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
            </div>
          </div>

          <input type="hidden" id="update_UserID" name="update_UserID">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary" id="editdata" name="editdata">確定</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $("#insert_UserID").val(sessionStorage.UserID);
  $('#update_UserID').val(sessionStorage.UserID);
</script>
<!-- edit form modal end -->