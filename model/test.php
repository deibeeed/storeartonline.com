<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/8/14
 * Time: 12:50 PM
 */

include 'Utils.php';
//include '../config/DBconnect.php';

date_default_timezone_set('Asia/Taipei');
echo date('Y-m-d H:i:s');
echo '<br/>' .date(DATE_W3C);

if(file_exists(Utils::getDefaultImageDir() . '/product'))
    echo '<br/>' . Utils::getDefaultImgProductDir() . ' directory exist';
else
    echo '<br/>'  . "directory does not exist";

$arr = array(1,2,3,4,5,6,1,2,1,1,2,5,7);
$arr2 = array(4,5);

echo '<br/>' . print_r(array_count_values($arr2));

$arr = array('value1' => 'val1', 'value2' => 'val2');

echo '<br/>' . count($arr);

$arr = array(
            array('val1' => 1, 'val2' => 'my value2', 'val3' => 3),
            array('val4' => 4, 'val5' => 5)
);

echo '<br/>' . $arr[0]['val2'];
$db = null;
echo '<br/>' . var_dump($db instanceof DBconnect);

class Test2{
    function getValue(){
        echo 'hello world';
    }
}