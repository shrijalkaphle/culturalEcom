<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="/main.css" rel="stylesheet"></head>
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        #loader {
            position: fixed;
            height:100vh;
            background: rgba(0, 0, 0, 0.5);
            width: 100vw;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hidden {
            display: none !important
        }
    </style>
<body>
    <div id="loader" class="hidden">
        <img src="/assets/image/loader.gif" style="height:50px">
    </div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="{{ route('landing') }}" class="font-weight-bold text-dark text-decoration-none" style="font-size: 22px">{{ env('APP_NAME') }}</a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left ml-3 ">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <div class="widget-heading">
                                                {{auth()->user()->name}}
                                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            {{-- <a href="{{ route('user.profile') }}" class="dropdown-item">Profile</a> --}}
                                            <a href="{{ route('admin.changepassword') }}" class="dropdown-item">Change Password</a>
                                            <a href="{{ route('user.logout') }}" class="dropdown-item">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                 <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu" style="padding-top:20px">
                            <li> <a href="{{ route('admin.dashboard') }}" id="dashboard">
                                <i class="metismenu-icon material-icons-outlined"> dashboard </i>
                                Dashboard
                            </a> </li>
                            <li>
                                <a href="#" id="users">
                                    <i class="metismenu-icon material-icons-outlined"> people </i>
                                    Users
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.index') }}" id="admin">
                                            <i class="metismenu-icon"></i>
                                            Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.index') }}" id="customer">
                                            <i class="metismenu-icon"></i>
                                            Customer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li> <a href="{{ route('sliders.index') }}" id="slider">
                                <i class="metismenu-icon material-icons-outlined"> linear_scale </i>
                                Slider
                            </a> </li>
                            <li> <a href="{{ route('categories.index') }}" id="category">
                                <i class="metismenu-icon material-icons-outlined"> category </i>
                                Category
                            </a> </li>
                            <li> <a href="{{ route('products.index') }}" id="product">
                                <i class="metismenu-icon material-icons-outlined"> inventory_2 </i>
                                Products
                            </a> </li>
                            <li> <a href="{{ route('order') }}" id="order">
                                <i class="metismenu-icon material-icons-outlined"> local_shipping </i>
                                Orders
                            </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('body')    
        </div>
    </div>
</body>
</html>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/assets/scripts/main.js"></script>
<script src="/ckeditor.js"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
    .widget-content-left img {
        height: 80px;
        width: 80px;
    }
    .form-group .required::after {
        content: ' *',
        color: red
    }
</style>
@yield('script')
<script src="{{ asset('assets/js/slider.js') }}"></script>