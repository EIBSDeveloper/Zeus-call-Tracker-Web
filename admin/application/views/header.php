<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch bg-primary">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-40px h-40px" id="kt_aside_toggle">
                <i class="fa-solid fa-bars fs-1 text-black text-hover-primary"></i>
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center header-logo flex-grow-1 flex-lg-grow-0">
            <a href="<?php echo base_url();?>Dashboard">
                <img alt="Logo" src="<?php echo base_url();?>assets/Images/logo_bg.png" class="logo-default w-150px h-50px me-2">
            </a>
            <a href="<?php echo base_url();?>Dashboard" id="kt_header_navs_toggle_new" class="d-flex align-items-center d-lg-none logo-sticky">
                <img alt="Logo" src="<?php echo base_url();?>assets/Images/logo_bg.png" class="h-45px">
            </a>
        </div>
        <!-- <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="index.html" class="d-lg-none">
                <img alt="Logo" src="< ?php echo base_url(); ?>assets/Images/logo_icon.png" class="h-50px" />
            </a>
        </div> -->
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_aside_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-600 menu-arrow-gray-500 fw-semibold fs-6 my-5 my-lg-0 px-2 px-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <a href="<?php echo base_url(); ?>Dashboard" class="menu-item me-0 me-lg-2" id="menu_hd_dashboards">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Dashboards</span>
                            </span>
                            <!--end:Menu link-->
                        </a>
                        <!--end:Menu item-->
                         <!--begin:Menu item-->
                        <a href="<?php echo base_url(); ?>Subscription_management" class="menu-item me-0 me-lg-2" id="menu_hd_mng_subs">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Subscription Management</span>
                            </span>
                            <!--end:Menu link-->
                        </a>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <a href="<?php echo base_url(); ?>Landing_page" class="menu-item me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Landing Page</span>
                            </span>
                            <!--end:Menu link-->
                        </a>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <a href="<?php echo base_url(); ?>Package_management" class="menu-item me-0 me-lg-2" id="menu_hd_mng_pckg">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Package Management</span>
                            </span>
                            <!--end:Menu link-->
                        </a>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" id="menu_hd_sett">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Settings</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3" href="<?php echo base_url();?>Generalsettings" id="menu_hd_gen_sett">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-vertical"></span>
                                        </span>
                                        <span class="menu-title text-black">General Settings</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3" href="<?php echo base_url();?>Couponcode" id="menu_hd_coup_sett">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-vertical"></span>
                                        </span>
                                        <span class="menu-title text-black">Coupon Code</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->

            </div>
            <!--end::Navbar-->

            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch justify-self-end flex-shrink-0">
                <!--begin::Notifications-->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="fas fa-bell fs-1"></i>
                        <span class="bullet bullet-dot bg-white h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                        id="kt_menu_notifications">
                       <!--begin::Heading-->
                        <div class="d-flex flex-column rounded-top bg-gray-800 text-white">
                            <!--begin::Title-->
                            <h3 class="fw-semibold px-9 mt-10 mb-6 text-white">Notifications</h3>
                            <!--end::Title-->
                            <div class="d-flex align-items-center justify-content-end px-3 py-1">
                                <a href="javascript:;" class="fs-6 fw-bold text-white text-hover-warning">Mark all as read</a>
                            </div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="scroll-y mh-325px px-2 py-1">
                            <a href="javascript:;" class="d-flex flex-stack px-2 py-2 bg-gray-300 bg-opacity-75 mb-1 text-hover-primary" style="border-radius: 10px;">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4">
                                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)">
                                            <div class="image-input-wrapper w-50px h-50px" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0 me-2">
                                        <div class="fs-6 text-gray-800 fw-bold">Abdul Nizamuddin M</div>
                                        <div class="d-block text-gray-800 fs-7">New Subscriber Joined & Paid Payment</div>
                                    </div>
                                </div>
                                <span class="badge badge-info fs-8">Just Now</span>
                            </a>
                            <a href="javascript:;" class="d-flex flex-stack px-2 py-2 bg-gray-300 bg-opacity-75 mb-1 text-hover-primary" style="border-radius: 10px;">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4">
                                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)">
                                            <div class="image-input-wrapper w-50px h-50px" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0 me-2">
                                        <div class="fs-6 text-gray-800 fw-bold">Gokul E</div>
                                        <div class="d-block text-gray-800 fs-7">New Subscriber Joined & Paid Payment</div>
                                    </div>
                                </div>
                                <span class="badge badge-info fs-8">5 Min</span>
                            </a>
                            <a href="javascript:;" class="d-flex flex-stack px-2 py-2 bg-gray-300 bg-opacity-75 mb-1 text-hover-primary" style="border-radius: 10px;">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4">
                                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)">
                                            <div class="image-input-wrapper w-50px h-50px" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0 me-2">
                                        <div class="fs-6 text-gray-800 fw-bold">Amaran D</div>
                                        <div class="d-block text-gray-800 fs-7">Silver Packages are Renewed</div>
                                    </div>
                                </div>
                                <span class="badge badge-info fs-8">30 Min</span>
                            </a>
                            <a href="javascript:;" class="d-flex flex-stack px-2 py-2 mb-1 text-hover-primary" style="border-radius: 10px;">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4">
                                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)">
                                            <div class="image-input-wrapper w-50px h-50px" style="background-image: url(<?php echo base_url();?>assets/Images/member_1.png)"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0 me-2">
                                        <div class="fs-6 text-gray-800 fw-bold">Amaran D</div>
                                        <div class="d-block text-gray-800 fs-7">New Subscriber Joined & Paid Payment</div>
                                    </div>
                                </div>
                                <span class="badge badge-info fs-8">2 Hr</span>
                            </a>
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Notifications-->
                <!--begin::User-->
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="<?php echo base_url()?>assets/Images/admin_1.png" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img src="<?php echo base_url()?>assets/Images/admin_1.png" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">Amuthan B</div>
                                    <div class="d-block">
                                        <div class="badge badge-light-success fw-bold fs-8 px-2 py-1">Super Admin</div>
                                    </div>
                                    <!-- <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a> -->
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="javascript:;" class="menu-link px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_my_profile">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="<?php echo base_url()?>Login/logout" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User -->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!-- end::Header -->


