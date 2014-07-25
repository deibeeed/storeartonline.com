<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/8/14
 * Time: 11:49 PM
 */

include '../config/DBconnect.php';

class UpdateAllRecords {
    private $db;

    function UpdateAllRecords(){
        $this->db = new DBconnect();
    }


    function updateUser($param_key, $param_value, $id){

        $dbconn = $this->db->openDBconnection();
        $dbconn->beginTransaction();

        $arr = [];
        $result = '';
        $prepStmt = '';

        try{
            $dbconn = $this->db->openDBconnection();
            $dbconn->beginTransaction();

            $stmt = 'UPDATE core_user SET ';
            //for update
            for($i = 0; $i < count($param_key); $i++){
                if($i == (count($param_key) - 1)){
                    $stmt .= $param_key[$i] . "='" . $param_value[$param_key[$i]] . "'";
                }
                else{
                    $stmt .= $param_key[$i] . "='" . $param_value[$param_key[$i]] . "',";
                }
            }

            $stmt .= " WHERE user_id = $id";
            $prepStmt = $dbconn->prepare($stmt);

            $result = $prepStmt->execute();
            $dbconn->commit();
            $this->db->closeDBConnection();
        }catch (PDOException $e){
            echo $e->getMessage();
        }

        if($result == false || $result == 0){
            $arr['status'] =  'error';
            $arr['error_message'] = $prepStmt->errorInfo();
//            $arr['stmt'] = $stmt;
        }
        else
            $arr['status'] =  'success';
        return json_encode($arr);
    }

    function updateProduct($dbconn, $product_id, $product_code, $product_name, $product_description,
                           $product_manufacturer, $product_price, $product_tag){

        $dbconn->beginTransaction();

        $sql = "UPDATE core_product SET product_code = ?, product_name = ?, product_description = ?,
                        product_manufacturer = ?, product_price = ?, product_tag = ? WHERE product_id = ?";

        $update_sql = $dbconn->prepare($sql);
        $update_sql->execute(array($product_code, $product_name, $product_description, $product_manufacturer,
                                    $product_price, $product_tag, $product_id));

        $dbconn->commit();

        if($update_sql == false || $update_sql == 0)
            return 'error';
        else
            return 'success';
    }

    function updateOrder($dbconn, $order_id){

        $dbconn->beginTransaction();

        $sql = "UPDATE core_order SET status = '1' WHERE order_id = $order_id";
        $sql2 = "UPDATE detail_order SET status = '1' WHERE order_id = $order_id";

        $result = $dbconn->exec($sql);
        $result2 = $dbconn->exec($sql2);

        $dbconn->commit();

        if(($result == false || $result == 0) && ($result2 == false || $result2 == 0))
            return 'error';
        else
            return 'success';

    }

    function updateRequest($dbconn, $request_id, $status){

        $dbconn->beginTransaction();

        $sql = "UPDATE core_request SET status = $status WHERE request_id = $request_id";

        $result = $dbconn->exec($sql);

        $dbconn->commit();

        if($result == false || $result == 0)
            return 'error';
        else
            return 'success';
    }
}