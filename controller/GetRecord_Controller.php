<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 4/16/14
 * Time: 9:21 PM
 */

include '../model/ShowAllRecords.php';

//if(!isset($_SESSION['storeartonline_user_id'])){
//    session_start();
//}

$action = (isset($_GET['action'])) ? $_GET['action'] : $_POST['action'];

if($action == 'login')
    login((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
else if($action == 'user' || $action == 'user2' || $action == 'product' || $action == 'purchaseHistory' || $action == 'wishlist' || $action == 'request' || $action == 'wishlist_watch' || $action == 'review'|| $action == 'getItems' || $action == 'getItemCars' || $action == 'getItemComputer'|| $action == 'getItemByBrand' || $action == 'getItemByMake' || $action == 'getItemNewArrival' || $action == 'getItemCarsNewArrival' || $action == 'getItemComputerNewArrival' || $action == 'search')
    getRecordById($action, (isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
else if($action == 'rating'){
    getRating((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}

function login($params){
    $data = json_decode($params, true);
    $showRecords = new ShowAllRecords(null);

    echo $showRecords->authenticateUser($data);
}

function getRecordById($act, $id){
//    $data = json_decode($params, true);
    $showRecords = new ShowAllRecords(null);

    echo $showRecords->showRecordById($act,$id);
}

function getRating($id){
    $showRecords = new ShowAllRecords(null);

    echo $showRecords->getRating($id);
}