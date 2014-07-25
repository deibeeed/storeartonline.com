<?php
include '../model/Utils.php';
if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <!-- loading css -->
    <link type="text/css" rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/stylesheet.css">
    <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dijit/themes/claro/claro.css">-->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- loading dojo -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dojo/dojo.js" data-dojo-config="async: true"></script>-->

    <style>
        img#user_img:hover{
            display: inline;
        }
    </style>
    <title>Profile page</title>

    <link rel="shortcut icon" href="../images/logo_32x32.png" type="image/png">
</head>
    <body>
    <!-- header div -->
    <div style="overflow: hidden; display: inline-block; width: 100%">
        <span id="logo" class="logo"></span>

        <div class="col-sm-6" style="margin-top: 20px; margin-left: 15px;">
            <div id="searchbox" class="input-group">
                <input id="search-box" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button id="btn-search" class="btn btn-default" style="width: 70px; background-color: #4387fd">
                        <span class="glyphicon glyphicon-search" style="color: #ffffff;"></span>
                    </button>
                </span>

            </div>
        </div>

        <div style="float: right; margin-right: 30px; margin-top: 20px;">
            <button id="btn_signin" class="btn btn-default" style="background-color: #4387fd; color: #ffffff;" onclick="document.location = './login.php';">
                Sign in
            </button>
        </div>
    </div>
    <!-- end header div -->

    <!-- action bar div -->
    <div class="menu-container"  >
        <!-- sidebar menu -->
        <div class="sideBarMenu">
            <div id="mainMenu" class="list-group">
                <a data-menu-title="home" href="#" class="list-group-item active" style="height: 50px;" onclick="menuList('home')">
                    <img src="../images/logo_32x32.png" style="height: 35px; width: 35px;" />
                    <span class="list-group-item-text menu-title" style="color: #ffffff">Store</span><br>

                </a>
                <a data-menu-title="cars" href="#" class="list-group-item" style="height: 50px;" onclick="menuList('cars')">
                    <img src="../images/car.png" style="height: 35px; width: 35px;" />
                    <span class="list-group-item-text menu-title">Cars</span>
                </a>
                <a data-menu-title="computer" href="#" class="list-group-item" style="height: 50px;" onclick="menuList('computer')">
                    <img src="../images/computer.png" style="height: 35px; width: 35px;" />
                    <span class="list-group-item-text menu-title">Computer</span>
                </a>
                <a data-menu-title="networking" href="#" class="list-group-item" style="height: 50px;" onclick="menuList('networking')">
                    <img src="../images/network2.png" style="height: 35px; width: 35px;" />
                    <span class="list-group-item-text menu-title">Networking</span>
                </a>
            </div>
            <div class="list-group">
                <a id="request-item" href="#" class="list-group-item">Request an Item</a>
                <a href="#" class="list-group-item">Sell an Item</a>
            </div>
        </div>
        <!-- end sidebar div -->

        <!-- settings div -->
        <div style="display: inline-block; position: absolute; right: 30px; margin-top: 5px;">
            <button class="btn btn-default">
                <span>
                    <img src="../images/help2.png" style="height: 25px; width: 25px;"/>
                    </span>
<!--                <span class="glyphicon glyphicon-info-sign"></span>-->
            </button>
            <button class="btn btn-default">
                <span>
                    <img src="../images/settings3.png" style="height: 25px; width: 25px;"/>
                    </span>
            </button>
        </div>
        <!-- end settings div -->
    </div>
    <!-- end action bar div -->

    <!-- container -->
        <div style="/*background-color: #4387fd;*/ margin-top: 50px; display: inline-block; margin-left: 248px;">
            <!--profile head.-->
            <div style="display: inline-block; width: 1020px; overflow: hidden; margin: 20px;">
                <div style="float: left; border: solid black 1px; border-radius: 3px; margin-right: 10px; padding: 5px;">
