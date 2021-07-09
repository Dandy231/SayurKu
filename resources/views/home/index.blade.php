<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Sayurku</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
    <header>
        <div class="layout_padding banner_section_start">
            <!-- header inner -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="main-menu" id="navbar">
                                        <ul class="menu-area-main">
                                            <li class="nav-item active"><a href="#">Home</a></li>
                                            <li class="nav-item"><a href="#about">Tentang</a></li>
                                            <li class="nav-item"><a href="#gallery">Kategori</a></li>
                                            <li class="nav-item"><a href="#products">Produk</a></li>
                                            <li class="nav-item"><a href="/home/transaksi">Transaksi</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo"><a href="#home"><img src="assets/images/ecommerce.png" style="max-width: 80%;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- banner start-->
            <div class="layout_padding banner_section">
                <div class="container">
                    <div id="main_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-md-12">
                                    <div class="banner-image"><img src="https://ik.imagekit.io/dcjlghyytp1/c601a3800a1f96da1622e1a3e334d6fd?f-auto" style="max-width: 100%;"></div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-12">
                                    <div class="banner-image"><img src="https://ik.imagekit.io/dcjlghyytp1/577fe25b3167ca3d7a0516ba610679a1?f-auto" style="max-width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- banner end-->
    <!-- about start-->
    <div id="about" class="layout_padding about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div><img src="https://firebasestorage.googleapis.com/v0/b/project-2059615900628317391.appspot.com/o/category-icon-new%2F1624851406167_Buatan%20Indonesia.jpg?alt=media" style="max-width: 100%;"></div>
                </div>
                <div class="col-md-6">
                    <h1 class="about_text"><strong>Tentang<span class="color">SayurKu</span></strong></h1>
                    <p class="about_taital">Selamat datang di Sayurku</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery start-->
    <div id="gallery" class="layout_padding2 gallery_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="gallery_main">
                        <h1 class="gallery_taital"><strong><span class="our_text">Kategori</span> Kami</strong></h1>
                    </div>
                </div>
                <div class="col-sm-12 gallery_maain">
                    <div class="row">
                        @forelse ($category as $categories)
                        <div class="col-sm-3 padding_0">
                            <div class="gallery_blog">
                                <img class="img-responive" src="{{$categories->iconPath}}">
                                <div class="overlay">
                                    <h2>{{$categories->name}}</h2>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="4" class="border text-center text-white p-5">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Gallery-->
    <!-- product start-->
    <div id="products" class="layout_padding product_section ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="product_text"><strong><span class="den">Sayurku</span>Produk</strong></h1>
                </div>
            </div>
            <div class="product_section_2 images">
                <div class="row">
                    @forelse ($product as $products)
                    <div class="col-sm-4">
                        <div class="images"><img src="{{$products->picturePath}}" style="max-width: 100%; width: 100%;"></div>
                        <h2 class="den_text croissants"><a href="#">{{$products->title}}</a></h2>
                        <h2 class="den_text croissants"><a href="#">Rp. {{$products->price}}</a></h2>
                    </div>
                    @empty
                    <tr>
                        <td colspan="4" class="border text-center text-white p-5">
                            Data Tidak Ditemukan
                        </td>
                    </tr>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- product end-->
    <!-- copyright start-->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright_taital">2021 All Rights Reserved. <a href="#">Sayurku</p>
                </div>
            </div>
        </div>
    </div>


    <!-- copyright end-->

    <!-- Javascript files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.0.0.min.js"></script>
    <script src="assets/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- javascript -->
    <script src="assets/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>

    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "10px 10px";
                document.getElementById("navbar").style.backgroundColor = '#ffffff';
                document.getElementById("navbar").style.position = 'fixed';
            } else {
                document.getElementById("navbar").style.backgroundColor = 'transparent';
                document.getElementById("navbar").style.padding = "80px 10px";
            }
        }
        $(document).ready(function() {
            $(".nav-item").bind("click", function(event) {
                var clickedItem = $(this);
                $(".nav-item").each(function() {
                    $(this).removeClass("active");
                });
                clickedItem.addClass("active");
            });
        });
    </script>
</body>

</html>