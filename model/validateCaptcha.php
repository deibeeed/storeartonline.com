<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 7/15/14
 * Time: 11:26 AM
 */
require_once './recaptchalib.php';
$private_key = "6LeT0PYSAAAAAOZO_CMteZujR_IC1jVfF5Os4hvR";
$arr = [];

$resp = recaptcha_check_answer($private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

if($resp->is_valid){
    $arr['status'] = 'success';
    echo json_encode($arr);
}
else{
    $arr['status'] = 'error';
    $arr['error_message'] = $resp->error;
    echo json_encode($arr);
}