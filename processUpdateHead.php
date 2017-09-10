<?php
//going to use session var
session_set_cookie_params(0);
session_start();
require 'database.php';
require_once 'funcation/fileFunc.php';

$errors = array();      // array to hold validation errors
$data = array();      // array to pass back data

/* Validation */

//inputdata
if (!empty($_POST)) {
    if (empty($_POST['substance']))
        $errors['substance'] = 'Substance required field';
    if (empty($_POST['casno']))
        $errors['casno'] = 'casno required field';
    if (empty($_POST['name']))
        $errors['name'] = 'name required field';
    if (empty($_POST['modeltype']))
        $errors['modeltype'] = 'modeltype required field';
} else {
    $errors['post'] = 'Empty form can not submit , Please add molecule detail';
}

//profile image
$allowedSize = 5000000;
$allowedFtypes = array('.jpg', '.gif', '.bmp', '.png');
if (!empty($_FILES['profile']['tmp_name'])) {
    if (!in_array(getExt($_FILES['profile']['name']), $allowedFtypes))//should be image
        $errors['profileType'] = 'Profile image  should be image file : .jpg,.gif,.bmp, .png ';
    if (!validateSize($_FILES['profile']['size'], $allowedSize))//less then 5 MB
        $errors['profileSize'] = 'File should be less then 5 MB';
}

/*
 * if no errors then operate
 * */
$master_id = $_GET['id'];

var_dump($_POST['disp_sh']);
if (empty($errors)) {
//declare
    $substance = $_POST['substance'];
    $casno = $_POST['casno'];
    $name = $_POST['name'];
    $modeltype = $_POST['modeltype'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $disp_sh = isset($_POST['disp_sh']) ? 1 : 0;


    try {
        // update data
        $db = new Database();
        $db->update('UPDATE pm_master SET filename = ?,cas_no =?,name = ?,model_type= ?,description = ?,type=?,disp_sh= ? 
WHERE master_id= ?', array($substance, $casno, $name, $modeltype, $description, $type, $disp_sh, $master_id));

        //upload profile
        if (!empty($_FILES['profile']['tmp_name'])) {
            $profileName = 'PM-' . $master_id . '.png';
            uploadFile($_FILES['profile']['tmp_name'], 'img/profile/', $profileName);
        }

        $data['success'] = true;
        $data['message'] = 'Success!';
        $data['id'] = $master_id;
    } catch (Exception $e) {
        $error = $e;
//        echo $e;
    }


} else {
    $data['success'] = false;
    $data['errors'] = $errors;
    $data['id'] = $master_id;

}
//
$_SESSION['processUpdateHead'] = $data;
//

$url = 'updatemol.php?id=' . $master_id;
if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href= $url> CLICK HERE <a/>");
} else {
    exit(header('location:' . $url));
}
