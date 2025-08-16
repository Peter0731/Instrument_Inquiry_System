<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="icon" href="/PHP PDO CRUD/icons/logo_icon.jpg" />-->
    <title>PHP PDO CRUD</title>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--<script src="js/script.js"></script>-->
    <!--引入css檔案-->
    <link rel="stylesheet" type="text/css" href="/PHP PDO CRUD/css/style.css" />
</head>

<body onload="Search();">

    <!-- 網站標題 -->
    <div class="container">
        <div class="alert alert alert-primary" role="alert">
            <h2 class="text-primary text-center" style="font-family:微軟正黑體;"><b>◯◯◯◯有限公司</b></h2>
            <h4 class="text-primary text-center" style="font-family:微軟正黑體;"><b>儀器查詢系統</b></h4>
        </div>

        <div style="margin-bottom:16px;height:36px;text-align:right">
            帳號：<span id="acc"></span>&nbsp;&nbsp;&nbsp;身分：<span id="pwd"></span>&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="LogOut()">登出</button>
        </div>

        <!-- 匯入元素 -->
        <?php
            include_once 'form.php';
            include_once 'ImportData.php';
            include_once 'deletecode.php';
        ?>

        <div class="row mb-3">

            <!-- 按鈕樣式 -->
            <div class="col-3">

                <?php
                    if ($_SESSION['Identity'] == "Administrator" || $_SESSION['Identity'] == "User"){
                ?>
                        <!-- 新增按鈕 -->
                        <!-- #userModal→form.php -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" id="addnewbtn">新增資料</button>&nbsp;
                <?php
                    }
                ?>
                <button type="button" class="btn btn-primary" id="managedata" onclick="location.href='manageuser.php';">編輯使用者資料</button>
            </div>

            <!-- 搜尋列 -->
            <div class="col-9">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="搜尋..." id="searchinput">
                    <button style="margin-left:5px;" type="button" class="btn btn-primary" data-toggle="modal" id="searchbtn">搜尋</button>
                    <button style="margin-left:5px;" type="button" class="btn btn-primary" data-toggle="modal" id="clearbtn">重置</button>
                </div>
            </div>
        </div>

        <div style="float:left;">
            <table>
                <tr>
                    <?php
                        if ($_SESSION['Identity'] == "Administrator" || $_SESSION['Identity'] == "User"){
                    ?>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImportModal" id="Importbtn"> 匯入資料</button>&nbsp;
                            </td>
                    <?php
                        }
                    ?>
                    <td>
                        <form action="excel.php" method="POST">
                            <!--隱藏值存放查詢條件-->
                            <input type="hidden" class="form-control" id="SearchTemp" name="SearchTemp" value="">
                            <input type="submit" name="export_excel" class="btn btn-primary" value="匯出資料">&nbsp;
                        </form>
                    </td>

                    <?php
                        if ($_SESSION['Identity'] == "Administrator" || $_SESSION['Identity'] == "User"){
                    ?>
                            <td>
                                <button type="button" class="btn btn-danger deletebtn" onclick="Delete()" disabled>刪除</button>
                            </td>
                    <?php
                        }
                    ?>
                </tr>
            </table>
        </div>
        <div style="float:right;padding-top:7px;">
            <label>資料列數：</label>
            <select name="datacol" id="datacol">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="0" selected>不換頁</option>
            </select>
        </div>
        
        <div style="height:25px;clear:both;"></div>

        <!-- eikentable -->
        <!-- 問題: 欄位資料為全英文或數字會出現超出表格設定的寬度
             解決: table-layout:fixed達到由欄位寬度的設定值
                   word-wrap達到自動換行的效果
        -->
        <table class="table" id="userstable" style="table-layout:fixed;word-wrap:break-word;"></table>
        <div id="showlinks"></div>
        <div id="searchdata" style="text-align:right;">共&nbsp;<span id="count"></span>&nbsp;筆資料</div>
    </div>

    <!-- Delete Data Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">刪除資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h4>確定要刪除勾選的資料嗎？</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">是</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            if (sessionStorage.Account && sessionStorage.Identity){
                $('#acc').html(sessionStorage.Account);
                $('#pwd').html(sessionStorage.Identity);
            }
            else{
                alert("請先登入才能操作此系統!!!");
                location.href = "login.php";
            }

            //點選超連結到某頁會重整頁面,因此需要將下拉選單重新回填
            if (sessionStorage.SelectVal){
                $('#datacol').val(sessionStorage.SelectVal);
            }

            if (sessionStorage.SearchData){
                $('#searchinput').val(sessionStorage.SearchData);
            }

            $('#searchinput').on('keydown',function(e){
                if (e.keyCode == 13){
                    sessionStorage.setItem("SearchData",$(this).val());
                    location.href = "index.php";
                    Search();
                }
            });

            $('#searchbtn').on('click',function(){
                var SearchInput = $("#searchinput").val().trim();
                sessionStorage.setItem("SearchData",SearchInput);
                location.href = "index.php";
                Search();
            });

            $('#clearbtn').on('click',function(){
                $('#searchinput').val("");
                sessionStorage.setItem("SearchData","");
                location.href = "index.php";
                Search();
            });

            $('#datacol').on('change',function(){
                var CurrentVal = $(this).val();
                sessionStorage.setItem("SelectVal",CurrentVal);
                var SearchTxt = $("#searchinput").val().trim();
                sessionStorage.setItem("SearchData",SearchTxt);
                location.href = "index.php";
                Search();
            });

            //用js或php動態產生的html,要使用此種綁定方式(JQuery解法)
            $(document).on('click','.editbtn',function(){
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                //console.log(data);

                $('#update_id').val(data[0].trim());
                $('#update_hname').val(data[2].trim());
                $('#update_ins').val(data[3].trim());
                $('#update_time').val(data[4].trim());
                $('#update_sn').val(data[5].trim());
                $('#update_remarks').val(data[6].trim());
            });
        });


        //搜尋資料
        function Search(){
            var SearchText = "";
            //console.log(SearchText);
            var Coldata = 0;
            if (sessionStorage.SelectVal){
                Coldata = sessionStorage.SelectVal;
            }
            if (sessionStorage.SearchData){
                SearchText = sessionStorage.SearchData;
            }
            var CurrentPage = <?php echo isset($_GET["page"])?$_GET["page"]:1; ?>;
            
            //console.log(CurrentPage);
            //console.log(SearchText);
                    
            $.ajax({
                url:"SearchResult.php",
                method:"POST",
                data:{SearchInput:SearchText,Coldata:Coldata,CurrentPage:CurrentPage},

                success:function(data){
                    $('#SearchTemp').val(SearchText);
                    //console.log(data);
                    //alert($('#caldata').val());
                    $('#userstable').html(data);
                    $('#count').html($('#caldata').val());
                    ShowLink($('#pagedata').val(),CurrentPage);
                    //console.log($('#pagedata').val());
                    //console.log(CurrentPage);
                }
            });
        }

        //顯示所有超連結
        function ShowLink(TotalPage,CurrentPage){
            var links = '';

            //沒有上一頁
            if (CurrentPage == 1 && CurrentPage < TotalPage){
                var i = CurrentPage;
                while (i <= TotalPage){
                    if (i == 1){
                        links += '<label>' + i + '</label>&nbsp;';
                    }
                    else{
                        links += '<a href="index.php?page=' + i + '">' + i + '</a>&nbsp;';
                    }
                    i++;
                }
                links += '<a href="index.php?page=' + (CurrentPage + 1) + '">下一頁</a>';
            }
            
            //沒有下一頁
            if (CurrentPage > 1 && CurrentPage == TotalPage){
                links = '<a href="index.php?page=' + (CurrentPage - 1) + '">上一頁</a>&nbsp;';
                for (var i = 1;i<=TotalPage;++i){
                    if (i == TotalPage){
                        links += '<label>' + i + '</label>&nbsp;';
                    }
                    else{
                        links += '<a href="index.php?page=' + i + '">' + i + '</a>&nbsp;';
                    }
                }   
            }
            
            //有上下頁
            if (CurrentPage > 1 && CurrentPage < TotalPage){
                var i = 1;
                links = '<a href="index.php?page=' + (CurrentPage - 1) + '">上一頁</a>&nbsp;';
                while (i <= TotalPage){
                    if (i == CurrentPage){
                        links += '<label>' + i + "</label>&nbsp;";
                    }
                    else{
                        links += '<a href="index.php?page=' + i + '">' + i + '</a>&nbsp;';
                    }
                    i++;
                }
                links += '<a href="index.php?page=' + (CurrentPage + 1) + '">下一頁</a>';
            }

            //沒有上下頁
            if (CurrentPage == 1 && TotalPage == 1){
                links = '<label>' + CurrentPage + '</label>';
            }

            $("#showlinks").html(links);
        }

        //全選與取消全選資料
        function Choose(){
            //全選
            if ($("#checkall").prop("checked")){
                $("input[name='user_check[]']").each(function(){
                    $(this).prop("checked",true);
                    $('.deletebtn').prop("disabled",false);
                });
            }
            //取消全選
            else{
                $("input[name='user_check[]']").each(function(){
                    $(this).prop("checked",false);
                    $('.deletebtn').prop("disabled",true);
                });
            }
        }

        //啟用刪除按鈕
        function ActivateBtn(){
            //console.log($("input[name='user_check[]']:checked"));
            if ($("input[name='user_check[]']:checked").length){
                $('.deletebtn').prop("disabled",false);
            }
            else{
                $('.deletebtn').prop("disabled",true);
            }
        }

        //刪除資料
        function Delete(){
            var IdArray = [];
            $("input[name='user_check[]']").each(function(){
                if (this.checked){
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    //console.log(data[0].trim());
                    IdArray.push(parseInt(data[0].trim()));
                }
            });
            //console.log(IdArray);
            $('#deletemodal').modal('show');
            $('#delete_id').val(IdArray);
            //console.log($('#delete_id').val());
        }

        //登出資料
        function LogOut(){
            //清除所有sessionStorage的資料並回到登入頁面
            sessionStorage.clear();
            location.href = "login.php";
        }   
    </script>
</body>
</html>