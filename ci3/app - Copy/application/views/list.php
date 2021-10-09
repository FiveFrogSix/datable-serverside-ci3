<div class="bbp-wrapper wrap-primary"> 
    <?php $this->load->view('inc/sidebar'); ?>
    <?php $this->load->view('inc/navbar'); ?>
    <!-- Start Container -->
    <div class="bbp-container">
        <!-- breadcrumb -->
        <div class="d-flex px-2">
            <div class="flex-grow-1">
                <h4 class="text-primary fw-bold">จัดการ E-Mail</h4> 
            </div>
            <div>
                <nav aria-label="breadcrumb" class="mt-1">
                    <ol class="breadcrumb " >
                        <li class="breadcrumb-item align-middle"><a href="<?=base_url()?>">หน้าแรก</a></li>
                        <li  class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid bg-light rounded shadow-sm p-0">
            <div class="border-bottom p-3">
                <button id="create_email" type="button" class="btn btn-primary btn-sm btn-fixed-1">
                    <i class="fas fa-user-plus"></i>
                    <span class="ms-1">สร้างอีเมลล์ใหม่</span> 
                </button>
            </div>
            <div class="p-3">
                <table id="emailTB" class="table table-stripped table-hover table-bordered responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>E-Mail</th>
                            <th>ชื่อ</th>
                            <th>แผนก</th>
                            <th>เปลี่ยนรหัสผ่าน</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody id="emailBD"></tbody>
                </table>
            </div>
        </div>
    <!-- End Container -->
</div>
<!-- Modal Zone -->
<div class="modal fade" id="craeteEmailModel" aria-labelledby="craeteEmailModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="craeteEmailModelLabel"><i class="fas fa-user-plus"></i> สร้างอีเมลใหม่</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="create_form">
            <label class="fs-6 fw-bold mb-2" for="name">
                <i class="fas fa-user-alt fa-fw"></i>
                ชื่อพนักงาน
            </label>
            <div id="name_autocom" class="input-group  mb-3">
                <input type="text" class="form-control " id="name" placeholder="ระบุชื่อพนักงาน" autocomplete="off">
                <button id="syncEmployee" type="button" class="btn btn-primary"><i class="fas fa-sync-alt fa-fw"></i></button>
            </div>

            <label class="fs-6 fw-bold mb-2" for="depart">
                <i class="fas fa-briefcase fa-fw"></i>
                แผนก
            </label>
            <div id="depart_autocom"  class="input-group  mb-3" >
                <button type="button" name="drop_select" class="btn icon-end">
                    <i class="fas fa-caret-down fa-fw"></i>
                </button>
                <input type="text" class="form-control rounded " id="depart" placeholder="ระบุแผนกบริษัท" autocomplete="off" role="button">
            </div>

            <label class="fs-6 fw-bold mb-2" for="email">
                <i class="fas fa-envelope fa-fw"></i>
                อีเมล
            </label>
            <div class="input-group  mb-3">
                <input type="email" class="form-control " id="email" placeholder="ระบุเมล" autocomplete="off">
                <span class="input-group-text fw-bold" id="basic-addon2">@bicben.com</span>
            </div>

            <label class="fs-6 fw-bold mb-2" for="email">
                <i class="fas fa-lock fa-fw"></i>
                รหัสผ่าน
                <!-- <button class="btn badge  bg-success text-light ms-1">สุ่มรหัสผ่าน</button> -->
            </label>
            <div class="input-group mb-3">
                <button type="button" name="show_password" class="btn icon-end">
                    <i class="fas fa-eye-slash fa-fw"></i>
                </button>
                <input type="password" class="form-control rounded" id="password" placeholder="ระบุรหัสผ่าน" autocomplete="off">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-primary fw-bold btn-fixed-modal" data-bs-dismiss="modal">ยกเลิก</button>
        <button id="create" type="button" class="btn btn-primary btn-sm btn-fixed-modal">สร้าง</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="changePasswordModal" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel"><i class="fas fa-unlock-alt"></i> เปลี่ยนรหัสผ่าน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="">
            <label class="fs-6 fw-bold mb-2" for="depart">
                <i class="fas fa-user-lock fa-fw"></i>
                ผู้ใช้งาน
            </label>
            <div   class="input-group  mb-3" >
                <input id="user_password" type="text" class="form-control "   autocomplete="off"  readonly>
            </div>

            <label class="fs-6 fw-bold mb-2" for="depart">
                <i class="fas fa-key fa-fw"></i>
                รหัสผ่านใหม่
            </label>
            <div class="input-group  mb-3" >
                <button type="button" name="show_password" class="btn icon-end">
                    <i class="fas fa-eye-slash fa-fw"></i>
                </button>
                <input id="pass_password" type="password" class="form-control " id="" placeholder="ป้อนรหัสผ่านใหม่" autocomplete="off" >
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-primary fw-bold btn-fixed-modal" data-bs-dismiss="modal">ยกเลิก</button>
        <button id="changePassSubmit" type="button" class="btn btn-primary btn-sm btn-fixed-modal">เปลี่ยนรหัสผ่าน</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Zone -->
