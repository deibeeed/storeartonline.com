
<?php
if(!isset($_SESSION['storeartonline_user_id'])){
    session_start();
}

$redirect_url = '';
if(isset($_GET['redirectUrl'])){
    $redirect_url = $_GET['redirectUrl'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/logo_32x32.png" type="image/png" />
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>
    <body style="background-color: #ffffff;">
        <div style="text-align: center; margin-top: 30px;">
            <img src="../images/logo_with_words_h78.png" />
            <div style="font-size: 18px; font-family: 'Open Sans', arial;">Login to continue shopping!</div><br>
            <div class="details-container" style="width: auto; padding: 30px; border-radius: 5px; background-color: #f2f2f2;" >
                <form role="form" style="width: 250px;">
                    <div class="form-group">
                        <img src="../images/1.jpg" class="img-circle" style="height: 100px; width: 100px;"/>
                    </div>
                    <div class="form-group">
                        <input id="email_address" class="form-control" type="email" placeholder="Email" style="border-radius: 0px;"/>
                        <input id="password" class="form-control" type="password" placeholder="Password" style="border-radius: 0px; margin-top: -1px;"/>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnAdd" class="button-template btn btn-default" style="background-color: #4387fd; width: 100%;">Login</button>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <a href="#">Forgot Password</a>
                    </div>
                </form>


            </div>
            <div style="text-align: center; margin-top: 10px;">
                <a href="./addUser.php" style="margin-top: 5px;">Create an account</a>
            </div>
        </div>
        <!-- scripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>
            $('#btnAdd').click(function(){
                var data = {};

                $.ajax({
                    type: 'POST',
                    data: 'action=login&data=' + constructData(),
                    url: '../controller/GetRecord_Controller.php',
                    success: function(msg){
//                        console.log(msg);
                        var result = JSON.parse(msg);
                        data = result;
                        if(result.status == 'success'){
                            showUser(result.user_id);

                            var redirectUrl = "<?php echo $redirect_url; ?>";
//
//                            if(redirectUrl == ''){
//                                document.location = '/view/home.php';
//                            }
//                            else{
//                                document.location = redirectUrl;
//                            }
                        }
                    },
                    error: function(msg){
                        alert('error in authenticating user');
                        console.log(msg);
                    }
                });
            });

            $('#password').on('keypress', function(evt){
                if(evt.keyCode == 13 || evt.which == 13)
                    $('#btnAdd').click();
            })

            function constructData(){
                var arr = {};

                arr['email_address'] = $("#email_address").val();
                arr['password'] = $('#password').val();

                return JSON.stringify(arr);
            }

            function getRedirectUrl(){
                var url = "<?php echo $redirect_url; ?>";

                console.log(url);
            }

            function showUser(user_id){

//            console.log(user_id);
                if(user_id != 0){
                    $.ajax({
                        type        : 'POST',
                        data        : 'action=user&data=' + user_id,
                        url         : '../controller/GetRecord_Controller.php',
                        success     : function(msg){
//                            console.log(msg);
                            var result = JSON.parse(msg);

                            if(result.status == 'success'){
//                                var data = JSON.parse(result.data);
                                localStorage['myCredentials'] = result.data;
//
//                                $('#user-name').text(data.firstname);
////                                        $('#user_img').src(data.user_pic);
//                                $('#btn_signin').css('display', 'none');
//                                $('#user-detials').css('display', 'inline-block');
                                var redirectUrl = "<?php echo $redirect_url; ?>";

                                if(redirectUrl == ''){
                                    document.location = '/view/home.php';
                                }
                                else{
                                    document.location = redirectUrl;
                                }
                            }
                        },
                        error       : function(msg){
                            console.log(msg);
                        }

                    });
                }
            }
        </script>
    </body>
</html>