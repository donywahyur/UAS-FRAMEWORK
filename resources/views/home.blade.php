
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SPPA</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets2/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets2/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('/') }}assets2/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('/') }}assets2/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{ asset('/') }}assets2/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ asset('/') }}assets2/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
        <div class="header_section">
            <div class="container">
                <nav class="navbar navbar-dark bg-dark">
                <a class="logo" style="width:30%" href="#"><img style="width:100px;" src="https://ftd.asia.ac.id/assetsbaru/img/asia.png"></a>
                <div class="search_section">
                        <ul style="cursor:pointer;">
                            <li id="login_text">Log In</li>
                            <li id="login_form" style="display:none;" >
                                <div class="card p-1">
                                    <form action="./login" method="post" class="d-flex justify-content-centera align-items-center">
                                        @csrf
                                        <button id="login_close" class="btn-close" style="padding:0px;border-radius: 50%;width: 20px;height: 20px;margin-right: 10px;line-height:initial;" type="button">x</button>
                                        <input type="text" class="mr-1" name="username" placeholder="Username" required>
                                        <input type="password" class="mr-1" name="password" placeholder="Password" required>
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                </div>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button> -->
                <!-- <div class="collapse navbar-collapse" id="navbarsExample01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.html">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clients.html">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div> -->
                </nav>
            </div>
            <!--banner section start -->
            <div class="banner_section layout_padding">
                <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="taital_main">
                                    <h5 class="banner_taital"><span class="font_size_90">Sistem Pencatatan dan Pembayaran Air</h5>
                                    <!-- <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                                    <div class="book_bt"><a href="#">Shop Now</a></div> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div><img src="{{ asset('/') }}logo.jpeg" class="image_1" style="border-radius:50px;"></div>
                            </div>
                            </div>
                            <div class="button_main">
                                <input style="color:black;" type="text" class="Enter_text" placeholder="No Pelanggan" name="" id="txt-no_tahigan">
                                <button onclick="searchTagihan();" class="search_text">Cari</button>
                            </div>
                        </div>
                    </div>
                <!-- <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class=""><img src="{{ asset('/') }}assets2/images/left-icon.png"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class=""><img src="{{ asset('/') }}assets2/images/right-icon.png"></i>
                </a> -->
                </div>
            </div>
            <!--banner section end -->
        </div>
        <div class="beauty_section layout_padding" id="tagihan" style="display:none;">
            <div class="container">
                <div class="row d-flex justify-content-center">
                <div class="col-lg-8 ">
                    <div class="beauty_box">
                        <h1 class="bed_text">Detail Tagihan</h1>
                        <div id="wrapper-tagihan">
                            <center> <h4> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... </h4> </center>
                        </div>
                        <div id="wrapper-tbl-tagihan" style="display: none;">
                            <table width="100%" cellpadding="5" cellspacing="5" style="font-size:15pt;">
                                <tr>
                                    <th width="25%">No Pelanggan</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-no_pelanggan"></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-nama"></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="25%">Tahun</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-tahun"></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="25%">Bulan</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-bulan"></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="25%">Meter Air</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-meter"></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="25%">Jumlah Tagihan</th>
                                    <th>:</th>
                                    <th>
                                        <span id="spn-jumlah_tagihan"></span>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- beauty product section end -->
        <!-- product section start -->
        <div class="product_section layout_padding" hidden>
            <div class="container">
                <h1 class="feature_taital">FEATURED PRODUCTS</h1>
                <p class="feature_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking</p>
                <div class="product_section_2">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="feature_box">
                            <h1 class="readable_text">Readable content of</h1>
                            <div><img src="{{ asset('/') }}assets2/images/img-7.png" class="image_7"></div>
                        </div>
                        <div class="feature_box_1">
                            <h1 class="readable_text">Readable content of</h1>
                            <div><img src="{{ asset('/') }}assets2/images/img-7.png" class="image_7"></div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="feature_box_2">
                            <h1 class="readable_text">Readable content of</h1>
                            <div><img src="{{ asset('/') }}assets2/images/img-8.png" class="image_8"></div>
                            <div class="seemore_bt"><a href="#">see More</a></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- product section end -->
        <!-- client section start -->
        <div class="client_section layout_padding" hidden>
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="feature_taital">what is says our customer</h1>
                        <p class="feature_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking</p>
                        <div class="client_section_2">
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/img-9.png"></div>
                            <h3 class="nolmal_text">Normal distribution</h3>
                            <p class="ipsum_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look</p>
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/icon-10.png"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="feature_taital">FEATURED PRODUCTS</h1>
                        <p class="feature_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking</p>
                        <div class="client_section_2">
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/img-9.png"></div>
                            <h3 class="nolmal_text">Normal distribution</h3>
                            <p class="ipsum_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look</p>
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/icon-10.png"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="feature_taital">FEATURED PRODUCTS</h1>
                        <p class="feature_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking</p>
                        <div class="client_section_2">
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/img-9.png"></div>
                            <h3 class="nolmal_text">Normal distribution</h3>
                            <p class="ipsum_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look</p>
                            <div class="image_9"><img src="{{ asset('/') }}assets2/images/icon-10.png"></div>
                        </div>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class=""><img src="{{ asset('/') }}assets2/images/left-icon.png"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class=""><img src="{{ asset('/') }}assets2/images/right-icon.png"></i>
                </a>
            </div>
        </div>
        <!-- client section end -->
        <!-- newsletter section start -->
        <div class="newsletter_section layout_padding" hidden>
            <div class="container">
                <h6 class="conect_text">Connect to caraft</h6>
                <h1 class="newsletter_taital">Join Our Newsletter</h1>
                <p class="newsletter_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration </p>
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Subscribe</span>
                </div>
                </div>
            </div>
        </div>
        <!-- newsletter section end -->
        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="row d-flex justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="information_main">
                        <h4 class="information_text">Useful Links</h4>
                        <p class="many_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="information_main">
                        <h4 class="information_text">Contact Us</h4>
                        <p class="call_text"><a href="#">+01 1234567890</a></p>
                        <p class="call_text"><a href="#">+01 9876543210</a></p>
                        <p class="call_text"><a href="#">demo@gmail.com</a></p>
                        <div class="social_icon">
                            <ul>
                            <li><a href="#"><img src="{{ asset('/') }}assets2/images/fb-icon.png"></a></li>
                            <li><a href="#"><img src="{{ asset('/') }}assets2/images/twitter-icon.png"></a></li>
                            <li><a href="#"><img src="{{ asset('/') }}assets2/images/linkedin-icon.png"></a></li>
                            <li><a href="#"><img src="{{ asset('/') }}assets2/images/instagram-icon.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                <div class="copyright_section">
                    <h1 class="copyright_text">
                    Copyright {{ date('Y') }} 
                    </h1>
                </div>
            </div>
        </div>
        <!-- footer section end -->
        <!-- Javascript files-->
        <!-- <script src="{{ asset('/') }}assets2/js/jquery.min.js"></script> -->
        <script src="{{ asset('/') }}assets2/js/popper.min.js"></script>
        <script src="{{ asset('/') }}assets2/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="{{ asset('/') }}assets2/js/plugin.js"></script> -->
        <!-- sidebar -->
        <script src="{{ asset('/') }}assets2/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- <script src="{{ asset('/') }}assets2/js/custom.js"></script> -->
        <!-- javascript --> 
        <script src="{{ asset('/') }}assets2/js/owl.carousel.js"></script>
        <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
        <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
        <script src="{{ asset('/') }}assets2/js/popper.min.js"></script>
        <script src="{{ asset('/') }}assets2/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function(){
                @if(session('error'))
                    Swal.fire(
                        'Login Gagal',
                        "{{ session('error') }}",
                        'error' 
                    );
                    $("#login_text").click();
                @endif
            });
            async function searchTagihan(){
                var no_tagihan = $('#txt-no_tahigan').val();
                $.ajax({
                    url: "./searchTagihan",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        no_tagihan: no_tagihan
                    },
                    dataType: "json",
                    beforeSend: function(){
                        $('#wrapper-tagihan').fadeIn();
                        $('#wrapper-tbl-tagihan').fadeOut();
                    },
                    success: function(data){
                        $('#wrapper-tagihan').fadeOut();
                        $('#wrapper-tbl-tagihan').fadeIn();
                        console.log(data);
                        $('#spn-no_pelanggan').html(data.no_pelanggan);
                        $('#spn-nama').html(data.nama);
                        $('#spn-tahun').html(data.tahun);
                        $('#spn-bulan').html(data.bulan);
                        $('#spn-meter').html(data.meter_air);
                        $('#spn-jumlah_tagihan').html(data.jumlah_tagihan);
                    }
                });
                $('#tagihan').show();
                document.getElementById('tagihan').scrollIntoView();
            }
            $("#login_text").click(function(){
                $(this).fadeOut();
                $("#login_form").fadeIn();
            });
            $("#login_close").click(function(){
                $("#login_form").fadeOut();
                $("#login_text").fadeIn();
            });
        </script>
   </body>
</html>

