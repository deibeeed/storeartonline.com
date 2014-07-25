<?php
include 'Utils.php';


$output_dir = '';
$arr = array();

if(isset($_POST['action']) || isset($_GET['action'])){
//    $action = json_decode(((isset($_POST['data'])) ? $_POST['data'] : $_GET['data']), true);
    $action = (isset($_POST['action'])) ? $_POST['action'] : $_GET['action'];

    if($action == 'profilePic'){
        $output_dir = Utils::getDefaultProfilePicDir();
    }
    else if($action == 'product'){
        $output_dir = Utils::getDefaultImgProductDir();
    }

    if($output_dir != ''){
        if(isset($_FILES["myFile"]))
        {
            $ret = array();

            //	This is for custom errors;
            /*	$custom_error= array();
                $custom_error['jquery-upload-file-error']="File already exists";
                echo json_encode($custom_error);
                die();
            */
            $error =$_FILES["myFile"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData()
            if(!is_array($_FILES["myFile"]["name"])) //single file
            {
                $fileName = $_FILES["myFile"]["name"];
                move_uploaded_file($_FILES["myFile"]["tmp_name"],$output_dir.$fileName);
                $ret[]= $fileName;
                $ret[] = $_FILES;
            }
            else  //Multiple files, file[]
            {
                $fileCount = count($_FILES["myFile"]["name"]);
                for($i=0; $i < $fileCount; $i++)
                {
                    $fileName = $_FILES["myFile"]["name"][$i];
                    move_uploaded_file($_FILES["myFile"]["tmp_name"][$i],$output_dir.$fileName);
                    $ret[]= $fileName;
                }

            }
            $arr['status']          = 'success';
            $arr['data']            = $ret;
            echo json_encode($arr);
        }
    }
    else{
        $arr['status']          = 'error';
        $arr['message']         = 'output directory not defined';
        $arr['action']          = $action;
        $arr['output_dir']      = $output_dir;
        echo json_encode($arr);
    }
}
else{
    $arr['status']              = 'error';
    $arr['message']             = 'action not defined';

    echo json_encode($arr);
}

//if(isset($_FILES["myFile"]))
//{
//	$ret = array();
//
////	This is for custom errors;
///*	$custom_error= array();
//	$custom_error['jquery-upload-file-error']="File already exists";
//	echo json_encode($custom_error);
//	die();
//*/
//	$error =$_FILES["myFile"]["error"];
//	//You need to handle  both cases
//	//If Any browser does not support serializing of multiple files using FormData()
//	if(!is_array($_FILES["myFile"]["name"])) //single file
//	{
// 	 	$fileName = $_FILES["myFile"]["name"];
// 		move_uploaded_file($_FILES["myFile"]["tmp_name"],$output_dir.$fileName);
//    	$ret[]= $fileName;
//        $ret[] = $_FILES;
//	}
//	else  //Multiple files, file[]
//	{
//	  $fileCount = count($_FILES["myFile"]["name"]);
//	  for($i=0; $i < $fileCount; $i++)
//	  {
//	  	$fileName = $_FILES["myFile"]["name"][$i];
//		move_uploaded_file($_FILES["myFile"]["tmp_name"][$i],$output_dir.$fileName);
//	  	$ret[]= $fileName;
//	  }
//
//	}
//    echo json_encode($ret);
// }
 ?>