/**
 * Created by David on 6/13/14.
 */


function menuList(menuTitle){

    switch(menuTitle){
        case 'home': console.log(menuTitle);
            document.location = './home.php';
            break;
        case 'cars': console.log(menuTitle);
            document.location = './cars.php';
            break;
        case 'computer': console.log(menuTitle);
            document.location = './computer.php';
            break;
        case 'solutions': console.log(menuTitle);
            document.location = './solutions.php';
            break;
    }
}

function logout(){
    $.ajax({
        type        : 'POST',
        data        : 'action=logout',
        url         : '../controller/UpdateRecord_Controller.php',
        success     : function(msg){
            if(msg == 'true' || msg == '1'){
                $('#btn_signin').css('display', 'inline-block');
                $('#user-details').css('display', 'none');
                localStorage.removeItem('myCredentials');
//                document.reload(true);
            }
        },
        error       : function(msg){
            console.log(msg);
        }
    })
}

function redirectToLogin(redirectAfter){
    if(redirectAfter == ''|| redirectAfter == null){
        document.location = '../view/login.php';
    }
    else{
        document.location = '../view/login.php' + '?redirectUrl=http://' + redirectAfter;
    }
}

function redirectToItem(item_id){
    document.location = '../view/item.php?item=' + item_id;
}

function toUpperCaseFirstLetter(string){
    return string.replace(/\b[a-z]/g, function(letter){
        return letter.toUpperCase();
    });
}

function showUser(){

    if(localStorage['myCredentials'] != null){
        var data = JSON.parse(localStorage['myCredentials']);
        if(data != null){
            $('#user-name').text(data.firstname);
            $('#user_img').prop('src', '../images/profile_pics/' + data.user_pic);
            $('#btn_signin').css('display', 'none');
            $('#user-details').css('display', 'inline-block');
        }
    }
}

function requestItem(){
    $('#request-item').on('click', function(evt){

        if($('#user-details').css('display') == 'none'){
            $('span#alert-message').text('Please login first!');
            $('#alert-dialog-modal').modal('show');
        }
        else{
            $('#request-form-modal').modal('show');
        }

    });
}

function search(){
    $('#btn-search').on('click', function(evt){
        document.location = './search.php?q=' + $('#search-box').val();
    });

    $('#search-box').on('keypress', function(evt){
        if(evt.which == 13){
            $('#btn-search').click();
        }
    });
}