<!--begin::Modal - Update My Profile-->
<div class="modal fade" id="kt_modal_edit_my_profile" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-md">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header justify-content-end border-0 pb-0">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <div class="modal-body pt-0 pb-15 px-5 px-xl-10">
                <!--begin::Heading-->
                <div class="text-center">
                    <h1 class="mb-3">Update My Profile</h1>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 text-center mt-2">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url(); ?>assets/Images/admin_1.png')">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo base_url(); ?>assets/Images/admin_1.png')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
                                    <i class="fa-solid fa-pencil fs-7 text-black"></i>
                                    <input type="file" name="logo" id="logo" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                </label>
                            </div>
                            <div class="form-text pt-1">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    <div class="col-lg-12 mb-1">
                        <label class="col-form-label required fw-semibold fs-6">Name</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter User Name" value="Amuthan B"/>
                    </div>
                    <div class="col-lg-12 mb-1">
                        <label class="col-form-label required fw-semibold fs-6">Mobile No</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Mobile Number" value="9286562312" />
                    </div>
                    <div class="col-lg-12 mb-1">
                        <label class="col-form-label fw-semibold fs-6">Email ID</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Email ID" value="amuthan@gmail.com" />
                    </div>
                    <!-- <div class="col-lg-12">
                        <label class="col-form-label required fw-semibold fs-6">Username</label>
                        <div class="fv-row">
                            <input type="text" id="" name="" class="form-control form-control-lg_1 form-control-solid" placeholder="Enter Member Name" value="vetrimarand123">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-form-label required fw-semibold fs-6">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg form-control-solid" placeholder="Enter Password" name="password_my" id="password_my" value="vetrimarand@123">
                            <span class="input-group-text border-gray-500">
                                <a href="javascript:;" id="pwd_eye_opn_my">
                                    <i class="fa-solid fa-eye eyc fs-5"></i>
                                </a>
                                <a href="javascript:;"  style="display:none;">
                                    <i class="fa-solid fa-eye-slash fs-5"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-form-label required fw-semibold fs-6">Transaction Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg form-control-solid" placeholder="Enter Transaction Password" name="trans_password_my" id="trans_password_my" value="1234">
                            <span class="input-group-text border-gray-500">
                                <a href="javascript:;" id="trans_pwd_eye_opn_my">
                                    <i class="fa-solid fa-eye eyc fs-5"></i>
                                </a>
                                <a href="javascript:;"  style="display:none;">
                                    <i class="fa-solid fa-eye-slash fs-5"></i>
                                </a>
                            </span>
                        </div>
                    </div> -->
                </div>
                <div class="d-flex align-items-center justify-content-center mt-4">
                    <a href="javascript:;" class="btn btn-sm btn-secondary me-3" data-bs-dismiss="modal">Cancel</a>
                    <a href="javascript:;" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Update My Profile</a>
                </div>
            </div>
        </div>
        <!--end::Modal dialog-->
    </div>
</div>
<!--end::Modal - Update My Profile-->