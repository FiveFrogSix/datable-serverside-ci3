
<!-- Start Sidebar"> -->
    <aside  class="bbp-sidebar position-absolute text-light bg-dark ">
            <div class="pt-2">
                <a href="<?=base_url()?>"  aria-label="นี่คือโลโก้หรือเแบนเนอร์" class="brand-logo">
                    <span class="icon-bicben fs-2"></span>
                    <p class="nav-label mt-1">ระบบจัดการ E-mail</p>
                </a>
            </div>
            
            <hr>
            <nav>
                <ul class="d-flex flex-column nav nav-pills p-2 gap-1">
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" id="dashboard" href="<?=base_url()?>" aria-label="นี่คือแดชบอร์ด" aria-hidden="true">
                            <i class="fas fa-tachometer-alt fa-fw"></i>
                            <p class="nav-label">แดชบอร์ด</p>
                        </a> 
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-nowrap " id="list" href="<?=base_url('p/list')?>" aria-label="นี่คือเมนูจัดการเมล์" aria-hidden="true">
                            <i class="fas fa-mail-bulk fa-fw"></i>
                            <p class="nav-label">จัดการ E-mail</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-nowrap" id="group" href="<?=base_url('p/group')?>" aria-label="นี่คือเมนูกลุ่มเมล์" aria-hidden="true">
                            <i class="fas fa-users fa-fw"></i>
                            <p class="nav-label">กลุ่ม E-mail</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-nowrap" id="filter_spam" href="<?=base_url('p/filter_spam')?>" aria-label="นี่คือเมนูจัดการสแปม" aria-hidden="true">
                            <i class="fas fa-users-slash fa-fw"></i>
                            <p class="nav-label">ตัวกรองสแปม</p>
                        </a>
                    </li>
                </ul>
            </nav>
    </aside>
<!-- End Sidebar -->