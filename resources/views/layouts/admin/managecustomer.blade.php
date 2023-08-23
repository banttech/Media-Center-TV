<?php
$title = '';
if (isset($pageTitle)) {
    $title = $pageTitle;
} else {
    $title = 'Manage Customers';
}
?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MediaCenterTech - {{ $title }}</title>



    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,600;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('admin_assets/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>

    <script src="{{ asset('admin_assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin_assets/js/main.js') }}" defer></script>
    <script>
        $('#chooseFile').bind('change', function() {
            var filename = $("#chooseFile").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            } else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>
<style>
    .alert-success {
        width: 50%;
    }

    .name_logo {
        font-size: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 20px;
        font-weight: 600;
    }
</style>



<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        {{-- <a class="navbar-brand name_logo" href="{{ route('apps.index') }}"><span
                style="color:#cc295c;">Sym</span><span>phony</span></a> --}}

        <?php
        $homeLogo = DB::table('home_logo')->first();
        ?>
        <a class="navbar-brand name_logo" href="{{ route('apps.index') }}">
            <span><img class="mt-2" src="{{ url('admin_assets/images/' . $homeLogo->image) }}" alt=" "
                    width="100px" height="60px" id="logo_img" /></span></a>


        <!-- Sidebar toggle button--><a class="app-sidebar__toggle mob-view" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown">
                <a class="top-btn" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">Admin</a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">

            <li><a class="app-menu__item @if (isset($pageTitle) && $pageTitle === 'Manage Songs') active @endif"
                    href="{{ route('apps.index') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Apps</span></a></li>

            <li><a class="app-menu__item @if (isset($pageTitle) && $pageTitle === 'Manage Customers') active @endif"
                    href="{{ route('manage-customers.manage') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Customers</span></a></li>

            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Privacy Policy' || $pageTitle === 'Add Privacy Policy')) active @endif"
                    href="{{ route('privacy-policy-english') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Privacy Policy English</span>
                </a>
            </li>
            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Privacy Policy' || $pageTitle === 'Add Privacy Policy')) active @endif"
                    href="{{ route('privacy-policy-spanish') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Privacy Policy Spanish</span>
                </a>
            </li>
            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Help Instruction' || $pageTitle === 'Add Help Instruction')) active @endif"
                    href="{{ route('help-instruction-english') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Help Instruction English</span>
                </a>
            </li>

            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Help Instruction' || $pageTitle === 'Add Help Instruction')) active @endif"
                    href="{{ route('help-instruction-spanish') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Help Instruction Spanish</span>
                </a>
            </li>

            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Contact Us' || $pageTitle === 'Add Contact Us')) active @endif"
                    href="{{ route('contact-us') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Contact Us</span>
                </a>
            </li>
            <li><a class="app-menu__item @if (isset($pageTitle) && ($pageTitle === 'Edit Donate' || $pageTitle === 'Add Donate')) active @endif"
                    href="{{ route('donate') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Donate</span>
                </a>
            </li>

            <li><a class="app-menu__item @if (isset($pageTitle) && $pageTitle === 'Update Logo') active @endif"
                    href="{{ route('update-logo') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Update Logo</span></a></li>
            <li><a class="app-menu__item @if (isset($pageTitle) && $pageTitle === 'Edit Profile') active @endif"
                    href="{{ route('profile.edit') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt=""> <span
                        class="app-menu__label">Profile</span></a></li>
            <li><a class="app-menu__item" href="{{ route('user.logout') }}"><img src="{{ url('admin_assets/images/ic1.svg') }}" alt="">
                    <span class="app-menu__label">Logout</span></a></li>


        </ul>
    </aside>
    <main class="app-content">
        @yield('content1')
    </main>
</body>

</html>
