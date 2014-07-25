<?php
//    include '../controller/AddUser_Controller.php';
if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" type="image/png" href="../images/logo_32x32.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/uploadfile.min.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <title>Register</title>
</head>
    <body style="background-color: #ffffff;">

    <!-- header div -->
    <div style="overflow: hidden; display: inline-block; width: 100%; background-color: #f2f2f2; padding: 15px;">
<!--        <img class="logo" style="background-image: none;" src="../images/logo_with_words_h78.png" />-->
        <span class="logo" style="margin-top: 0px"></span>
        <div style="float: right; margin-right: 40px; vertical-align: middle; margin-top: 10px;">
            <button class="button-template btn btn-default" style="background-color: #4387fd; color: #ffffff;" onclick="document.location = './login.php';">
                Sign in
            </button>
        </div>
    </div>
    <!-- end header div -->

        <!-- main container -->
        <div>
            <div style="text-align: center; font-size: 32px; font-family: 'Open Sans', arial; padding: 30px; font-weight: 300;">
                <span> Create your StoreArtOnline Account</span>
            </div>

            <!-- container -->

            <div class="col-sm-8">

            </div>
                <div class="pull-right col-sm-4" style="border-bottom: 0px; margin-right: 200px; padding: 30px; border-radius: 3px; background-color: #f2f2f2; font-family: arial; font-weight: bold; width: 27%">

                    <form role="form">
                        <div class="form-group">
                            <label for="email_address">Email Addresss</label>
                            <input id="email_address" class="form-control" type="email" />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="form-group form-inline">
                                <input id="firstname" class="form-control" type="text" placeholder="First" style="width: 150px;" />
                                <input id="lastname" class="form-control" type="text" placeholder="Last" style="width: 150px" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthday</label>
                            <div class="form-inline">
                                <select id="bdate_month" class="form-control">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                <input id="bdate_day" class="form-control" type="text" placeholder="Day" size="2" />
                                <input id="bdate_year" class="form-control" type="text" placeholder="Year" size="4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control">
                                <option style="display: none;">i am...</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="physical_address">Physical Address</label>
                            <input id="physical_address" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="mail_address">Mailing Address</label>
                            <div class="input-group">
                                <input id="mail_address" class="form-control" type="text" placeholder="same as above" disabled />
                                <span class="input-group-addon">
                                    <input id="chk_mail_address" type="checkbox" />
                                </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input id="contact_number" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" />
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="confirm_password" class="form-control" type="password" />
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="profile_pic">Profile Picture</label>-->
<!--                            <div id="profile_pic">Upload</div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div id="capcha">

                            </div>
<!--                            <button type="submit" id="btnAdd" class="button-template btn btn-default" style="float: right; margin-right: 5px; background-color: #4FC7FF; color: #ffffff; width: 70px;">Save</button>-->
                        </div>
                    </form>

                    <div>
                        <button id="btnAdd" class="button-template btn btn-default" style="float: right; margin-right: 5px; background-color: #4FC7FF; color: #ffffff; width: 70px;">Save</button>
                    </div>
                </div>



        </div>

        <!-- scripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/jquery-1.11.0.min.js"><\/script>')</script>
        <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
        <script src="../js/storeartonline-common-scripts.js"></script>
        <script src="../js/jquery.uploadfile.min.js"></script>
        <script>
            $(document).ready(function(){
//                var uploadPic = $('#profile_pic').uploadFile({
//                    url: '../model/upload.php',
//                    acceptFiles: 'png,gif,jpg,jpeg',
//                    autoSubmit: false
//                });

                showCaptcha();
            });
            $('#chk_mail_address').click(function(){
               if($(this).is(':checked')){
                   $('#mail_address').prop('disabled', false);
                   $('#mail_address').prop('placeholder', '');
                   console.log("checked");
               }
                else{
                   $('#mail_address').prop('disabled', true);
                   $('#mail_address').prop('placeholder', 'same as above');
                   $('#mail_address').val('');
                   console.log("not checked");
               }
            });

            $('#btnAdd').click(function(){

                $.ajax({
                    type            : 'POST',
                    url             : '../model/validateCaptcha.php',
                    data            : 'recaptcha_challenge_field=' + Recaptcha.get_challenge() + '&recaptcha_response_field=' + Recaptcha.get_response(),
                    success         : function(msg){
                        console.log(msg);

                        var result = JSON.parse(msg);

                        if(result.status == 'success'){
                            $.ajax({
                                type: "GET",
                                data: "action=user&data=" + constructData(),
                                url: "../controller/AddUser_Controller.php",
                                success: function(msg){
                                    console.log(msg);
                                    var result = JSON.parse(msg);

                                    if(result.status == 'success'){
//                            uploadPic.startUpload();
                                        alert('You are successfully added.');
                                        redirectToLogin();
                                    }
                                    else{
                                        var error_info = result.error_message[2].split(' ');
                                        alert(error_info[0] + ' ' + error_info[error_info.length - 1]);
                                        Recaptcha.reload();
                                    }
                                },
                                error: function(msg){
//                        alert('error ' + msg);
                                    console.log(msg);
                                }
                            });
                        }
                        else{
                            alert('Incorrect Captcha');
                            Recaptcha.reload();
                        }
                    },
                    error           : function(msg){

                    }
                });
            });

            function constructData(){
                var arr = {};

                if($('#email_address').val() != '')
                    arr['email_address'] = $('#email_address').val();
                if($('#lastname').val() != '')
                    arr['lastname'] = $('#lastname').val();
                if($('#firstname').val() != '')
                    arr['firstname'] = $('#firstname').val();
                if($('#physical_address').val() != '')
                    arr['physical_address'] = $('#physical_address').val();
                if($('#mail_address').val() != '')
                    arr['mail_address'] = $('#mail_address').val();
                if($('#contact_number').val() != '')
                    arr['contact_number'] = $('#contact_number').val();
                if($('#password').val() != '')
                    arr['password'] = $('#password').val();

                return JSON.stringify(arr);
            }

            function showCaptcha(){
                Recaptcha.create('6LeT0PYSAAAAAGuua3s5K_8f4OqXKxyIppetzHTS', 'capcha', {
                    theme       : 'white',
                    callback    : Recaptcha.focus_response_field
                });
            }

        </script>
    <?php

    ?>
    </body>
</html>