<!--                    <div class="dropdown">-->
<!--                        <img id="user_img" src="../images/1.jpg" class="dropdown-toggle" style="height: 150px; border-radius: 10px;" data-toggle="dropdown"/>-->
<!---->
<!--                        <ul class="dropdown-menu" role="menu">-->
<!--                            <li role="presentation"><a href="" role="menuitem" tabindex="-1">Change Profile Picture</a> </li>-->
<!--                        </ul>-->
<!--                    </div>-->

                    <div>
                        <img id="user_img" src="../images/1.jpg" class="dropdown-toggle" style="height: 165px; width: 145px; border-radius: 3px;" />
                        <div id="change_pic" style="background-color: #FEFEFE; opacity: .9; padding: 3px; cursor: pointer; z-index: 1000; position: absolute; margin-top: -25px; margin-left: -3px; display: none;">
                            Update Profile Picture <span class="glyphicon glyphicon-upload"></span>
                        </div>
                        <div style="display: none;">
                            <div id="pic_upload" >upload</div>
                        </div>
                    </div>
                </div>
                <div  style="background-color: #FEFEFE; overflow: hidden; border-radius: 3px;" >
                    <div id="divProfile">
                        <div style="display: inline-block; float: left; padding: 10px; font-weight: bold; line-height: 2em">
                            Lastname: <br>
                            Firstname: <br>
                            Physical Address: <br>
                            Mailing Address: <br>
                            Email Address: <br>
                            Contact Number: <br>
                        </div>
                        <div  style="padding: 10px; float: left; line-height: 2em;">
                            <span id="lastname">Duldulao</span> <br>
                            <span id="firstname">David Andrew Francis</span> <br>
                            <span id="physical_address">Minglanilla, Cebu</span> <br>
                            <span id="mailing_address">Minglanilla, Cebu</span> <br>
                            <span id="email_address">daf@test.com</span> <br>
                            <span id="contact_number">1234567890</span> <br>
                        </div>
                    </div>

                    <form id="editProfile" class="form-horizontal" role="form" style="display: none; float: left; padding: 10px; ">
                        <div class="form-group">
                            <label for="lastname_edit" class="col-sm-3 control-label">Lastname</label>
                            <div class="col-sm-9">
                                <input id="lastname_edit" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname_edit" class="col-sm-3 control-label">Firstname</label>
                            <div class="col-sm-9">
                                <input id="firstname_edit" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="physical_address_edit" class="col-sm-3 control-label">Physical Address</label>
                            <div class="col-sm-9">
                                <input id="physical_address_edit" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mailing_address_edit" class="col-sm-3 control-label">Mailing Address</label>
                            <div class="col-sm-9">
                                <input id="mailing_address_edit" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_address_edit" class="col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-9">
                                <input id="email_address_edit" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_number_edit" class="col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-9">
                                <input id="contact_number_edit" type="text" class="form-control" >
                            </div>
                        </div>
                    </form>

                    <div style="display: inline-block; float: right; padding: 10px; font-weight: bold; font-size: 14px;">
                        <span id="editButton" style="cursor: pointer">Edit</span>
<!--                        <a id="editButton">Edit</a>-->
                    </div>
                </div>

            </div>

            <!-- profile body -->
            <div style="display: inline-block; overflow: hidden; background-color: #ffffff; width: 1040px; min-height: 200px;">
                <!-- left pane-->
                <div style="float: left; width: 20%; padding: 5px;">
                    <ul class="nav nav-pills nav-stacked">
<!--                        <li class="active">-->
<!--                            <a href="#message" data-toggle="tab">Message</a>-->
<!--                        </li>-->
                        <li>
                           <a href="#wishlist" data-toggle="tab">Wishlist</a>
                        </li>
                        <li>
                            <a href="#request" data-toggle="tab">Request</a>
                        </li>
                        <li>
                            <a href="#purchase_history" data-toggle="tab">Purchase History</a>
                        </li>
                    </ul>

                </div>


                <!-- right pane -->
                <div style="overflow: hidden; width: 80%; padding: 5px;">
                    <div class="tab-content">
<!--                        <div class="tab-pane active fade in" id="message">-->
<!--                            <ul class="nav nav-tabs">-->
<!--                                <li class="active"><a href="#inbox" data-toggle="tab">Inbox <span class="badge">2</span> </a> </li>-->
<!--                                <li><a href="#sent_items" data-toggle="tab">Sent Items</a> </li>-->
<!--                            </ul>-->
<!--                            <div class="tab-content">-->
<!--                                <div class="tab-pane active fade in" id="inbox">Inbox</div>-->
<!--                                <div class="tab-pane fade" id="sent_items">Sent Items</div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="tab-pane fade in active" id="wishlist">
                            <table class="table">
                                <tr>
                                    <td class="td-label">Name</td>
                                    <td class="td-label">Brand</td>
                                    <td class="td-label">Description</td>
                                    <td class="td-label">Price</td>
                                    <td class="td-label">Visit</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="request">
                            <table class="table table-responsive">
                                <tr>
                                    <td class="td-label col-sm-3">Date</td>
                                    <td class="td-label col-sm-3">Request Subject</td>
                                    <td class="td-label">Request Details</td>
                                    <td class="td-label">Attended</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="purchase_history">
                            <table class="table">
                                <tr>
                                    <td class="td-label">
                                        Purchase Date
                                    </td>
                                    <td class="td-label">
                                        Number of Items
                                    </td>
                                    <td class="td-label">
                                        Item
                                    </td>
                                    <td class="td-label">
                                        Confirmed Payment
                                    </td>
                                    <td class="td-label">
                                        Total Price
                                    </td>
                                </tr>
