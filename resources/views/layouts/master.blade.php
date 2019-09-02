<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
        <base href="../"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>ระบบจัดการเอกสาร (E-DOC)</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Asap+Condensed:500">        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles -->


        <!--begin:: Global Mandatory Vendors -->
        <link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="./assets/css/demo11/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <!--end::Layout Skins -->

        <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
        @yield('css')
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body  class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >


        <!-- begin:: Page -->
        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
            <div class="kt-header-mobile__logo">
                <a href="demo11/index.html">
                    <img alt="Logo" src="./assets/media/logos/logo-11-sm.png"/>
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

                <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
            </div>
        </div>
        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    <!-- begin:: Header -->
                    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed "  data-ktheader-minimize="on" >
                        <div class="kt-container  kt-container--fluid ">
                            <!-- begin:: Brand -->
                            <div class="kt-header__brand " id="kt_header_brand">
                                <div class="kt-header__brand-logo">
                                    <a href="demo11/index.html">
                                        <img alt="Logo" src="./assets/media/logos/logo-11.png"/>	
                                    </a>		
                                </div> 
                            </div>
                            <!-- end:: Brand -->		<!-- begin:: Header Topbar -->
                            <div class="kt-header__topbar">


                                <!--begin: User bar -->
                                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                        <span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
                                        <span class="kt-header__topbar-username kt-visible-desktop">Nick</span>
                                        <img alt="Pic" src="./assets/media/users/300_21.jpg"/>
                                        <span class="kt-header__topbar-icon kt-bg-brand kt-hidden"><b>S</b></span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                        <!--begin: Head -->
                                        <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                                            <div class="kt-user-card__avatar">
                                                <img class="kt-hidden-" alt="Pic" src="./assets/media/users/300_25.jpg" />
                                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
                                            </div>
                                            <div class="kt-user-card__name">
                                                Sean Stone
                                            </div>
                                            <div class="kt-user-card__badge">
                                                <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
                                            </div>
                                        </div>
                                        <!--end: Head -->

                                        <!--begin: Navigation -->
                                        <div class="kt-notification">
                                            <a href="demo11/custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Profile
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Account settings and more
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="demo11/custom/apps/user/profile-3.html" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-mail kt-font-warning"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Messages
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Inbox and tasks
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="kt-notification__custom kt-space-between">
                                                <a href="demo11/custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

                                                <a href="demo11/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                                            </div>
                                        </div>
                                        <!--end: Navigation -->
                                    </div>
                                </div>
                                <!--end: User bar -->
                            </div>
                            <!-- end:: Header Topbar -->
                        </div>
                    </div>
                    <!-- end:: Header -->
                    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                        <div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">
                            <!-- begin:: Aside -->
                            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

                            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                                <!-- begin:: Aside Menu -->
                                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                                    <div 
                                        id="kt_aside_menu"
                                        class="kt-aside-menu "
                                        data-ktmenu-vertical="1"
                                        data-ktmenu-scroll="1"  
                                        >		

                                        <ul class="kt-menu__nav ">
                                            <li class="kt-menu__section kt-menu__section--first">
                                                <h4 class="kt-menu__section-text">1</h4>
                                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                                            </li>

                                            <li class="kt-menu__section kt-menu__section--first">
                                                <h4 class="kt-menu__section-text">2</h4>
                                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end:: Aside Menu -->
                            </div>
                        </div>
                            <!-- end:: Aside -->
                            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">									
                                <!-- begin:: Subheader -->
                                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                    <div class="kt-container  kt-container--fluid ">
                                        <div class="kt-subheader__main">
                                            <h3 class="kt-subheader__title"> Dashboard </h3>
                                            <span class="kt-subheader__separator kt-hidden"></span>
                                            <div class="kt-subheader__breadcrumbs">
                                                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                                <a href="" class="kt-subheader__breadcrumbs-link"> Application </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <div class="crad">
                                <div class="crad-block">
                                    <h1> Hello </h1>
                                </div>
                    </div>

                    <!-- begin:: Footer -->
                    <div class="kt-footer kt-grid__item" id="kt_footer">	
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-footer__wrapper">
                                <div class="kt-footer__copyright">
                                    2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
                                </div>
                                <div class="kt-footer__menu">
                                    <a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">About</a>
                                    <a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Team</a>
                                    <a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Contact</a>
                                </div>
                            </div>
                        </div>		
                    </div>
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
        <script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->

        {{-- <script src="./assets/js/demo11/scripts.bundle.js" type="text/javascript"></script> --}}
        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
        <script src="./assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        {{-- <script src="./assets/js/demo11/pages/dashboard.js" type="text/javascript"></script> --}}
        <!--end::Page Scripts -->
        @yield('js')

    </body>
    <!-- end::Body -->
</html>