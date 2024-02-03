<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

        include_once 'config.php';

        header("Content-Type:application/xls;charset=UTF-8");
        header("Content-Disposition:attachment;filename=download.xls");

        $output = '';

        if (isset($_POST["export_excel"])){
            $query = "SELECT `name`, `ins`, `time`, `sn`, `remarks` FROM `eikentable`";

            if (isset($_POST["SearchTemp"])){
                $SearchTxt = $_POST["SearchTemp"];
                $query .= " WHERE `name` Like '%$SearchTxt%' Or 
                `ins` Like '%$SearchTxt%' Or `time` Like '%$SearchTxt%' Or `sn` Like '%$SearchTxt%'
                Or `remarks` Like '%$SearchTxt%'";
            }

            $result = mysqli_query($connection,$query);
            if (mysqli_num_rows($result) > 0){
                $output .= '
                    <table class="table" border="1">
                        <tr>
                            <th>醫院名稱</th>
                            <th>儀器</th>
                            <th>裝機時間</th>
                            <th>序號</th>
                            <th>備註</th>
                        </tr>
                ';
                while($row = mysqli_fetch_array($result)){
                    $output .='
                        <tr style="text-align:center;">
                            <td>'.$row["name"].'</td>
                            <td>'.$row["ins"].'</td>
                            <td>'.$row["time"].'</td>
                            <td>'.$row["sn"].'</td>
                            <td>'.$row["remarks"].'</td>
                        </tr>
                    ';
                }
                $output .= '</table>';
                echo $output;
            }
        }

    ?>
</body>
</html>

