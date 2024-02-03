<?php
    require_once "Classes/PHPExcel.php";
    require_once "Classes/PHPExcel/IOFactory.php";
    session_start();

    $uploadfile=$_FILES['uploadfile']['tmp_name'];

    $objExcel = PHPExcel_IOFactory::load($uploadfile);

    foreach ($objExcel->getWorksheetIterator() as $worksheet){
        //TRUE:成功狀態,FALSE:失敗狀態
        $success = TRUE;
        $highestrow = $worksheet->getHighestRow();

        for ($row=6;$row<=$highestrow;$row++){
            $name = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
            $ins = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
            $time = $worksheet->getCellByColumnAndRow(2,$row)->getFormattedValue();
            $sn = $worksheet->getCellByColumnAndRow(3,$row)->getValue(); 
            $remarks = $worksheet->getCellByColumnAndRow(4,$row)->getValue(); 

            //欄位空白造成格式錯誤
            if ($name == '' || $ins == '' || $sn == ''){
                //echo "<script>console.log('資料有空白!!!');</script>";
                $success = FALSE;
                break;
            }

            //處理特殊符號
            $All_Field = array($name,$ins,$sn,$remarks);
            foreach ($All_Field as $Field){
                if(preg_match('/\'\"\<\>\?\/\\\|\*/', $Field)){
                    //echo "<script>console.log('特殊符號!!!');</script>";
                    $success = FALSE;
                    break;
                }
            }

            if ($time != ''){
                //處理日期(不包含/符號,不符合日期格式)
                if (!str_contains($time,'/')){
                    //echo "<script>console.log('日期不包含/,不符合日期格式!!!');</script>";
                    $success = FALSE;
                    break;
                }
    
                //echo "<script>console.log('". $time ."');</script>";
                //echo "<script>console.log('". $row ."');</script>";

                //處理日期的兩種格式(文字型態:年/月/日,日期型態:月/日/年)
                $date_arr = explode("/",$time);

                if (strlen($date_arr[0]) == 2){
                    $month = $date_arr[0];
                    $day = $date_arr[1];
                    $year = $date_arr[2];
                }
                
                if (strlen($date_arr[0]) == 4){
                    $year = $date_arr[0];
                    $month = $date_arr[1];
                    $day = $date_arr[2];
                }

                //檢查日期是否合法
                if (!checkdate($month,$day,$year)){
                    //echo "<script>console.log('沒有此天日期!!!');</script>";
                    $success = FALSE;
                    break;
                }
            }         
        }

        //成功寫進資料庫中
        if ($success){
            for ($row=6;$row<=$highestrow;$row++){
                $count = $row - 5;
                $name = trim($worksheet->getCellByColumnAndRow(0,$row)->getValue());
                $ins = trim($worksheet->getCellByColumnAndRow(1,$row)->getValue());
                $time = trim($worksheet->getCellByColumnAndRow(2,$row)->getFormattedValue());
                $sn = trim($worksheet->getCellByColumnAndRow(3,$row)->getValue());
                $remarks = trim($worksheet->getCellByColumnAndRow(4,$row)->getValue());
                $UserID = $_SESSION["Id"]; 

                if ($time == ''){
                    $time = '0000-00-00';
                }
                else{
                    //日期從2/18/2017轉化成2017/2/18
                    $time = date("Y-m-d",strtotime($time));
                }

                include_once 'config.php';

                $query = "INSERT INTO `eikentable`(`name`, `ins`, `time`, `sn`, `remarks`,`UserID`) VALUES ('$name','$ins','$time','$sn','$remarks','$UserID')";
                $query_run = mysqli_query($connection, $query);

                //成功寫入資料庫
                if ($query_run){
                    echo '<span>第'.$count.'筆資料匯入成功!!!</span>';
                }
                echo '<br>';
            }
        }
        //Excel格式有誤,回到首頁讓使用者重選檔案
        else{
            echo "<script>alert('請檢查Excel欄位格式或包含特殊符號[\' \" <> ? / \\ | *]!!!');window.location.href='index.php';</script>";
        }
    }
?>

<button type="button" class="btn btn-secondary" onclick="backIndex()">回首頁</button>

<script>
    function backIndex(){
        location.href = "index.php";
    }
</script>