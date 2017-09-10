<link rel="stylesheet" type="text/css" href="css/tooltip.css" media="screen"/>
<form action="processUpdateHead.php?id=<?php echo $master_id ?>" method="post" enctype="multipart/form-data">
    <table width="100%" class="beta">
        <tr>
            <td>Substance<span class="msg-err"><b>*</b></span></td>
            <td><input name="substance" type="text"
                       value="<?php echo !empty($substance) ? $substance : ''; ?>"
                       size="10"></td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </td>
            <td rowspan="5" width="50%">
                <div style="margin-left: 50%">
                    <b>Update Picture</b><br/><br/>
                    <input type="file" name="profile" id="profile"><br/><br/>
                    <img height="150px"
                         src="<?php echo 'img/profile/PM-' . $master_id . '.png' ?>"
                         alt="Image not found"
                         onerror="this.onerror=null;this.src='img/NoImgFound.gif';"
                    />
                </div>

            </td>
            </td>
        </tr>
        <tr>
            <td>CAS-No<span class="msg-err"><b>*</b></span></td>
            <td><input name="casno" type="text"
                       value="<?php echo !empty($casno) ? $casno : ''; ?>"
                       size="10"></td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </td>

        </tr>
        <tr>
            <td>Name<span class="msg-err"><b>*</b></span></td>
            <td><input name="name" type="text"
                       value="<?php echo !empty($name) ? $name : ''; ?>"
                       size="10"></td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>Model Type<span class="msg-err"><b>*</b></span></td>
            <td><input name="modeltype" type="text"
                       value="<?php echo !empty($modeltype) ? $modeltype : ''; ?>"
                       size="10"></td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description" rows="4" cols="50"><?php echo !empty($description) ? $description : ''; ?>
                </textarea>
            </td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>Type<span class="msg-err"><b>*</b></span></td>
            <td><input type="radio" name="type"
                       value="Rigid" <?php echo $type == "Rigid" || empty($type) ? 'checked' : '' ?>>
                Rigid &nbsp
                <input type="radio" name="type" value="Flexible"<?php echo $type == "Flexible" ? 'checked' : '' ?>>
                Flexible
            </td>
            <td>
                <div class="tooltip">[i]
                    <span class="tooltiptext"><img src="img/info.ico"></span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">Display Shielding <input type="checkbox" name="disp_sh"
                <?php
                echo $disp_sh == 0 ? '' : 'checked'
                ?>
            </td>
            <td>
                <div class="tooltip"> [i]
                    <span class="tooltiptext"> Tooltip text </span>
                </div>
            </td>
        </tr>
        <tr>
            <td>

            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td colspan="2">
                <button> Update Master Data</button>
            </td>
        </tr>

    </table>

</form>


<!--Display error-->
<?php
$sParam = 'processUpdateHead';  /*page name of processor*/
$sMsg = 'Master data updated successfully !';

if (isset($_SESSION[$sParam])) {
    if (!$_SESSION[$sParam]['success']) {
        echo '<p class="msg-err"> Errors [';
        foreach ($_SESSION[$sParam]['errors'] as $err) {
            echo $err . ', ';
        }
        echo ']</p>';

    } else {
        echo '<br/><br/><h3 class="msg-suc">' . $sMsg . ' </h3>';
    }
    unset($_SESSION[$sParam]);
}
?>


