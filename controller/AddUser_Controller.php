<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/18/14
 * Time: 11:08 PM
 */

include '../model/InsertAllRecords.php';
include '../model/Utils.php';
//include '../model/ShowAllRecords.php';

if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}

$action = (isset($_GET['action'])) ? $_GET['action'] : $_POST['action'];

if($action == 'user'){
    addUser((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'product'){
    addProduct((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'request'){
    addRequest((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'order'){
    addOrder((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'wishlist'){
    addWishlist((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}
else if($action == 'review'){
    addReview((isset($_GET['data'])) ? $_GET['data'] : $_POST['data']);
}


function addUser($params){
    $data = json_decode($params, true);
    $data['date_created'] = Utils::getDateToday();
    $data['password'] = md5($data['password']);

    $insertUser = new InsertAllRecords();
    $result = $insertUser->addUser(array_keys($data), $data);
    echo $result;
};

function addProduct($params){

    $data = json_decode(htmlentities($params, ENT_NOQUOTES), true);
    $data['date_entered'] = Utils::getDateToday();

    $insertProduct = new InsertAllRecords();
    $result = $insertProduct->addProduct(array_keys($data), $data);

    echo $result . ' ' . $params;
}

function addRequest($params){
    $data = json_decode($params, true);
    $data['date_created'] = Utils::getDateToday();

    $insertRequest = new InsertAllRecords();
    $result = $insertRequest->addRequest(array_keys($data), $data);

    echo $result;
}

function addOrder($params){
//    $data = json_decode($params, true);

    $insertOrder = new InsertAllRecords();
    $result = $insertOrder->addOrder($params);

    echo $result;
}

function addWishlist($params){
    $data = json_decode($params, true);
    $data['date_entered'] = Utils::getDateToday();
    $insertWish = new InsertAllRecords();
    $result = $insertWish->addWishlist($data);

    echo $result;
}

function addReview($params){
    $data = json_decode($params, true);
    $data['date_entered'] = Utils::getDateToday();

    $insertReview = new InsertAllRecords();
    $result = $insertReview->addReview($data);

    echo $result;
}