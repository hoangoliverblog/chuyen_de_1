<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Maps</title>
    <base href="http://localhost/chuyen_de_1/index.php">

    <link href="./public/lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/lib/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="./public/lib/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./public/lib/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="./public/lib/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="./public/lib/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./public/lib/css/style.css" rel="stylesheet">
    <link href="./public/lib/css/bando.css" rel="stylesheet">
    <script type="text/javascript">
			setTimeout(function() { 
			    document.documentElement.scrollTop = 
			     document.body.scrollTop = 700; 
			}, 0); 
	</script>
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
            <h1><a href="index.php" style="font-family: 'Odibee Sans', cursive;" class="ml-2"><span>Drug store Map</span></a></h1>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.php"><p id="font">Home</p></a></li>
                <li><a href="#about">Thông Tin</a></li>
                <li><a href="#menu">Địa Điểm</a></li>
                <li><a href="#events">Sự kiện</a></li>
                <li><a href="https://www.facebook.com/?ref=tn_tnmn">Liên hệ</a></li>
                <li class="dang_nhap text-center"><a href="Login">Đăng nhập</a></li>
                <li class="dang_nhap text-center">
                    <a href="Login/exitacount">Đăng Xuất
                    <?php  
                        if(isset($data["session"]))
                        {
                            echo $data["session"] ;
                        }
                        
                        // if(isset($data["session_id"])){
                        //     echo $data["session_id"] ;
                        // }
                        
                    ?>
                    </a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background: url(./public/lib/image/map.PNG);background-size: 100% 100%;background-attachment: fixed;">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animated fadeInDown"><b style="color: #abbabf;">Drug store map </b></h2>
                            <p class="animated fadeInUp text-capitalize"></p>
                            <div>
                                <a href="#" class="btn-menu animated fadeIn scrollto drug_store_list">Danh sách các cửa hàng thuốc</a>
                            </div>
                            <div><a href="./Map" class="btn-book animated fadeIn scrollto">Xem địa điểm trên map</a></div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item" style="background: url(./public/lib/image/aaa.jpg);background-size: 100% 100%;background-attachment: fixed;">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animated fadeInDown"><b style="color: #abbabf;">Drug store map </b> </h2>
                            <p class="animated fadeInUp text-capitalize"></p>
                            <div>
                                <a href="#" class="btn-menu animated fadeIn scrollto drug_store_list">Danh sách các cửa hàng thuốc</a>
                            </div>
                            <div><a href="./Map" class="btn-book animated fadeIn scrollto">Xem địa điểm trên map</a></div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item" style="background: url(./public/lib/image/nhathuoc.jpg);background-size: 100% 100%;background-attachment: fixed;">
                    <div class="carousel-background"><img src="./public/lib/image/nhathuoc1.jpg" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animated fadeInDown"><b style=" color: #abbabf;">Drug store map </b> </h2>
                            <p class="animated fadeInUp text-capitalize">
                            </p>
                            <div>
                                <a href="#m" class="btn-menu animated fadeIn scrollto drug_store_list">Danh sách các cửa hàng thuốc</a>

                            </div>
                            <div>  <a href="./Map" class="btn-book animated fadeIn scrollto">Xem địa điểm trên map</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
<?php
    if(isset($_SESSION['useracount']))

    {
?>
<div class="container" id="table" style="margin-top:2rem; text-align:center">
    <div class="table">
        <div class="table-responsive bs-example widget-shadow">
            <h1>Danh Sách Các Nhà Thuốc</h1>
            <div style="margin: 20px 0">
                <a href="./Add_map" class="btn btn-success">Thêm nhà thuốc</a>
                <!-- <div style="margin-left: 70%">
                    <form>
                        <input type = "text" name = "txtsearch" placeholder="Nhập tìm kiếm">
                        <button type = "submit" name ="btnsearch" > Tìm kiếm </ button>
                    </form>
                </div> -->

            </div>
            <table class="table table-bordered">

                <thead> <tr>
                    <th>Stt</th>
                    <th>Địa Chỉ</th>
                    <th>Nhà Thuốc</th>
                    <th>Điện THoại</th>
                    <th>Actions</th>
                </tr> </thead>
                <tbody>
                        <?php 

                                $arr = $data['all_map'];

                                $response = new stdClass;

                                $response->id = $arr;

                                foreach($response->id as $value)

                                {
                            

                        ?>
                    <tr> 
                        <th scope="row"><?php echo $value->id_map ?></th>
                        <td><?php echo $value->name_map ?></td>
                        <td><?php echo $value->address_map ?></td>
                        <td><?php echo $value->type_map ?></td>
                        <td>
                            <a href="./Update/edit_map/<?php echo $value->id_map?>" class="btn btn-warning" onclick="return confirm('Sửa sản phẩm')">Sửa</a>
                            <a href="./Home/delete_map/<?php echo $value->id_map?>" class="btn btn-danger" id="delete_map" onclick="return confirm('Xóa sản phẩm')">Xóa</a>
                        </td>
                    </tr>
                    <?php 

                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Vendor JS Files -->
    <script src="./public/lib/vendor/jquery/jquery.min.js"></script>
    <script src="./public/lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./public/lib/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="./public/lib/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="./public/lib/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="./public/lib/vendor/venobox/venobox.min.js"></script>
    <script src="./public/lib/vendor/owl.carousel/owl.carousel.min.js"></script>
    <!-- Template Main JS File -->
    <script src="./public/lib/js/main.js"></script>

</body>
</html>