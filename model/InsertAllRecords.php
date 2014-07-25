<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/8/14
 * Time: 12:32 PM
 */

include_once '../config/DBconnect.php';
include_once '../model/ShowAllRecords.php';
//include_once '../model/Utils.php';

date_default_timezone_set('Asia/Taipei');

if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}
class InsertAllRecords {

    private $db;


//    function InsertAllRecords(){
//        $this->db = new DBconnect();
//    }

    function __construct()
    {
        $this->db = new DBconnect();
    }

    function addUser($param_key, $param_value){

        $arr = [];
        $result = '';
        $prepStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();

            $stmt = 'INSERT INTO core_user ';
            $key = '';
            $value = '';

            //test run
            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }

            }

            $stmt .= '(' . $key . ') VALUES(' . $value . ')';
            $prepStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $prepStmt->bindValue($i, htmlspecialchars($param_value[$param_key[$i - 1]]));
            }

            $result = $prepStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        }catch (PDOException $e){
            echo $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] =  'error';
            $arr['error_message'] = $prepStmt->errorInfo();
        }
        else
            $arr['status'] =  'success';
        return json_encode($arr);
    }

    function addProduct($param_key, $param_value){

        $arr = [];
        $result = '';
        $preparedStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();



            $stmt = 'INSERT INTO core_product ';
//            $stmt = 'INSERT INTO core_product SET ';
            $key = '';
            $value = '';

            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }
            }
//            $stmt2 = '';
//            $count = 0;
//
//            foreach($param_value as $key => $value){
//                $count += 1;
//                if($count == (count($param_value) - 1)){
//                    $stmt2 .= $key . '=' . htmlentities($value, ENT_QUOTES);
//                }
//                else{
//                    $stmt2 .= $key . '=' . htmlentities($value, ENT_QUOTES) . ', ';
//                }
//            }

            $stmt .= '(' . $key . ') VALUES (' . $value . ')';