<!--                                <tr>-->
<!--                                    <td>July 6, 2014</td>-->
<!--                                    <td>1</td>-->
<!--                                    <td>-->
<!--                                        <table class="table">-->
<!--                                            <tr>-->
<!--                                                <td class="td-label">-->
<!--                                                    Item Name-->
<!--                                                </td>-->
<!--                                                <td class="td-label">-->
<!--                                                    Quantity-->
<!--                                                </td>-->
<!--                                                <td class="td-label">-->
<!--                                                    Price-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    item1-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    3-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    80-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                        </table>-->
<!--                                    </td>-->
<!--                                    <td>Yes</td>-->
<!--                                    <td>100</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>July 6, 2014</td>-->
<!--                                    <td>1</td>-->
<!--                                    <td>-->
<!--                                        <table class="table">-->
<!--                                            <tr>-->
<!--                                                <td class="td-label">-->
<!--                                                    Item Name-->
<!--                                                </td>-->
<!--                                                <td class="td-label">-->
<!--                                                    Quantity-->
<!--                                                </td>-->
<!--                                                <td class="td-label">-->
<!--                                                    Price-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    item1-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    3-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    80-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                        </table>-->
<!--                                    </td>-->
<!--                                    <td>Yes</td>-->
<!--                                    <td>100</td>-->
<!--                                </tr>-->
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!--  end of container  -->

    <!--  modals  -->
    <div class="modal fade" id="request-form-modal" role="dialog" aria-labelledby="request-form-modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span> </button>
                    <h4 class="modal-title" id="request-form-modal-title">Request form</h4>
                </div>
                <div class="modal-body">
                    <form role="form" style="padding: 5px;">
                        <div class="form-group">
                            <label for="request_subject">Request Item</label>
                            <input id="request_subject" class="form-control" type="text" placeholder="Item to be requested (usually, name of the item)"/>
                        </div>
                        <div class="form-group">
                            <label for="request_details">Request Details</label>
                            <textarea id="request_details" class="form-control" placeholder="Type Request Details here e.g (description of the item[brand, model, name, etc.]). If you can provide a source link, much better."></textarea>
                        </div>
                        <div class="form-group">
                            <button id="btn-send" type="button" class="btn btn-default button-template" style="background-color: dodgerblue;"><span class="glyphicon glyphicon-ok"></span> Send Request</button>
                            <button id="btn-cancel" type="button" class="btn btn-default button-template" data-dismiss="modal" style="background-color: darkgrey;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alert-dialog-modal" role="dialog" aria-labelledby="alert-dialog-title" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span> </button>
                    <h4 class="modal-title" id="alert-dialog-title">Login</h4>
                </div>
                <div class="modal-body">
                    <span class="glyphicon glyphicon-warning-sign" style="margin-right: 5px;"></span> <span id="alert-message" style="font-size: 20px;">Please Login first!</span> <br><br>
                    <button type="button" class="btn btn-default button-template" style="background-color: #4387FD;" onclick="redirectToLogin(constructRedirectUrl());">Sign in</button>
                    <button type="button" class="btn btn-default button-template" style="background-color: darkgrey;" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--  end of modal  -->

    <!-- loading js -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.uploadfile.min.js"></script>
    <script src="../js/storeartonline-common-scripts.js"></script>

    <!-- scripts -->
    <script>
        $(document).ready(function() {
            var stickyNavTop = $('.menu-container').offset().top;

            var stickyNav = function(){
                var scrollTop = $(window).scrollTop();

                if (scrollTop > stickyNavTop) {
                    $('.menu-container').addClass('sticky2');
                } else {
                    $('.menu-container').removeClass('sticky2');
                }
            };

            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });

            showUser();

            $('#user_img').hover(function(){
                $('#change_pic').css('display','');
            }, function(){
                $('#change_pic').css('display','none');
            });

            $('#change_pic').hover(function(){
                $('#change_pic').css('display','');
            }, function(){
                $('#change_pic').css('display','none');
            });

            $('#pic_upload').uploadFile({
                url             : '../model/upload.php',
                formData        : 'action=profilePic',
                acceptFiles     : 'png,gif,jpg,jpeg',
                fileName        : 'myFile',
                onSuccess: function (files, response, xhr, pd) {
                    console.log(response);
                    var arr = {};
                    var jsonResp = JSON.parse(response);

                    if(jsonResp.status == 'success'){
                        arr['user_pic'] = jsonResp.data[0];
                        arr['user_id'] = "<?php if(!isset($_SESSION['storeartonline_user_id'])){
                                    echo 0;
                                    }
                                     else{
                                     echo $_SESSION['storeartonline_user_id'];
                                     }?>";

                        $('#user_img').prop('src', '<?php echo Utils::getDefaultProfilePicDir();?>' + arr['user_pic']);

                        updateProfile(JSON.stringify(arr), 'prof_pic');
                    }


                }
            });

            getPurchaseHistory();
            getWishlist();
            getRequest();
            requestItem();
            search();

        });

        $('#editButton').click(function(){
            if($('#editButton').text() == 'Edit'){
                $('#editButton').text('Done');
                $('#editProfile').css('display', '');
                $('#divProfile').css('display', 'none');
            }
            else{
                if(hasChanges()){
                    console.log('has changes');
                    updateProfile(constructData(), 'profile_details');
                }
                $('#editButton').text('Edit');
                $('#editProfile').css('display', 'none');
                $('#divProfile').css('display', '');
            }

        });

        $('#change_pic').on('click', function(){
            $("input[id^='ajax-upload-id']").click();
        });

        function updateProfile(data, action){
            $.ajax({
                type        : 'POST',
                data        : 'action=updateUser&data=' + data,
                url         : '../controller/UpdateRecord_Controller.php',
                success     : function(msg){
                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        if(action == 'profile_details'){
                            $('#firstname').text($('#firstname_edit').val());
                            $('#lastname').text($('#lastname_edit').val());
                            $('#physical_address').text($('#physical_address_edit').val());
                            $('#mailing_address').text($('#mailing_address_edit').val());
                            $('#email_address').text($('#email_address_edit').val());
                            $('#contact_number').text($('#contact_number_edit').val());
                        }
                    }
                },
                error       : function(msg){
                    console.log(msg);
                }
            });
        }

        function hasChanges(){
            if($('#lastname_edit').val() != $('#lastname').text()){
                return true;
            }else if($('#firstname_edit').val() != $('#firstname').text()){
                return true;
            }
            else if($('#physical_address_edit').val() != $('#physical_address').text()){
                return true;
            }
            else if($('#mailing_address_edit').val() != $('#mailing_address').text()){
                return true;
            }
            else if($('#email_address_edit').val() != $('#email_address').text()){
                return true;
            }
            else if($('#contact_number_edit').val() != $('#contact_number').text()){
                return true;
            }
            else{
                return false;
            }
        }

        function constructData(){
            var arr = {};

            arr['user_id']              = "<?php if(!isset($_SESSION['storeartonline_user_id'])){
                                    echo 0;
                                    }
                                     else{
                                     echo $_SESSION['storeartonline_user_id'];
                                     }?>";
            arr['lastname']             = $('#lastname_edit').val();
            arr['firstname']            = $('#firstname_edit').val();
            arr['physical_address']     = $('#physical_address_edit').val();
            arr['mail_address']         = $('#mailing_address_edit').val();
            arr['email_address']        = $('#email_address_edit').val();
            arr['contact_number']       = $('#contact_number_edit').val();

            return JSON.stringify(arr);
        }

        function showUser(){
            var user_id = "<?php if(!isset($_SESSION['storeartonline_user_id'])){
                                    echo 0;
                                    }
                                     else{
                                     echo $_SESSION['storeartonline_user_id'];
                                     }?>";
