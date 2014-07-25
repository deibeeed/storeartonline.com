<?php
if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>



        <!-- loading css -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/stylesheet.css">
        <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dijit/themes/claro/claro.css">-->
        <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <!-- loading dojo -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dojo/dojo.js" data-dojo-config="async: true"></script>-->
        <title>Store Art Online | Your online Store</title>

        <link rel="shortcut icon" href="../images/logo_32x32.png" type="image/png">

    </head>
    <body>

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
                <button id="btn_signin" class=" button-template btn btn-default" style="background-color: #4387fd; color: #ffffff;" onclick="redirectToLogin();">
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
                    <!--            <img id="user_img" class="img-circle dropdown-toggle" src="../images/1.jpg" data-toggle="dropdown" style="width: 38px; height: 38px;"/>-->
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
            <!-- category div -->
            <div id="category-div" style="display: none; height: 100%; /*padding: 10px;*/">
                <div class="navbar navbar-default" role="navigation" style="background-color: #ffffff; border: none;">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <span class="glyphicon glyphicon-chevron-down"></span> </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action1</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end category div-->
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

        <!-- home content body div -->
        <div class="container">

            <!-- container 1 -->
            <div class="pull-right" style="margin-top: 25px; /*text-align: right;*/ width: 80%; display: inline-block;">

                <h2 style="/*margin: 0px 50px 0px 248px;*/margin-right: 50px; border: 0; padding: 5px;">
                    <a href="#">Not Available at a moment</a>
                    <!--<button class="btn btn-default button-template" style="float: right; background-color: yellowgreen;">see more</button>-->
                </h2>

            </div>
            </div>
        <!-- end home content body div -->

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
                        <h4 class="modal-title" id="alert-dialog-title">Alert!</h4>
                    </div>
                    <div class="modal-body">
                        <span class="glyphicon glyphicon-warning-sign" style="margin-right: 5px;"></span> <span id="alert-message" style="/*font-size: 20px;*/">text here</span> <br><br>
                        <button type="button" class="btn btn-default button-template" style="background-color: #4387FD;" data-dismiss="modal">Ok</button>
                        <!--                    <button type="button" class="btn btn-default button-template" style="background-color: darkgrey;" data-dismiss="modal">Cancel</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!--  end of modal  -->

        <!--<script>-->
        <!--require([-->
        <!--'dojo/dom',-->
        <!--'dojo/fx',-->
        <!--'dojo/domReady!'-->
        <!--], function(dom, fx){-->
        <!--var greetingNode = dom.byId('logo');-->
        <!--greetingNode.innerHTML += 'From dojo!';-->

        <!--fx.slideTo({-->
        <!--node: greetingNode,-->
        <!--top: 100,-->
        <!--left: 200-->
        <!--}).play();-->
        <!--});-->
        <!--</script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/storeartonline-common-scripts.js"></script>
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
                requestItem();
                search();
            });

            $('#btn-send').on('click', function(evt){
                $.ajax({
                    type            : 'POST',
                    url             : '../controller/AddUser_Controller.php',
                    data            : 'action=request&data=' + constructRequestData(),
                    success         : function(msg){
//                    console.log(msg);
                        var result = JSON.parse(msg);

                        if(result.status == 'success'){
//                        alert('Your request has been sent. We will respond to your request as soon as possible. Thank you for your patronage.');
                            $('div#alert-dialog-modal > div.modal-dialog > div.modal-content > div.modal-body > span#alert-message').text('Your request has been sent. We will respond to your request as soon as possible. Thank you for your patronage.');
                            $('#request-form-modal').modal('hide');
                            $('div#alert-dialog-modal').modal('show');
                            $('#request_subject').val('');
                            $('#request_details').val('');
                        }
                        else{
                            alert('An error was encountered while sending your request. Please try again.');
                        }
                    },
                    error           : function(msg){
                        alert('An error was encountered while sending your request. Please try again.');
                    }
                });
            });

            $('#btn-cancel').on('click',function(evt){
                $('#request_subject').val('');
                $('#request_details').val('');
            });

            function constructRequestData(){
                var arr = {};

                arr['request_subject'] = $('#request_subject').val();
                arr['request_details'] = $('#request_details').val();
                arr['user_id'] = "<?php echo isset($_SESSION['storeartonline_user_id']) ? $_SESSION['storeartonline_user_id'] : 0;  ?>";

                return JSON.stringify(arr);
            }
        </script>
        <!-- loading dojo -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dojo/dojo.js" data-dojo-config="isDebug: true, async: true, parseOnLoad: true"></script>-->
        <!--<script>-->
        <!--require([-->
        <!--'dijit/form/TextBox',-->
        <!--'dijit/form/Button',-->
        <!--'dojo/parser',-->
        <!--'dojo/domReady!'-->
        <!--]);-->
        <!--</script>-->
    </body>
</html>