<script>
    $(function(){
        //start run script
        EmailTable($('#emailTB'),1);
        //end run script

        $('title, li[aria-current="page"]').text('จัดการ E-Mail');


        //start key event
        nextTab($('#name'), $('#depart'));
        nextTab($('#email'), $('#password'));

        $('#password').keyup(function(e){
            if(e.key == 'Enter'){
                const set = {
                    btn: $('#create'),
                    name: $('#name').val(),
                    depart: $('#depart').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                }
                createEmail(set);
            }
        })

        //end key event

        //start click event

        $('#create_email').click(function(){
            $('#craeteEmailModel').modal('show');
            setTimeout(function(){ $('#name').focus();},470);
        });

        $('#create').click(function(){
            const set = {
                btn: $(this),
                name: $('#name').val(),
                depart: $('#depart').val(),
                email: $('#email').val(),
                password: $('#password').val(),
            }
            createEmail(set);
        })

        $('#syncEmployee').click(function(){
            employeeSync($(this));
        });

        $('#emailBD').on('click','button[name="change_password"]',function(){
            const email = $(this).val();
            $('#user_password').val(email);

            $('#changePasswordModal').modal('show');    
            $('#pass_password').val('');
            setTimeout(function(){
                $('#pass_password').focus();
            },200)
        });

        $('#changePassSubmit').click(function(){ //เปลี่ยนรหัสผ่าน
            const set = {
                btn: $(this),
                email: $('#user_password').val(),
                password: $('#pass_password').val(),
            }
            changePasseEmail(set);
        });

        //end click event

        // start autocom
        $('#name').autocomplete({
            appendTo: '#name_autocom',
            source: function( request, response ) {
                    $.ajax({
                    url: base_url+"api/employee/local",
                    type: 'get',
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function( data ) {
                        response( data );
                    },
                    error: function(error){
                        console.log(error.responseText);
                    }
                });
            },
            minLength: 1,
            select: function( event, ui ) {
                $('#depart').focus();
            }
        });
        // end autocom

        // start selectcom

        $('#depart').autocomplete({
            appendTo: "#depart_autocom",
            source: function( request, response ) {
                $.ajax({
                    url: base_url+"api/department/view",
                    dataType: "json",
                    data: {
                        term: request.term,
                    },
                    success: function( data ) {
                        response(data);
                    },
                    error : function(error){
                    }
                });
            }, 
            minLength: 0,
            focus: function(event,ui) {
                return false;
            },
            select: function( event, ui ) {
                $(this).attr('placeholder',ui.item.value).val(ui.item.value);
                $('#depart').val(ui.item.value);
                setTimeout(function(){$('#depart').blur();},1)
                return false;
            }
        }).blur(function(){
            let value =  $(this).attr('placeholder');
            $(this).val(value);
            $('.ui-autocomplete').removeClass('ui-h-50');
            $(this).prev().html('<i class="fas fa-caret-down fa-fw"></i>')
        });

        $('#depart').click(function() { //input
            let input = $('#depart');
            input.prev().html('<i class="fas fa-caret-up fa-fw"></i>')
            input.val('');
            input.autocomplete('search', $('#depart').val())
            $('.ui-autocomplete').addClass('ui-h-50');
            
            if(input.val() == ''){
                return false;
            }
            input.attr('placeholder',input.val());
        })

        $('button[name="drop_select"]').click(function() { //arrow
            let btn = $(this);
           
            btn.html('<i class="fas fa-caret-up fa-fw"></i>')
            btn.next().val('');
            btn.next().autocomplete('search', btn.next().val())
            $('.ui-autocomplete').addClass('ui-h-50');
            if(btn.next().val() == ''){
                return false;
            }
            btn.attr('placeholder',btn.next().val());
        })
        

        // end selectcom


        function createEmail(set){
            let depart;

            if(set.name == ''){
                $('#name').focus();
                return errorAlert('', 'กรุณาป้อนชื่อ');
            }

            if(set.depart == ''){
                depart = 'ไม่ได้เลือแผนก';
            }else{
                depart = set.depart;
            }

            if(set.email == ''){
                $('#email').focus();
                return errorAlert('', 'กรุณาป้อนเมล');
            }
            if(set.password == ''){
                $('#password').focus();
                return errorAlert('', 'กรุณาป้อนรหัสผ่าน');
            }

            $.ajax({
                url: base_url+'api/usermail/2',
                type: 'post',
                dataType: 'json',
                data: {
                    name: set.name,
                    depart: set.depart,
                    email: set.email,
                    password: set.password,
                },
                beforeSend: function(){
                    set.btn.addClass('disabled').html('<i class="fas fa-spinner fa-fw fa-pulse"></i>');
                },
                success: function(data){
                    set.btn.removeClass('disabled').html('สร้าง');
                    $('#emailTB').DataTable().destroy();
                    $('#craeteEmailModel').modal('hide');
                    successToast('สร้างสำเร็จ',1800);
                    EmailTable($('#emailTB'),1);

                    //clear form
                    $('#name, #depart, #email, #password').val('');
                    $('#depart').attr('placeholder','ระบุแผนก');
                },
                error: function(error){
                    console.log(error.responseText)
                }
            })
        }

        function changePasseEmail(set){

            $.ajax({
                url: base_url+'api/usermail/3',
                type: 'post',
                dataType: 'json',
                data: {
                    email: set.email,
                    password: set.password
                },
                beforeSend: function(){
                    set.btn.addClass('disabled').html('<i class="fas fa-spinner fa-fw fa-pulse"></i>');
                },
                success: function(data){
                    $('#pass_password').val('');
                    set.btn.removeClass('disabled').html('เปลี่ยนรหัสผ่าน');
                    $('#changePasswordModal').modal('hide'); 
                    successToast('เปลี่ยนรหัสผ่านสำเร็จ',1800);
                },
                error: function(error){
                    console.log(error.responseText)
                }
            })
        }

        function EmailTable(element,type){
            element.DataTable({
                ajax: {
                    url: base_url+'api/usermail/1',
                    type: 'get',
                    dataType: 'json',
                    dataSrc: '',
                    complete: function(){
                    },
                },
                columns: [
                    {data: 'email', className: 'text-start'},
                    {data: 'name', className: 'text-start'},
                    {data: 'depart', className: 'text-start'},
                    {data: 'pass', className: 'text-center', width: '5%',orderable: false},
                    {data: 'del', className: 'text-center',width:'5%',orderable: false},

                ],
                language: {
                    url: base_url+'asset/library/Datatable-Lang/Thai.json'
                },
                responsive: true,
                autoWidth: false
            })
        }

        function employeeSync(btn){
            $.ajax({
                url: base_url+'api/employee/personel',
                type: 'post',
                // dataType: 'json',
                beforeSend: function(){
                    btn.addClass('disabled').html('<i class="fas fa-sync-alt fa-fw fa-spin"></i>');
                },
                success: function(data){
                    setTimeout(function(){
                        btn.removeClass('disabled').html('<i class="fas fa-sync-alt fa-fw"></i>');
                    },1000)
                    $('#name').focus();
                },
                error: function(error){
                    console.log(error.responseText)
                }
            })
        }

        function nextTab(mainEle, nextEle){
            mainEle.keydown(function(e){
            if(e.key == 'Tab'){
                nextEle.focus();
                    return false;
                }
            })
        }

    })
</script>