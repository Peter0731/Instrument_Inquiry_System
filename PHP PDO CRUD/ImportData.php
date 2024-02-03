<div class="modal fade" id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="ImportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">

            <!-- 表格標題 -->
            <h5 class="modal-title" id="exampleModalLabel">匯入資料</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div>
                <label>步驟1:</label><br>
                <button type="button" id="download" name="download" class="btn btn-primary" onclick="location.href='src/Import_Template.xlsx'">下載範本</button>
                <br>
            </div>

            <div style="height:40px;"></div>
            <div>
                <label>步驟2:</label><br>
                <form id="report_form" action="file-upload.php" method="POST" enctype="multipart/form-data">
                    <!--accept只接受xls和xlsx檔案-->
                    <input type="file" id="uploadfile" name="uploadfile" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                    <button type="button" name="import_excel" class="btn btn-primary" onclick="submitFile()">上傳</button>
                </form>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
    //上傳Excel檔案
    function submitFile(){
        var InputFile = $("#uploadfile").get(0).files[0];
        //alert(InputFile);
        if (InputFile){
            $("#report_form").submit();
        }
        else{
            alert("請選擇匯入的檔案!!!");
        }
    }
</script>