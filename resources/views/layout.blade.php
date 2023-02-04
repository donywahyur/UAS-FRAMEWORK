

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>SPPA - Sistem Pencatatan dan Pembayaran Air</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('/') }}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/plugins/datatables/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="{{ asset('/') }}assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('/') }}assets/plugins/jquery/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo d-flex align-items-center justify-content-between">
                <a href="./dashboard" class="logo-icon"></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <span class="user-info-text">SPPA</span>
                    </a>
                </div>
            </div>
            @include('menu')
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                {{-- <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link active" href="./logout">Logout</a>
                                </li> --}}
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown">
                                        <b> {{ Auth::user()->nama }} </b> <img src="{{ asset('/') }}assets/images/avatars/profile.png" alt="" style="margin-left: 10px;"> 
                                    </a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li>
                                                <a class="dropdown-item" href="./profile">Edit Profile</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./logout">Logout</a>
                                            </li>
                                        </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}assets/js/main.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/datatables/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/') }}assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/select2.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatables').DataTable();
        } );
        
        @if (session('status'))
            Swal.fire(
                "{{ session('status') == 1 ? 'Berhasil' : 'Gagal' }}",
                "{{ session('msg') }}",
                "{{ session('status') == 1 ? 'success' : 'error' }}",
            )
        @endif
        
        function isNumberKey(txt, evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 46) {
                //Check if the text already contains the . character
                if (txt.value.indexOf('.') === -1) {
                return true;
                } else {
                return false;
                }
            } else {
                if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            }
            return true;
        }
    </script>
</body>
</html>