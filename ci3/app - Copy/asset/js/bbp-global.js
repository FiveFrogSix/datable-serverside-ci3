let base_url = 'https://'+$(location).attr('host')+'/app/';

console.log(base_url);

$(function(){
    $('#logout').click(logout);
    $('button[name="show_password"]').click(function(){
        const type = $(this).next().attr("type");
        if(type == 'password') {
            $(this).children().removeClass('fa-eye-slash').addClass('fa-eye');
            $(this).next().attr('type','text');
        }else{
            $(this).children().removeClass('fa-eye').addClass('fa-eye-slash');
            $(this).next().attr('type','password');
        }
    })
})

function errorAlert(code,body){
    swal.fire({
        icon: 'error',
        title: 'เกิดข้อผิดพลาด '+code,
        html: body,
        confirmButtonText: 'ตกลง',
        heightAuto: false,
    });
}
function successToast(title,timer){
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
      
    Toast.fire({
        icon: 'success',
        title: title,
        heightAuto: false,
    });
}

function logout(){
    $.get(base_url+'p/logout',function(){
        document.location.reload();
    });
}

console.log("%c Bic-Ben Paint Company Limited.","background:#fb2f86;"); 


