<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 6/18/14
 * Time: 10:04 AM
 */

include '../model/UpdateAllRecords.php';

if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}

$action = (isset($_GET['action'])) ? $_GET['action'] : $_POST['action'];

if($action == 'updateUser'){
    updateUser((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'logout'){
    logout();
}

function updateUser($params){
    $data = json_decode($params, true);
    $id = $data['user_id'];
    $update_user = new UpdateAllRecords();

    unset($data['user_id']);

    echo $update_user->updateUser(array_keys($data), $data, $id);
}

function logout(){
    echo session_destroy();
}