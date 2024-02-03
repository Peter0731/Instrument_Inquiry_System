    <?php
        session_start();
    ?>
    <thead>
        <tr>
            <th style="display:none;">編號</td>
            <?php
                if ($_SESSION["Identity"] == 'Administrator'){
            ?>
                    <th><input type="checkbox" id="checkalluser" name="checkalluser" onclick="Choose()" />&nbsp;<span>選取</span></th>
            <?php
                }
            ?>
            <th>帳號</td>
            <th>權限</td>
            <th>編輯</th>
        </tr>
    </thead>

    <?php
        include_once 'config.php';

        $Idenrity = $_SESSION['Identity'];
        $Id = $_SESSION['Id'];
        if ($Idenrity == 'Administrator'){
            $query = "SELECT u.UserID,u.Account,ur.RoleID FROM `users` AS u JOIN `usersrole` AS ur ON u.UserID = ur.UserID";
        }
        else{
            $query = "SELECT u.UserID,u.Account,ur.RoleID FROM `users` AS u JOIN `usersrole` AS ur ON u.UserID = ur.UserID WHERE u.UserID = '$Id'";
        }
        
        $query_run = mysqli_query($connection, $query);
    ?>

    <tbody style="text-align:center;">
        <?php
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
        ?>
                        
                    <tr>
                        <td style="display:none;"> <?php echo $row['UserID']; ?> </td>
                        <?php
                            if ($_SESSION["Identity"] == 'Administrator' && $_SESSION["Id"] != $row['UserID']){
                        ?>
                                <td style="vertical-align:middle;"> <?php echo '<input type="checkbox" id="check_' . $row['UserID'] .'" name="users_check[]" onclick="ActivateBtn()"/>'; ?> </td>
                        <?php
                            }
                            else if ($_SESSION["Identity"] == 'Administrator' && $_SESSION["Id"] == $row['UserID']){
                        ?>
                                <td style="vertical-align:middle;"></td>
                        <?php
                            }
                        ?>
                        
                        <td style="vertical-align:middle;"> <?php echo $row['Account']; ?> </td>
                        <td style="vertical-align:middle;"> 
                            <?php 
                                switch ($row['RoleID']){
                                    case 1:
                                        echo "管理員";
                                        break;
                                    case 2:
                                        echo "一般使用者";
                                        break;
                                    case 3:
                                        echo "檢視人員";
                                        break;
                                } 
                            ?> 
                        </td>
                        <td style="vertical-align:middle;">
                            <button type="button" class="btn btn-success editbtn">編輯</button>
                        </td> 
                    </tr>
        <?php
                }
            }
        ?>
    </tbody>
