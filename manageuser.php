<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理頁面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--引入css檔案-->
    <link rel="stylesheet" type="text/css" href="/PHP PDO CRUD/css/style.css" />
</head>
<body onload="LoadData();">
    <div class="container">
        <div class="alert alert alert-primary" role="alert">
            <h2 class="text-primary text-center" style="font-family:微軟正黑體;"><b>◯◯◯◯有限公司</b></h2>
            <h4 class="text-primary text-center" style="font-family:微軟正黑體;"><b>儀器查詢系統</b></h4>
        </div>

        <?php
            include_once 'userdata.php';
            include_once 'deleteuser.php';
        ?>
        
        <?php 
            if ($_SESSION['Identity'] == 'Administrator'){
        ?>
                <div style="float:left;">
                    <table>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserModal" id="adduserbtn">新增使用者</button>&nbsp;
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger deletebtn" onclick="Delete()" disabled>刪除</button>
                            </td>
                        </tr>
                    </table>
                </div>
        <?php
            }
        ?>

        <div style="float:right;">
            <table>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='index.php';">回上頁</button>
                    </td>
                </tr>
            </table>
        </div>
        
        <div style="height:25px;clear:both;"></div>

        <table class="table" id="usersdata" style="table-layout:fixed;word-wrap:break-word;"></table>
    </div>

    <!-- Delete Data Modal -->
    <div class="modal fade" id="deleteusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">刪除使用者資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteuser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_userid" id="delete_userid">
                        <h4>確定要刪除勾選的資料嗎？</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                        <button type="submit" name="deleteuserdata" class="btn btn-primary">是</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            //用js或php動態產生的html,要使用此種綁定方式(JQuery解法)
            $(document).on('click','.editbtn',function(){
                $('#edituserModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                //console.log(data);
                //console.log(data.length);
                //console.log(data[3]);
                
                var identityID = 0;
                var identity;

                if (data.length == 5){
                    identity = data[3].trim();
                }
                else if (data.length == 4){
                    identity = data[2].trim();
                }

                switch (identity){
                    case "管理員":
                        identityID = 1;
                        break;
                    case "一般使用者":
                        identityID = 2;
                        break;
                    case "檢視人員":
                        identityID = 3;
                        break;
                }
                $('#update_UserID').val(data[0].trim());
                $('#editpermission').val(identityID);

                //管理員只能修改其他人的權限,而一般使用者及檢視人員皆無法修改權限
                var UserID = "<?php echo $_SESSION['Id']; ?>";
                var Update_UserID = $('#update_UserID').val();
                var Identity = "<?php echo $_SESSION['Identity']; ?>";
                //console.log(UserID);
                //console.log(Update_UserID);
                //console.log(Identity);
                //console.log(UserID == Update_UserID);

                if (Identity == "Administrator" && UserID != Update_UserID){
                    $('#UserPermission').css("display","block");
                    //console.log("顯示權限");
                }

                if (Identity == "Administrator" && UserID == Update_UserID){
                    $('#UserPermission').css("display","none");
                    //console.log("不顯示管理員權限");
                }
                
            });
        });

        function LoadData(){
            let table = $("#usersdata");

            $.ajax({
                url:"dataresult.php",
                method:"GET",

                success:function(data){
                    //console.log(data);
                    table.html(data);
                }
            });
        }
        //let table = $('#usersdata');
        //table.html('<thead><tr><th>使用者帳號</th><th>權限</th></tr></thead><tbody style="text-align:center;"><tr><td>jfdajslk</td><td>一般使用者</td></tr><tr><td>fjlads</td><td>管理員</td></tr></tbody>');

        //全選與取消全選資料
        function Choose(){
            //全選
            if ($("#checkalluser").prop("checked")){
                $("input[name='users_check[]']").each(function(){
                    $(this).prop("checked",true);
                    $('.deletebtn').prop("disabled",false);
                });
            }
            //取消全選
            else{
                $("input[name='users_check[]']").each(function(){
                    $(this).prop("checked",false);
                    $('.deletebtn').prop("disabled",true);
                });
            }
        }

        //啟用刪除按鈕
        function ActivateBtn(){
            //console.log($("input[name='users_check[]']:checked"));
            if ($("input[name='users_check[]']:checked").length){
                $('.deletebtn').prop("disabled",false);
            }
            else{
                $('.deletebtn').prop("disabled",true);
            }
        }

        //刪除資料
        function Delete(){
            var UserIdArray = [];
            $("input[name='users_check[]']").each(function(){
                if (this.checked){
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    //console.log(data[0].trim());
                    UserIdArray.push("'" + data[0].trim() + "'");
                }
            });
            //console.log(IdArray);
            //console.log(UserIdArray);
            $('#deleteusermodal').modal('show');
            $('#delete_userid').val(UserIdArray);
            //console.log($('#delete_id').val());
        }
    </script>
</body>
</html>