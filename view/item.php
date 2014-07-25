<?php
if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}

$id = $_GET['item'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- loading css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blueimp-gallery.min.css" rel="stylesheet">
<!--    <link href="../css/bootstrap-image-gallery.min.css" rel="stylesheet">-->
    <link href="../css/jRating.jquery.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/stylesheet.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dijit/themes/claro/claro.css">-->

    <title>item</title>

    <link rel="shortcut icon" href="../images/logo_32x32.png" type="image/png">
</head>
    <body >
    <!-- header div -->
    <div style="display: inline-block; width: 100%">
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
            <button id="btn_signin" class="btn btn-default button-template" style="background-color: #4387fd;" onclick="redirectToLogin(constructRedirectUrl());">
                Sign in
            </button>
            <div id="user-details" style="display: none;">
                <a id="user-name" href="profile.php" style="margin-right: 3px;"></a>
                <div class="dropdown" style="display: inline-block;">
                    <img id="user_img" class="img-circle dropdown-toggle" src="../images/1.jpg" data-toggle="dropdown" style="width: 38px; height: 38px;"/>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li><a href="#" onclick="logout();">Logout</a></li>
                    </ul>
                </div>
            </div>
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
                <a data-menu-title="networking" href="#" class="list-group-item" style="height: 50px;" onclick="menuList('solutions')">
                    <img src="../images/network2.png" style="height: 35px; width: 35px;" />
                    <span class="list-group-item-text menu-title">Solutions</span>
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

    <!-- content body div -->
    <div class="container" style="/*height: 0px*/;">

        <!-- container -->
        <div style="/*background-color: #4387fd;*/ /* width: 100%; display: inline-block;*/">

            <!-- details container -->
            <div class="details-container" style="display: inherit; height: 250px;">

                <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                <!-- cover container -->
                <div style="margin: 30px 0px 30px 248px; display: inline-block; /*float: left;*/vertical-align: middle;">
                 <img id="prod_img" src="../images/test.png" width="200px"/>
                </div>

                <!-- info container -->
                <div style="/*padding: 24px 50px 23px 468px;*/ line-height: 1.5em; display: inline-block; vertical-align: middle; margin-left: 10px; /*margin-top: 40px;*/">

                    <!-- title -->
                    <div id="name" style="color: #333; font-size: 28px; font-weight: 300; line-height: 35px; margin-bottom: 1px; white-space: normal;">
                        Samsung Galaxy S4
                    </div>

                    <!-- manufacturer -->
                    <div id="brand" style="color: #8d8d8d; display: inline-block; vertical-align: top; ">
                        Samsung
                    </div>

                    <!-- category -->
                    <div id="category">
                        Mobile
                    </div>

                    <!-- price -->
                    <div id="price">
                        Php 30,000
                    </div>
                    <!-- actions -->

                    <div>
                        <button id="btn-buy" class="btn btn-default" style="background-color: #282ee8; color: #ffffff;">
                            <span class="glyphicon glyphicon-ok" style="margin-right: 3px;"></span>
                            Buy
                        </button>
                        <button id="btn-wishlist" class="btn btn-default" style="background-color: yellowgreen; color: #ffffff;">
                            <span class="glyphicon glyphicon-list"></span>
                            Wishlist
                        </button>
                    </div>
                    <!-- social share/like -->
<!--                    <div style="display: inline-block; width: 100%;">-->
<!--                        <div style="float: left;"><button>share facebook</button></div>-->
<!--                        <div style="float: left;"><button>share google+</button></div>-->
<!--                        <div style="float: left;"><button>share twitter</button></div>-->
<!--                        <div style="float: left;"><button>like</button></div>-->
<!--                    </div>-->
                </div>
            </div>
            <!-- end details container -->

            <!-- pictures container -->
            <div class="description-container">
                <div id="links" style="display: inline-block;">
                    <ul id="photo" class="list-inline">
<!--                        <li>-->
<!--                            <a href="../images/s4_1.jpg" title="s4" data-gallery>-->
<!--                                <img src="../images/s4_1.jpg" alt="s4_1" style="height: 150px; display: inline-block;">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="../images/s4_2.jpg" title="s4" data-gallery>-->
<!--                                <img src="../images/s4_2.jpg" alt="s4_2" style="height: 150px; display: inline-block;">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="../images/s4_3.jpg" title="s4" data-gallery>-->
<!--                                <img src="../images/s4_3.jpg" alt="s4_3" style="height: 150px; display: inline-block;">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="../images/s4_4.jpg" title="s4" data-gallery>-->
<!--                                <img src="../images/s4_4.jpg" alt="s4_4" style="height: 150px; display: inline-block;">-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </div>
                <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                    <!-- The container for the modal slides -->
                    <div class="slides"></div>
                    <!-- Controls for the borderless lightbox -->
                    <h3 class="title"></h3>
                    <a class="prev">&#139;</a>
                    <a class="next">&#155;</a>
                    <a class="close">&#215;</a>
                    <a class="play-pause"></a>
                    <!--<ol class="indicator"></ol>-->
                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
                    <div class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body next"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left prev">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        Previous
                                    </button>
                                    <button type="button" class="btn btn-primary next">
                                        Next
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('links').onclick = function (event) {
                        event = event || window.event;
                        var target = event.target || event.srcElement,
                                link = target.src ? target.parentNode : target,
                                options = {index: link, event: event},
                                links = this.getElementsByTagName('a');
                        blueimp.Gallery(links, options);
                    };
                </script>

                <div class="details-section-divider"></div>
            </div>
            <!-- end of pictures container -->

            <!-- description container -->
            <div class="description-container">
                <!-- header div -->
                <div class="header">
                    Description
                </div>
                <!-- body div -->
                <div style="display: inline-block;">
                    <div id="description">

                    </div><br><br>
                    <table id="specs" class="table">
<!--                        <tr>-->
<!--                            <td class="col-sm-2 td-label">Name</td>-->
<!--                            <td class="col-sm-10">Galaxy S4</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="td-label">Manufacturer</td>-->
<!--                            <td>Samsung</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="td-label">Model</td>-->
<!--                            <td>I9505</td>-->
<!--                        </tr>-->
                    </table>
                    <div>
                        For more information, click <a href="#" id="source" target="_blank">here</a>
                    </div>
                </div>
                <div class="details-section-divider"></div>
            </div>
            <!-- end of descriptions container -->

            <!-- review -->
            <div class="description-container">
                <div class="header">
                    Reviews & Rating
                    <button id="btn-review-rate" class="btn btn-default button-template pull-right" style="background-color: yellowgreen;" >Rate It!</button>
                </div>
                <div style="display: inline-block;">
                    <div class="pull-left" style="height: 157px; width: auto; background-color: #ffffff; margin-right: 10px;">
                        <div class="col-sm-6" style="padding: 20px; text-align: center; display: inline-block; width: 160px;">
                            <div style="font-size: 48px;">4.5</div>
                            <div id="star-display" data-average="4.5">
                            </div>
                            <div style="padding: 5px;">
                                <span class="glyphicon glyphicon-user"></span>
                                <span>30,000 total</span>
                            </div>

                        </div>
                        <div class="col-sm-6" style="padding: 20px; display: inline-block; width: 160px;">
                            <div style="padding: 5px;">
                                <div style=";position: relative; width: 100%; height: 23px;">
                               <span style="margin-right: 3px; position: absolute; vertical-align: middle; left: -30px;">
<!--                                   <span class="glyphicon glyphicon-star" ></span>5-->
                                   <img src="../images/icons/small.png" style="background-color: #F4C239" />5
                               </span>
                                    <span id="rate-5-overlay" style=" position: absolute; display: inline-block; left: 5; top: 4; background-color: #88b131; width: 100%; height: 100%;"></span>
                                    <span id="rate-5-text" style="position: absolute; left: 5; top: 4;">25,000</span>
                                </div>
                                <div style=";position: relative; width: 100%; height: 23px;">
                               <span style="margin-right: 3px; position: absolute; vertical-align: middle; left: -30px;">
                                   <img src="../images/icons/small.png" style="background-color: #F4C239" />4
                               </span>
                                    <span id="rate-4-overlay" style="position: absolute; display: inline-block; left: 5; top: 4; background-color: #99cc00; width: 83%; height: 100%;"></span>
                                    <span id="rate-4-text" style="position: absolute; left: 5; top: 4;">25,000</span>
                                </div>
                                <div style=";position: relative; width: 100%; height: 23px;">
                               <span style="margin-right: 3px; position: absolute; vertical-align: middle; left: -30px;">
                                   <img src="../images/icons/small.png" style="background-color: #F4C239" />3
                               </span>
                                    <span id="rate-3-overlay" style="position: absolute; display: inline-block; left: 5; top: 4; background-color: #ffcf02; width: 20%; height: 100%;"></span>
                                    <span id="rate-3-text" style="position: absolute; left: 5; top: 4;">25,000</span>
                                </div>
                                <div style=";position: relative; width: 100%; height: 23px;">
                               <span style="margin-right: 3px; position: absolute; vertical-align: middle; left: -30px;">
                                   <img src="../images/icons/small.png" style="background-color: #F4C239" />2
                               </span>
                                    <span id="rate-2-overlay" style="position: absolute; display: inline-block; left: 5; top: 4; background-color: #ff9f02; width: 10%; height: 100%;"></span>
                                    <span id="rate-2-text" style="position: absolute; left: 5; top: 4;">25,000</span>
                                </div>
                                <div style=";position: relative; width: 100%; height: 23px;">
                               <span style="margin-right: 3px; position: absolute; vertical-align: middle; left: -30px;">
                                   <img src="../images/icons/small.png" style="background-color: #F4C239" />1
                               </span>
                                    <span id="rate-1-overlay" style="position: absolute; display: inline-block; left: 5; top: 4; background-color: #ff6f31; width: 19%; height: 100%;"></span>
                                    <span id="rate-1-text" style="position: absolute; left: 5; top: 4;">25,000</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- body -->
                    <div style="display: inline-block;">
                        <ul id="review-list" class="media-list">

                        </ul>
<!--                        <a href="">read more (4  more other reviews)</a>-->
                    </div>
                </div>

                <div class="details-section-divider"></div>
            </div>

            <!-- end of reviews -->

            <!-- related products -->
            <div class="description-container">
                <div class="header">
                    Related Products
                </div>

                <!-- body -->
                <div>
                    this is related products body
                </div>
                <div class="details-section-divider"></div>
            </div>
            <!-- end of related products-->
        </div>
        <!-- end of container -->
    </div>
    <!-- end content body div -->

    <!--  modals  -->
    <div class="modal fade" id="purchase-details-modal" role="dialog" arial-labelledby="purchase-details-modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="purchase-details-modal-title">Purchase Details</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="itm-quantity">Quantity</label>
                            <input id="itm-quantity" type="number" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button id="btn-confirm" type="button" class="btn btn-default button-template" style="background-color: dodgerblue"><span class="glyphicon glyphicon-ok"></span> Confirm</button>
                            <button id="btn-cancel" type="button" class="btn btn-default button-template" data-dismiss="modal" style="background-color: darkgrey"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
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

    <div class="modal fade" id="success-dialog-modal" role="dialog" aria-labelledby="success-dialog-title" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Success!</h4>
                </div>
                <div class="modal-body">
                    <div style="padding: 5px;"><span id="success-msg" style="font-size: 18px;">Successfully ordered item!</span></div>
                    <button type="button" class="btn btn-default button-template" style="background-color: dodgerblue; padding-right: 20px; padding-left: 20px;" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rate-review-dialog-modal" role="dialog" aria-labelledby="rate-review-dialog-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Review and Rate</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <form role="form">
                            <div class="form-group">
                                <input id="review-subject" class="form-control" type="text" placeholder="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea id="review-body" class="form-control" placeholder="body goes here..."></textarea>
                            </div>
                        </form>
                        <div id="star-review" style="font-size: 16px; cursor: pointer;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-review-submit" type="button" class="btn btn-default button-template" style="background-color: dodgerblue; padding-right: 20px; padding-left: 20px;" data-dismiss="modal" disabled>Submit</button>
                </div>
            </div>
        </div>
    </div>
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
    <!-- end of modals -->

    <!-- scriptss -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="../js/storeartonline-common-scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jRating.jquery.min.js"></script>
    <script src="../js/jquery.blueimp-gallery.min.js"></script>
    <script src="../js/blueimp-gallery.min.js"></script>
    <script>
        $(document).ready(function() {
            var stickyNavTop = $('.menu-container').offset().top;

            var stickyNav = function(){
                var scrollTop = $(window).scrollTop();

                if (scrollTop > stickyNavTop) {
                    $('.menu-container').addClass('sticky2');
                    $('div.details-container').css('display', 'inline-block');
                } else {
                    $('.menu-container').removeClass('sticky2');
                    $('div.details-container').css('display', 'inherit');
                }
            };

            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });

            getProduct();
            getProductRating();
            showUser();
            buyItem();
            reviewItem();
            getReview();
            requestItem();
            search();

            //rating modal;
            $('#star-review').jRating({
                showRateInfo            : false,
                step                    : true,
                canRateAgain            : true,
                nbRates                 : 100,
                sendRequest             : false,
                rateMax                 : 5,
                onClick                 : function(element, rate){
                    $('#btn-review-submit').prop('disabled', false);
                    $('#star-review').attr('data-rate-value', rate);
                }
            });

            //star rate display
//            $('#star-display').jRating({
//                isDisabled              : true,
//                showRateInfo            : false,
//                rateMax                 : 5,
//                step                    : true
//            });

            //rate item
//            $('div.stars-item').data('average', '4');
//            $('div.stars-item').jRating({
//                type                : 'small',
//                isDisabled          : true,
//                showRateInfo        : false,
//                step                : true,
//                rateMax             : 5
//            });

        });


        $('#btn-cancel').on('click', function(evt){
            $('#itm-quantity').val('');
        });

        $('#btn-wishlist').on('click', function(evt){

            if($('#user-details').css('display') == 'none'){
                $('#alert-dialog-modal').modal('show');
            }
            else{
                $.ajax({
                    type                : 'POST',
                    url                 : '../controller/GetRecord_Controller.php',
                    data                : 'action=wishlist_watch&data=' + constructWishlistData(),
                    success             : function(msg){
//                    console.log(msg);
                        var result = JSON.parse(msg);

                        if(result.status == 'success'){
//                        var data = JSON.parse(result.data);
                            if(result.data == 'false'){
                                $.ajax({
                                    type                : 'POST',
                                    url                 : '../controller/AddUser_Controller.php',
                                    data                : 'action=wishlist&data=' + constructWishlistData(),
                                    success             : function(msg){
//                                    console.log(msg);
                                        var result = JSON.parse(msg);

                                        if(result.status == 'success'){
                                            $('#success-msg').text('Successfully added item to wishlist');
                                            $('#success-dialog-modal').modal('show');
                                        }
                                    },
                                    error               : function(msg){

                                    }
                                });
                            }
                            else{
                                $('#success-msg').text('Item is already in your wishlist');
                                $('#success-dialog-modal').modal('show');
                            }
                        }
                    },
                    error               : function(msg){

                    }
                });
            }

        });

        $('#btn-review-submit').on('click', function(evt){
            $.ajax({
                type            : 'POST',
                url             : '../controller/AddUser_Controller.php',
                data            : 'action=review&data=' + constructReviewData(),
                success         : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        $('#success-msg').text('Successfully submitted review');
                        $('#success-dialog-modal').modal('show');
                    }
                },
                error           : function(msg){

                }
            });
        });

        function constructReviewData(){
            var arr = {};

            arr['user_id'] = "<?php echo (isset($_SESSION['storeartonline_user_id'])) ? $_SESSION['storeartonline_user_id'] : '0'; ?>";
            arr['product_id'] = "<?php echo $_GET['item']; ?>";
            arr['review_subject'] = $('#review-subject').val();
            arr['review_body'] = $('#review-body').val();
            arr['rate'] = $('#star-review').attr('data-rate-value');

            return JSON.stringify(arr);
        }

        function constructWishlistData(){
            var arr = {};

            arr['user_id'] = "<?php echo (isset($_SESSION['storeartonline_user_id'])) ? $_SESSION['storeartonline_user_id'] : '0'; ?>";
            arr['product_id'] = "<?php echo $_GET['item']; ?>";

            return JSON.stringify(arr);
        }

        function buyItem(){
            $('#btn-buy').on('click', function(evt){

                if($('#user-details').css('display') == 'none'){
                    $('#alert-dialog-modal').modal('show');
                }
                else{
                    $('#purchase-details-modal').modal('show');
                }

            });
        }

        function reviewItem(){
            $('#btn-review-rate').on('click', function(evt){

                if($('#user-details').css('display') == 'none'){
                    $('#alert-dialog-modal').modal('show');
                }
                else{
                    $('#rate-review-dialog-modal').modal('show');
                }

            });
        }

        $('#btn-confirm').on('click', function(evt){
            $.ajax({
                type            : 'POST',
                url             : '../controller/AddUser_Controller.php',
                data            : 'action=order&data=' + constructData(),
                success         : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);
                     if(result.status == 'success'){
                         $('#purchase-details-modal').modal('hide');
                         $('#success-dialog-modal').modal('show');
                     }
                },
                error           : function(msg){
                    console.log(msg);
                }
            });
        });

        function constructData(){
            var arr = {};
            var order_details = {};


            order_details['product_id'] = "<?php echo $_GET['item']; ?>";
            order_details['quantity'] = $('#itm-quantity').val();

            //supplying core_order
            arr['customer_user_id'] = "<?php echo (isset($_SESSION['storeartonline_user_id'])) ? $_SESSION['storeartonline_user_id'] : '0'; ?>";
            arr['order_details'] = new Array(order_details) ;

            return JSON.stringify(arr);

        }

        function constructRedirectUrl(){
            var url = "<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>";

            return url;
        }

        function getProduct(){
            var product_id = <?php echo $id; ?>

                $.ajax({
                    type        : 'POST',
                    url         : '../controller/GetRecord_Controller.php',
                    data        : 'action=product&data=' + product_id,
                    success     : function(msg){
//                        console.log(msg);
                        var result = JSON.parse(msg);
                        var data = JSON.parse(result.data);

                        if(result.status == 'success'){
                            $('#name').html(data.name);
                            $('#brand').html(data.brand);
//                            $('#category').html(data.category.toLowerCase().replace(/\b[a-z]/g, function(letter){
//                                return letter.toUpperCase();
//                            }));
                            $('#category').html(toUpperCaseFirstLetter(data.category));
//                            $('#specs').html(data.specs);
                            $('#description').html(data.description);

                            if(data.specs == null){
                                $('#specs').html('');
                            }
                            else{
                                $('#specs').html(data.specs.replace(/&amp;lt;/g, "<").replace(/&amp;gt;/g, ">").replace(/&quot;/g, '"').replace(/&trade;/g, '&#8482;').replace(/&reg;/g, '&#174;'));
                            }

                            $('#source').prop('href', data.source);

                            var photos = data.photo.split(',');
                            var tmp_photos = '';
                            for(var i = 0; i < photos.length - 1; i++){
                                tmp_photos += '<li><a href="../images/product/' + photos[i] + '" title="' + photos[i].split('.')[0] + '" data-gallery><img src="../images/product/' + photos[i] + '" alt="' + photos[i].split('.')[0] + '" style="height: 150px; display: inline-block;"></a></li>'
                            }
//                            $('#photo').html('<li><a href="../images/product/' + photos[0] + '" title="s4" data-gallery><img src="../images/s4_1.jpg" alt="s4_1" style="height: 150px; display: inline-block;"></a></li>');
                            $('#photo').html(tmp_photos);
                            $('#prod_img').prop('src', '../images/product/' + photos[0]);
                        }
                    },
                    error       : function(msg){

                    }

                })
        }

        function getReview(){
            $.ajax({
                type                : 'POST',
                url                 : '../controller/GetRecord_Controller.php',
                data                : 'action=review&data=' + <?php echo $_GET['item']; ?>,
                success             : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
                        var data = JSON.parse(result.data);

                        for(var i = 0; i < data.length; i++){
                        var test = '<li class="media"><a class="pull-left" href="#"><img src="../images/logo_32x32.png" class="img-circle" style="height: 50px; width: 50px; padding: 3px;" /></a><div class="media-body"><div class="media-heading"><span class="pull-left" style="margin-right: 10px; font-weight: bold; font-size: 12px;">David Duldulao</span><div class="stars-item" data-average="" style="font-size: 12px;"></div></div><span class="review-subject-item" style="font-weight: bold; font-style: italic; font-size: 16px;">Sounds fun! </span><i class="review-body-item" style="font-size: 16px;">This sure sounds fun! i like it!</i></div></li>';
//                            $('#review-subject-item').text(data[i].review_subject + ' ');
//                            $('#review-body-item').text(data[i].review_body);
                            $('#review-list').append('<li class="media"><a class="pull-left" href="#"><img src="../images/profile_pics/' + data[i].user_pic + '" class="img-circle" style="height: 50px; width: 50px; padding: 3px;" /></a><div class="media-body" style="/*width: 310px;*/"><div class="media-heading"><span class="" style="margin-right: 10px; font-weight: bold; font-size: 12px;">' + data[i].name + '</span><div class="stars-item" data-average="' + data[i].rate + '" style="font-size: 12px; display: inline-block;"></div></div><div style="max-width: 310px;"><span class="review-subject-item" style="font-weight: bold; font-style: italic; font-size: 16px;">' + data[i].review_subject + ' </span><i class="review-body-item" style="font-size: 16px;">' + (data[i].review_body == null ? '' : data[i].review_body) + '</i></div></div></li>');
                        }

                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.text = "$('div.stars-item').jRating({type                : 'small',isDisabled          : true,showRateInfo        : false,step                : true,rateMax             : 5});";
                        $('#review-list').append(script);
                    }
                },
                error               : function(msg){

                }
            });
        }

        function getProductRating(){
            var rating = "$('#star-display').jRating({isDisabled              : true,showRateInfo            : false,rateMax                 : 5,step                    : true});";

            $.ajax({
                type                : 'POST',
                url                 : '../controller/GetRecord_Controller.php',
                data                : 'action=rating&data=' + <?php echo $_GET['item']; ?>,
                success             : function(msg){
//                    console.log(msg);
                    var result = JSON.parse(msg);

                    if(result.status == 'success'){
//                        var data = JSON.parse(result.data);
                        $('div#star-display').prev().text((result.data.rate == null ? 0 : result.data.rate));
                        $('div#star-display').next().children('span:nth-child(2)').text(result.data.total_participant + ' total');
                        $('div#star-display').attr('data-average', (result.data.rate == null ? 0 : result.data.rate));

                        $('#rate-5-overlay').css('width', ((result.data.rate_5 / result.data.total_participant) * 100) + '%');
                        $('#rate-5-text').text(result.data.rate_5);
                        $('#rate-4-overlay').css('width', ((result.data.rate_4 / result.data.total_participant) * 100) + '%');
                        $('#rate-4-text').text(result.data.rate_4);
                        $('#rate-3-overlay').css('width', ((result.data.rate_3 / result.data.total_participant) * 100) + '%');
                        $('#rate-3-text').text(result.data.rate_3);
                        $('#rate-2-overlay').css('width', ((result.data.rate_2 / result.data.total_participant) * 100) + '%');
                        $('#rate-2-text').text(result.data.rate_2);
                        $('#rate-1-overlay').css('width', ((result.data.rate_1 / result.data.total_participant) * 100) + '%');
                        $('#rate-1-text').text(result.data.rate_1);

                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.text = rating;

                        $('div#star-display').append(script);
                    }
                },
                error               : function(msg){

                }
            });
        }
    </script>
    </body>
</html>