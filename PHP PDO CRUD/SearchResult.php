        <?php
            session_start();
        ?>
        
        <thead>
            <tr>
                <th style="display:none;">編號</th>
                <?php
                    if ($_SESSION['Identity'] == "Administrator" || $_SESSION['Identity'] == "User"){
                ?>
                        <th><input type="checkbox" id="checkall" name="checkall" onclick="Choose()" />&nbsp;<span>選取</span></th>
                <?php
                    }
                ?>
                <th style="width:20%;">醫院名稱</th>
                <th>儀器</th>
                <th>裝機時間</th>
                <th>序號</th>
                <th style="width:30%;">備註</th>
                <th style="display:none;">使用者編號</th>
                <?php
                    if ($_SESSION['Identity'] == "Administrator" || $_SESSION['Identity'] == "User"){
                ?>
                        <th>編輯</th>
                <?php
                    }
                ?>
            </tr>
        </thead>
            <?php
                include_once 'config.php';

                //計算目前頁面的資料筆數
                $CurPageCount = 0;
                //計算全部資料
                $TotalCount = 0;
                //計算總頁數
                $Totalpage = 1;
                //echo '<script>console.log(' . $_POST["Coldata"] . ')</script>';

                if (isset($_POST['SearchInput']) && isset($_POST['Coldata']) && isset($_POST["CurrentPage"])){
                    $SearchTxt = $_POST['SearchInput'];
                    $SelectCol = $_POST['Coldata'];
                    $CurPage = $_POST['CurrentPage'];
                    
                    if ($SearchTxt == ''){
                        $query = "SELECT COUNT(`Id`) as Total FROM `eikentable`";
                        $query_run = mysqli_query($connection, $query);
                        if ($row = mysqli_fetch_array($query_run)){
                            $TotalCount = $row["Total"];
                        }
                        $query = "SELECT * FROM `eikentable`";
                    }
                    else{
                        $query = "SELECT COUNT(`Id`) as Total FROM `eikentable` WHERE `name` Like '%$SearchTxt%' Or 
                        `ins` Like '%$SearchTxt%' Or `time` Like '%$SearchTxt%' Or `sn` Like '%$SearchTxt%'
                        Or `remarks` Like '%$SearchTxt%'";
                        $query_run = mysqli_query($connection, $query);
                        if ($row = mysqli_fetch_array($query_run)){
                            $TotalCount = $row["Total"];
                        }
                        //處理搜尋範圍
                        $query = "SELECT * FROM `eikentable` WHERE `name` Like '%$SearchTxt%' Or 
                        `ins` Like '%$SearchTxt%' Or `time` Like '%$SearchTxt%' Or `sn` Like '%$SearchTxt%'
                        Or `remarks` Like '%$SearchTxt%'";
                    }

                    if ($SelectCol){
                        $Totalpage = ceil($TotalCount/$SelectCol);
                        $StartData = ($CurPage - 1) * $SelectCol;
                        $query .= " LIMIT $StartData,$SelectCol";
                    }
                    //echo '<script>console.log(' . $TotalCount . ')</script>';
                }

                $query_run = mysqli_query($connection, $query);
            ?>
            
        <tbody style="text-align:center;">
            <?php
                if (mysqli_num_rows($query_run) > 0) {
                    $CurPageCount = mysqli_num_rows($query_run);
                    foreach ($query_run as $row) {
            ?>
                        
                            <tr>
                                <td style="display:none;"> <?php echo $row['Id']; ?> </td>
                                <?php
                                    if ($_SESSION['Identity'] == "Administrator"){
                                ?>
                                        <td style="vertical-align:middle;"> <?php echo '<input type="checkbox" id="check_' . $row['Id'] .'" name="user_check[]" onclick="ActivateBtn()"/>'; ?> </td>
                                <?php
                                    }
                                ?>

                                <?php         
                                    if ($_SESSION['Identity'] == "User" && $_SESSION['Id'] == $row['UserID']){    
                                ?>
                                        <td style="vertical-align:middle;"> <?php echo '<input type="checkbox" id="check_' . $row['Id'] .'" name="user_check[]" onclick="ActivateBtn()"/>'; ?> </td>
                                <?php
                                    }
                                    else if ($_SESSION['Identity'] == "User" && $_SESSION['Id'] != $row['UserID']){
                                ?>
                                        <td style="vertical-align:middle;"></td>
                                <?php
                                    }
                                ?>
                                <td style="vertical-align:middle;"> <?php echo $row['name']; ?> </td>
                                <td style="vertical-align:middle;"> <?php echo $row['ins']; ?> </td>
                                <td style="vertical-align:middle;"> <?php if ($row['time'] != '0000-00-00') echo $row['time']; ?> </td>
                                <td style="vertical-align:middle;"> <?php echo $row['sn']; ?> </td>
                                <td style="vertical-align:middle;"> <?php echo $row['remarks']; ?> </td>
                                <td style="display:none;"> <?php echo $row['UserID']; ?> </td>

                                <?php
                                    if ($_SESSION['Identity'] == "Administrator"){
                                ?>
                                        <td style="vertical-align:middle;">
                                            <button type="button" class="btn btn-success editbtn">編輯</button>
                                        </td>
                                <?php
                                    }
                                ?>

                                <?php
                                    if ($_SESSION['Identity'] == "User" && $_SESSION['Id'] == $row['UserID']){    
                                ?>
                                        <td style="vertical-align:middle;">
                                            <button type="button" class="btn btn-success editbtn">編輯</button>
                                        </td>
                                <?php
                                    }
                                    else if ($_SESSION['Identity'] == "User" && $_SESSION['Id'] != $row['UserID']){
                                ?>
                                        <td style="vertical-align:middle;"></td>
                                <?php
                                    }
                                ?>
                            </tr>
            <?php
                    }
                } else {
            ?>
                        <tr>
                            <td colspan="<?php if ($_SESSION['Identity'] == 'Administrator' || $_SESSION['Identity'] == 'User') {echo 7;} else if ($_SESSION['Identity'] == 'Viewer') {echo 5;} ?>">
                                查無資料!!!
                            </td>
                        </tr>
        </tbody>
            <?php
                }
                echo '<input id="caldata" type="hidden" value="'.$CurPageCount.'">';
                echo '<input id="pagedata" type="hidden" value="'.$Totalpage.'">';
            ?>