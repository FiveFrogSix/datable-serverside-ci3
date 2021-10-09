$(function(){
    const sidebar = $('.bbp-sidebar');
    const container = $('.bbp-container');
    const queryRoot = document.querySelector(':root'); //คิวรี่ค่า :root จาก css
    // queryRoot.style.setProperty('--contentwidth', width+'px'); //เปลี่ยนค่าตัวแปรจาก :root ตามชื่อ


    let bodyElement = $('body');
    let BackdropSidebar = '<div class="side-backdrop"><div>';
    let widthGlobal =  $('body')[0].offsetWidth;
  
    $('#toggle').click(function(){
        widthGlobal =  $('body')[0].offsetWidth;
        collapse_menu();
        if(widthGlobal <= 567){
            $('body').prepend(BackdropSidebar);
        }
        if(bodyElement.hasClass('sidebar-expand') == false){
            $('body').addClass('sidebar-expand');
            collapse_menu(0);
        }else{
            $('body').removeClass('sidebar-expand');
            collapse_menu(1);
        }
    })

    $(document).on('click','.nav-link',function(){ 
        let elementCheck = $(this).children()[1].childNodes[1];
        if(elementCheck !== undefined){
            if($(this).hasClass('collapsed') == true){
                $(this).removeClass('open');
            }else{
                $(this).addClass('open');
            }

        }
    })

    $(document).on('click','.side-backdrop',function(){ // เรียก backdrop sidebar
        if(bodyElement.hasClass('sidebar-expand') == true){
            bodyElement.removeClass('sidebar-expand');
            $(this).remove();
        }
    })

    //active menu
    active_menu();
    function active_menu(){
        const url = window.location.pathname.split('/');
        const last = url.length-1;

        if(last > 2){
            $('#'+url[last]).addClass('active')
        }else{
            $('#dashboard').addClass('active')
        }
    }

    //collpase sidebar
    function collapse_menu(enable){
        $.ajax({
            url : base_url+'config/collpase_sidebar/'+enable,
            type : 'get',
            async: false,
        })
        
    }

    
})