//            console.log(user_id);
            if(user_id != 0){
                $.ajax({
                    type        : 'POST',
                    data        : 'action=user2&data=' + user_id,
                    url         : '../controller/GetRecord_Controller.php',
                    success     : function(msg){
                        $('#btn_signin').css('display', 'none');
//                        $('#user_details').css('display', 'inline-block');
                        var result = JSON.parse(msg);
//                        console.log(msg);
                        if(result.status == 'success'){
                            var data = JSON.parse(result.data);

                            document.title = data.firstname;

                            $('#firstname').text(data.firstname);
                            $('#lastname').text(data.lastname);
                            $('#physical_address').text(data.physical_address);
                            $('#mailing_address').text((data.mail_address == null || data.mail_address == '') ? data.physical_address : data.mail_address);
                            $('#email_address').text(data.email_address);
                            $('#contact_number').text(data.contact_number);
                            $('#user_img').prop('src','<?php echo Utils::getDefaultProfilePicDir(); ?>' + data.user_pic);

                            //for input fields
                            $('#firstname_edit').val(data.firstname);
                            $('#lastname_edit').val(data.lastname);
                            $('#physical_address_edit').val(data.physical_address);
                            $('#mailing_address_edit').val(data.mail_address);
                            $('#email_address_edit').val(data.email_address);
                            $('#contact_number_edit').val(data.contact_number);
                        }
                    },
                    error       : function(msg){
                        var result = JSON.parse(msg);

                        if(result.status == 'error'){
                            console.log(result.error_message);
                        }
                    }

                });
            }
        }

        function getPurchaseHistory(){
//            var test = '<tr><td>July 6, 2014</td><td>1</td><td><table class="table"><tr><td class="td-label">Item Name</td><td class="td-label">Quantity</td><td class="td-label">Price</td></tr><tr><td>item1</td><td>3</td><td>80</td></tr></table></td><td>Yes</td><td>100</td></tr>';
//
//            $('#purchase_history > table').append(test);

            $.ajax({
                type                : 'POST',
                url                 : '../controller/GetRecord_Controller.php',
                data                : 'action=purchaseHistory&data=' + <?php echo isset($_SESSION['storeartonline_user_id']) ? $_SESSION['storeartonline_user_id'] : 0;  ?>,
                success             : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        var data = JSON.parse(result.data);
//                        var innerTable = '<table class="table"><tr><td class="td-label">Item Name</td><td class="td-label">Quantity</td><td class="td-label">Price</td></tr></table>';

                        for(var j = 0; j < data.length; j++){
                            var innerTr = '';

                            for(var i = 0; i < data[j].item_count; i++){
                                innerTr += '<tr><td>' + data[j].product_name + '</td><td>' + data[j].quantity + '</td><td>' + data[j].product_price + '</td></tr>';
//                                console.log('true loop')
                            }
                            var innerTable = '<table class="table"><tr><td class="td-label">Item Name</td><td class="td-label">Quantity</td><td class="td-label">Price</td></tr>' + innerTr + '</table>';

                            $('#purchase_history > table').append('<tr><td>' + data[j].order_date + '</td><td>' + data[j].item_count + '</td><td>' + innerTable + '</td><td>' + data[j].confirm_payment + '</td><td>' + data[j].total_price + '</td></tr>')
//                            console.log('true append');
                        }

                    }
                },
                error               : function(msg){

                }
            });
        }

        function getWishlist(){
            $.ajax({
                type             : 'POST',
                url              : '../controller/GetRecord_Controller.php',
                data             : 'action=wishlist&data=' + <?php echo isset($_SESSION['storeartonline_user_id']) ? $_SESSION['storeartonline_user_id'] : 0;  ?> ,
                success          : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        var data = JSON.parse(result.data);

                        for(var i = 0; i < data.length; i++){
                            $('#wishlist > table').append('<tr><td>' + data[i].name + '</td><td>' + data[i].brand + '</td><td>' + data[i].description + '</td><td>Php ' + data[i].price + '</td><td><button class="btn btn-default button-template" style="background-color: yellowgreen" onclick="document.locaion = redirectToItem(' + data[i].product_id + ') ">See Item</button> </td></tr>');
                        }
                    }
                },
                error            : function(msg){

                }
           });
        }

        function getRequest(){
            $.ajax({
                type                : 'POST',
                url                 : '../controller/GetRecord_Controller.php',
                data                : 'action=request&data=' + <?php echo isset($_SESSION['storeartonline_user_id']) ? $_SESSION['storeartonline_user_id'] : 0;  ?> ,
                success             : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        var data = JSON.parse(result.data);

                        for(var i = 0; i < data.length; i++){
                            $('#request > table').append('<tr><td class="col-sm-3">' + data[i].date_created + '</td><td class="col-sm-3">' + data[i].request_subject + '</td><td>' + data[i].request_details + '</td><td>' + data[i].has_attended + '</td></tr>');
                        }
                    }
                },
                error               : function(msg){

                }
            })
        }
    </script>
    </body>
</html>