
$(document).ready(function(){
    $('#info_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "https://api.fivefrogsix.com/api/serverside2",
            type: "get",
            dataSrc: "data",
            error: function(error){
                console.log(error.responseText)
            }
        },
        language: {
            url : 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/th.json'
        },
        order: [],
        columns: [
                    {
                        data: 'name',

                    },
                    {
                        data: 'depart'
                    },
                    {
                        data: 'salary', 
                        className: 'text-end'
                    },
                    {
                        data: 'id',
                        className: 'text-center',
                        width:'5%', 
                        orderable: false,
                        render: function(data,type){
                            let btn =   '<div class="btn-group">'+
                                            '<button  class="btn btn-secondary btn-sm shadow-none dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false" area-label>'+
                                                '<i class="fas fa-ellipsis-h"></i>'+
                                            '</button> '+
                                            '<ul class="dropdown-menu">'+
                                                '<li><button class="dropdown-item" >ดูข้อมูล</button></li>'+
                                                '<li><button class="dropdown-item" >แก้ไข</button></li>'+
                                                '<li><button class="dropdown-item" >ลบ</button></li>'+
                                                '<li><button class="dropdown-item" >ปิด</button></li>'+
                                            '</ul>'+
                                        '</div>';
                            return btn;
                        }
                    },
                ],
    });
})