$(function(){
    const UserElement = $('#username');
    UserElement.focus();

    $('#login').click(loging);
    $('#username, #password').keydown(function(e){ if(e.key == 'Enter'){loging();}});

    function loading(bool){ //loading
        //
    }

    function loging(){ //login
        const username = $('#username').val();
        const password = $('#password').val();
        const loginBtn = $('#login');

        if(username == ''){
            return errorAlert('','กรุณากรอกชื่อผู้ใช้งาน');
        }
        
        if(password == ''){
            return errorAlert('', 'กรุณากรอกรหัสผ่าน');
        }

        $.ajax({
            url : base_url+'api/authentication/1',
            type : 'post',
            async : false,
            cache: false,
            dataType : 'json',
            data : {
                username: username,
                password: password,
            },
            beforeSend : function(){
                loginBtn
                .removeClass('btn-primary')
                .addClass('disabled btn-secondary')
                .html('<i class="fas fa-spinner fa-pulse"></i> กำลังเข้าสู่ระบบ');
            },
            success : function(data){
                if(data.status == true){
                    $('#username, #password').val('');
                    document.location.reload();
                }else{
                    $('#password').val('');
                    loginBtn
                    .removeClass('disabled btn-secondary')
                    .addClass('btn-primary')
                    .html('เข้าสู่ระบบ');
                }
            },
            error : function(xhr, textStatus, error){
                console.log(xhr.responseText);
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        })
    }
    
    
})