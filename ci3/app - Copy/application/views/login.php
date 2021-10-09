<div class="bbp-wrapper wrap-primary">
    <div class="content-login position-absolute top-50 start-50 translate-middle">
        <div class="text-center">
            <img class="img-fluid w-50" src="<?=base_url('/asset/img/logo.png')?>" alt="logo banner" >
            <h4 class="text-center fw-bold mb-4">Bic-Ben Company Limited</h4>
        </div>
        <div class="bg-white p-3 shadow-sm">
            <form>
                <p class="text-center mb-2">
                    ลงชื่อเข้าใช้งาน
                </p>
                <div class="input-group mb-3">
                    <input id="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                    <div class="input-group-text ">
                        <i class="fas fa-envelope fa-fw fc-grey "></i>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control" placeholder="รหัสผ่าน" autocomplete="off">
                    <div class="input-group-text">
                        <i class="fas fa-lock fa-fw fc-grey"></i>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="flex-fill my-auto">
                        <input id="remember" type="checkbox" class="form-check-input me-1" checked>
                        <label for="remember" class="form-check-label fw-bold">Remember me</label>
                    </div>
                    <div>
                        <button id="login" type="button" class="btn btn-primary" style="width:160px;">เข้าสู่ระบบ</button>
                    </div>
                </div>
            </form>
        </div>
        <h6 class="text-center mt-2"><b>Admin</b>LTE</h6>
    </div>
</div>
<script src="<?=base_url('asset/js/bbp-system.js')?>"></script>
