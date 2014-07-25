<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/7/14
 * Time: 2:12 PM
 */
include_once '../config/DBconnect.php';

if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}

class ShowAllRecords {

    private $db;

//    function ShowAllRecords(){
//        $this->db = new DBconnect();
//    }

    function __construct($db)
    {
        if($db instanceof DBconnect){
            $this->db = $db;
        }
        else{
            $this->db = new DBconnect();
        }

    }

    function showAllUsers($dbconn){

        $result = $dbconn->query("SELECT * FROM core_user");

        return json_encode($result);
    }

    function showAllProducts($dbconn){

        $result = $dbconn->query("SELECT * FROM core_product");

        return json_encode($result);
    }

    function showAllOrder($dbconn){

        $sql = "SELECT *
        FROM core_order co
        INNER JOIN detail_order do
        ON co.order_id = do.order_id";

        $result = $dbconn->query($sql);

        return json_encode($result);
    }

    function showAllRequest($dbconn){

        $result = $dbconn->query("SELECT * FROM core_request");

        return json_encode($result);
    }

    function showLog($dbconn){

        $result = $dbconn->query("SELECT * FROM access_log");

        return json_encode($result);
    }

    function authenticateUser($paramValue){
        $result = '';
        $arr = [];
        $md5_password = md5($paramValue['password']);
        $prepStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();

            $stmt = "SELECT user_id FROM core_user WHERE email_address = ? AND password = ?";
            $prepStmt = $dbconn->prepare($stmt);
            $prepStmt->bindParam(1, $paramValue['email_address']);
            $prepStmt->bindParam(2, $md5_password);

            $result = $prepStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        }catch (PDOException $e){
            $e->getMessage();
        }

        if($result == 'false' || $result == 0){
            $arr['status'] = 'success';
            $arr['user_id'] = $prepStmt->fetchColumn();
            $_SESSION['storeartonline_user_id'] = $arr['user_id'];
        }
        else{
            $arr['status'] = 'error';
            $arr['error_message'] = $prepStmt->errorInfo();
        }

        return json_encode($arr);
    }

    function showRecordById($action, $id){
        $result = '';
        $prepStmt = '';
        $arr = [];

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();

            if($action == 'user'){
                $stmt = "SELECT firstname, lastname, gender, user_pic FROM core_user WHERE user_id = $id";
            }
            else if($action == 'user2'){
                $stmt = "SELECT * FROM core_user WHERE user_id = $id";
            }
            else if($action == 'product'){ // get item per product id
                $stmt = "SELECT * FROM core_product WHERE product_id = $id";
            }
            else if($action == 'purchaseHistory'){ //get user purchase history
                $stmt = "SELECT co.order_date, co.item_count, co.total_price, co.confirm_payment, do.product_name, do.quantity, do.product_price FROM core_order co INNER JOIN detail_order do ON co.order_id = do.order_id WHERE co.customer_user_id = $id";
            }
            else if($action == 'wishlist'){ //get user wishlist
                $stmt = "SELECT cp.product_id, cp.brand, cp.name, cp.description, cp.price FROM core_wishlist cw INNER JOIN core_product cp ON cw.product_id = cp.product_id WHERE cp.status = 1 AND cw.user_id = $id";
            }
            else if($action == 'wishlist_watch'){ //checking if user have wished an item already
                $data = json_decode($id, true);

                $stmt = "SELECT IF(wishlist_id > 0, 1, 0) AS has_wishlist FROM core_wishlist WHERE user_id = " . $data['user_id'] . " AND product_id = " .$data['product_id'] . " LIMIT  1";
            }
            else if($action == 'request'){ //get all requests of user
                $stmt = "SELECT request_subject, request_details, date_created, IF(status = 0, 'No', 'Yes') AS has_attended FROM core_request WHERE user_id = $id";
            }
            else if($action == 'review'){ //get all review of user
//                $data = json_decode($id, true);

                $stmt = "SELECT CONCAT(cu.firstname, ' ', cu.lastname) AS name, cu.user_pic, cr.review_subject, cr.review_body, cr.rate, cr.date_entered FROM core_review cr INNER JOIN core_user cu ON cr.user_id = cu.user_id WHERE product_id = $id";
            }
            else if($action == 'getItems'){ //get all items
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product";
            }
            else if($action == 'getItemCars'){ //get all car items
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'cars'";
            }
            else if($action == 'getItemComputer'){ //get all computer items
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'computer'";
            }
            else if($action == 'getItemByBrand'){ //cars by brand
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'cars' AND brand = '$id'";
            }
            else if($action == 'getItemByMake'){ //cars by make
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'cars' AND make = '$id'";
            }
            else if($action == 'getItemNewArrival'){ //home
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE date_entered BETWEEN DATE_SUB(NOW(),INTERVAL 1 MONTH) AND NOW()";
            }
            else if($action == 'getItemCarsNewArrival'){
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'cars' AND date_entered BETWEEN DATE_SUB(NOW(),INTERVAL 1 MONTH) AND NOW()";
            }
            else if($action == 'getItemComputerNewArrival'){
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE category = 'computer' AND date_entered BETWEEN DATE_SUB(NOW(),INTERVAL 1 MONTH) AND NOW()";
            }
            else if($action == 'search'){
                $stmt = "SELECT product_id, name, brand, price, photo, GetRating(product_id) AS rate FROM core_product WHERE name LIKE '%$id%'";
            }

            $prepStmt = $dbconn->prepare($stmt);

            $result = $prepStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        }catch (PDOException $e){
            $e->getMessage();
        }

        if($result == 'false' || $result == 0){
            $arr['status'] = 'success';
            if($action == 'purchaseHistory' || $action == 'wishlist' || $action == 'request' || $action ==  'review'|| $action == 'getItems' || $action == 'getItemCars' || $action == 'getItemComputer' || $action == 'getItemByBrand' || $action == 'getItemByMake' || $action == 'getItemNewArrival' || $action == 'getItemCarsNewArrival' || $action == 'getItemComputerNewArrival' || $action == 'search'){
                $arr['data'] = json_encode($prepStmt->fetchAll(PDO::FETCH_ASSOC));
            }
            else{
                $arr['data'] = json_encode($prepStmt->fetch(PDO::FETCH_ASSOC));
            }
//            $arr['stmt'] = $stmt;
//            $arr['action'] = $action;

        }
        else{
            $arr['status'] = 'error';
            $arr['error_message'] = $prepStmt->errorInfo();
        }

        return json_encode($arr);
    }

    function getRating($id){
        $result = '';
        $arr = [];
        $prepStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();

            $stmt = "SELECT GetRating(product_id) AS rate, COUNT(review_id) AS total_participant, GetTotalParticipantByRate(product_id, 5) AS rate_5, GetTotalParticipantByRate(product_id, 4) AS rate_4, GetTotalParticipantByRate(product_id, 3) AS rate_3, GetTotalParticipantByRate(product_id, 2) AS rate_2, GetTotalParticipantByRate(product_id, 1) AS rate_1 FROM core_review WHERE product_id = $id";
            $prepStmt = $dbconn->prepare($stmt);

            $result = $prepStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        }catch (PDOException $e){
            $e->getMessage();
        }

        $rate = $prepStmt->fetch(PDO::FETCH_ASSOC);

        if($result == 'false' || $result == 0){
            $arr['status'] = 'success';
            $arr['data'] = $rate;
        }
        else{
            $arr['status'] = 'error';
            $arr['error_message'] = $prepStmt->errorInfo();
        }

        return json_encode($arr);
    }

} 