//            $stmt = $stmt . $stmt2;

            $preparedStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $preparedStmt->bindValue($i, htmlentities($param_value[$param_key[$i - 1]], ENT_QUOTES));
            }

            $result = $preparedStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        } catch(PDOException $e){
            $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] = 'error';
            $arr['error_code'] = $preparedStmt->errorInfo();
            $arr['query'] = $stmt;
        }
        else{
            $arr['status'] = 'success';
            $arr['params'] = $param_value;
            $arr['error_code'] = $preparedStmt->errorInfo();
            $arr['query'] = $stmt;
        }

        return json_encode($arr);
    }

    function addOrder($params){

        $arr = [];
        $result = '';
        $preparedStmt = '';

        $param_key = null;
        $param_value = null;

        $total_price = 0;
        $param_value = json_decode($params, true);
        $order_details = $param_value['order_details'];
        $param_value['item_count'] = count($order_details);
        $sar = new ShowAllRecords($this->db);


        for($i = 0; $i < $param_value['item_count']; $i++){
            $getProductDetail = $sar->showRecordById('product', $order_details[$i]['product_id']);
            $productDetailResult = json_decode($getProductDetail, true);

            if($productDetailResult['status'] == 'success'){
                $total_price += json_decode($productDetailResult['data'], true)['price'] * $order_details[$i]['quantity'];
            }
        }


        $param_value['total_price'] = $total_price;
        $param_value['order_date'] = Utils::getDateToday();

        unset($param_value['order_details']);
        $param_key = array_keys($param_value);


        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();



            $stmt = 'INSERT INTO core_order ';
            $key = '';
            $value = '';

            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }
            }

            $stmt .= '(' . $key . ') VALUES (' . $value . ')';

            $preparedStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $preparedStmt->bindValue($i, htmlentities($param_value[$param_key[$i - 1]], ENT_QUOTES));
            }

            $result = $preparedStmt->execute();

            $get_order_id = $dbconn->query('SELECT LAST_INSERT_ID()')->fetchColumn();

            for($i = 0; $i < $param_value['item_count']; $i++){
                $getProductDetail = $sar->showRecordById('product', $order_details[$i]['product_id']);
                $productDetailResult = json_decode($getProductDetail, true);

                if($productDetailResult['status'] == 'success'){
                    $productData = json_decode($productDetailResult['data'], true);
                    $order_details[$i]['product_name'] = $productData['name'];
                    $order_details[$i]['product_price'] = $productData['price'];
                    $order_details[$i]['order_id'] = $get_order_id;
                }
            }

            for($i = 0; $i < $param_value['item_count']; $i++){
                $param_key2 = array_keys($order_details[$i]);
                $key2 = '';
                $value2 = '';
                $stmt2 = '';

                for($i = 0; $i < count($param_key2); $i++){
                    if($i == count($param_key2) - 1){
                        $key2 .= $param_key2[$i];
                        $value2 .= '?';
                    }
                    else{
                        $key2 .= $param_key2[$i] . ',';
                        $value2 .= '?,';
                    }
                }

                $stmt2 = 'INSERT INTO detail_order (' . $key2 . ') VALUES (' . $value2 . ')';

                $preparedStmt2 = $dbconn->prepare($stmt2);

                for($j = 0; $j < count($order_details); $j++){
                    for($i = 1; $i <= count($order_details[$j]); $i++){
                        $preparedStmt2->bindValue($i, htmlentities($order_details[$j][$param_key2[$i - 1]], ENT_QUOTES));
                    }
                }


                $result2 = $preparedStmt2->execute();
            }

            $dbconn->commit();
            $this->db->closeDBConnection();
        } catch(PDOException $e){
            $e->getMessage();
        }

        if(($result == false && $result2 == false) || ($result == 0 && $result2 == 0)){
            $arr['status'] = 'error';
            $arr['error_code'] = $preparedStmt->errorInfo();
        }
        else{
            $arr['status'] = 'success';
            $arr['error_code'] = $preparedStmt->errorInfo();
        }

        return json_encode($arr);
    }

    function addRequest($param_key,  $param_value){
//        $dbconn->beginTransaction();
//
//        $sql = "INSERT INTO core_request (reqruest_subject, request_details, request_date, status)
//                VALUES (:request_subject, :request_details, :request_date, :status)";
//
//        $insert_sql = $dbconn->prepare($sql);
//        $insert_sql->execute(array(':request_subject'       => $request_subject,
//                                   ':request_details'       => $request_details,
//                                   ':request_date'          => $request_date,
//                                   ':status'                => 0));
//
//        $dbconn->commit();
//        if($insert_sql == false || $insert_sql == 0)
//            return 'error';
//        else
//            return 'success';

        $arr = [];
        $result = '';
        $preparedStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();



            $stmt = 'INSERT INTO core_request ';
            $key = '';
            $value = '';

            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }
            }

            $stmt .= '(' . $key . ') VALUES (' . $value . ')';

            $preparedStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $preparedStmt->bindValue($i, htmlentities($param_value[$param_key[$i - 1]], ENT_QUOTES));
            }

            $result = $preparedStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        } catch(PDOException $e){
            $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] = 'error';
            $arr['error_code'] = $preparedStmt->errorInfo();
            $arr['query'] = $stmt;
        }
        else{
            $arr['status'] = 'success';
            $arr['error_code'] = $preparedStmt->errorInfo();
        }

        return json_encode($arr);
    }

    function addLog($dbconn, $user_agent){

        $sql = "INSERT INTO access_log (user_agent) VALUES $user_agent";

        $result = $dbconn->exec($sql);

        if($result == false || $result == 0)
            return 'error';
        else
            return 'success';
    }

    function addWishlist($param_value){

        $param_key = array_keys($param_value);
        $arr = [];
        $result = '';
        $preparedStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();



            $stmt = 'INSERT INTO core_wishlist ';
            $key = '';
            $value = '';

            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }
            }

            $stmt .= '(' . $key . ') VALUES (' . $value . ')';

            $preparedStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $preparedStmt->bindValue($i, htmlentities($param_value[$param_key[$i - 1]], ENT_QUOTES));
            }

            $result = $preparedStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        } catch(PDOException $e){
            $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] = 'error';
            $arr['error_code'] = $preparedStmt->errorInfo();
//            $arr['query'] = $stmt;
        }
        else{
            $arr['status'] = 'success';
            $arr['error_code'] = $preparedStmt->errorInfo();
        }

        return json_encode($arr);
    }

    function addReview($param_value){
        $param_key = array_keys($param_value);
        $arr = [];
        $result = '';
        $preparedStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();



            $stmt = 'INSERT INTO core_review ';
            $key = '';
            $value = '';

            for($i = 0; $i < count($param_key); $i++){
                if($i == count($param_key) - 1){
                    $key .= $param_key[$i];
                    $value .= '?';
                }
                else{
                    $key .= $param_key[$i] . ',';
                    $value .= '?,';
                }
            }

            $stmt .= '(' . $key . ') VALUES (' . $value . ')';

            $preparedStmt = $dbconn->prepare($stmt);

            for($i = 1; $i <= count($param_value); $i++){
                $preparedStmt->bindValue($i, htmlentities($param_value[$param_key[$i - 1]], ENT_QUOTES));
            }

            $result = $preparedStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        } catch(PDOException $e){
            $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] = 'error';
            $arr['error_code'] = $preparedStmt->errorInfo();
//            $arr['query'] = $stmt;
        }
        else{
            $arr['status'] = 'success';
            $arr['error_code'] = $preparedStmt->errorInfo();
        }

        return json_encode($arr);
    }
} 