<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>PHP PDO CRUD</title>
</head>

<body>
    <div style="font-family:微軟正黑體;">
        <h1 style="margin:auto;display:block;" align="center">◯◯◯◯有限公司</h1>
        <h2 style="margin:auto;display:block;" align="center">儀器查詢系統</h2><br>
        <h2 style="color:red;margin:auto;display:block;" align="center">（測試模式）</h2>
    </div>

    <div style="height:30px;"></div>

    <form style="font-family:微軟正黑體;width:250px;margin:auto;">
        <span style="font-size:20px;"><b>登入</b></span>
        <p>
            <input type="text" style="width:242px;height:25px;font-size:18px;" id="account" name="account" placeholder="請輸入帳號" autocomplete="off" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
        </p>
        <p>
            <input type="password" style="width:242px;height:25px;font-size:18px;" id="password" name="password" placeholder="請輸入密碼" autocomplete="off" required="required" onkeyup="value=value.replace(/[\'\<\>\?\/\\\|\*\&quot]/g,'')">
        </p>
        <p>
            <button id="login" type="button" style="width:100px;height:35px;font-size:16px;">登入</button>
        </p>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            //判斷按下Enter
            $(document).on('keydown',function(e){
                if (e.keyCode == 13){
                    //alert("You press Enter!!!");
                    Login();
                }
            });

            //點擊登入按鈕觸發
            $('#login').on('click',Login);
        });
        

        function Login(){
            var account = $('#account').val().trim();
            var pwd = $('#password').val().trim();

            if (account == '' || pwd == ''){
                alert("請檢查帳號或密碼是否有輸入!!!");
                return false;
            }
            
            $.ajax({
                url:"login-verification.php",
                method:"POST",
                data:{Account:account,Password:pwd},

                success:function(data){
                    var Information = data.split(',');
                    //console.log(Information);
                    var LoginUserID = Information[0];
                    var LoginState = Information[1];
                    var LoginIdentity = Information[2];
                    //alert(LoginState+','+LoginIdentity);
                    if (LoginState){
                        alert('登入成功!!!');
                        sessionStorage.setItem("Account",account);
                        switch (LoginIdentity){
                            case 'Administrator':
                                sessionStorage.setItem("Identity","管理員");
                                break;
                            case 'User':
                                sessionStorage.setItem("Identity","一般使用者");
                                break;
                            case 'Viewer':
                                sessionStorage.setItem("Identity","檢視人員");
                                break;
                        }
                        sessionStorage.setItem("UserID",LoginUserID);
                        location.href = "index.php";
                    }
                    else{
                        alert('查無此人無法登入!!!');
                    }
                }
            });
        }
    </script>
</body>
</html>