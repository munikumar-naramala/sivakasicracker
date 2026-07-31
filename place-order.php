<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sivakasi Cracker - Sivakasi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

<!-- Include Bootstrap CSS in your <head> or before the closing </body> tag -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script>
$(document).ready(function(){
    $('.pop').on('click',function(e){
          e.preventDefault(); // Prevent default link behaviour
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#Mymodal').modal('show')
        });
    });
</script>
    
<style>
    body{
        padding: 20px;
    }
        
    #Myimg{
        margin:0 auto;
        background: #ccc;
        border: 1px solid #000;
        padding: 9px;
    }
    </style>


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="assets/js/orderform.js"></script>


</head>

<body>

<!-- .modal -->
<div class="modal fade" id="Mymodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal"> x </button> 
				<h4 class="modal-title">
                	Image Preview
                </h4>                                                             
			</div> 
			<div class="modal-body">
                <img src="" class="imagepreview" style="width: 100%;" >
			</div>   
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>                        
			</div>
		</div>                                                                       
	</div>                                      
</div>


  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:shivatraders6@gmail.com">shivatraders6@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 95979 94120</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SivakasiCracker<span>.com</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          <!-- <li><a class="nav-link scrollto" href="index.php#services">Products</a></li> -->
          <!-- <li><a class="nav-link scrollto " href="price-list.php">Price List</a></li> -->
          <li><a class="nav-link scrollto" href="products-show.php">Product Gallery</a></li>
          <li><a class="nav-link scrollto" href="place-order.php">Place Order</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Terms & Conditions</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Place Order</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Place Order</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <!-- 
        <div class="title col-12">
          <h2 style="color:#F00" class="text-center">SivakasiCraker - Place Order</h2>
        </div> 
        -->
        <form method="post" name="myemailform" action="processorder.php">
          <div class="mb-3 row">
            <label class="col-12 col-md-4 col-form-label"><h4>Name*</h4></label>
            <div class="col-12 col-md-8">
              <input type="text" class="form-control" placeholder="Name" name="name" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-12 col-md-4 col-form-label"><h4>Mobile*</h4></label>
            <div class="col-12 col-md-8">
              <input type="text" class="form-control" placeholder="Mobile" name="mobile" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-12 col-md-4 col-form-label"><h4>Email*</h4></label>
            <div class="col-12 col-md-8">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-12 col-md-4 col-form-label"><h4>Address*</h4></label>
            <div class="col-12 col-md-8">
              <textarea class="form-control" rows="3" name="address" required></textarea>
            </div>
          </div>

<!-- Include Bootstrap CSS in your <head> or before the closing </body> tag -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <hr/>
            <?php

        $prodarray = array(
          array("1", "2.75 Kurvi", "Rs 40.00", "Rs 8.00","assets/product-images/1.jpeg","prod_1_name", "prod_1_price","prod_1_disc_price", "prod_1_quant"),
          array("2", "3.5 Lakshmi", "Rs 70.00", "Rs 14.00","assets/product-images/2.jpeg","prod_2_name", "prod_2_price", "prod_2_disc_price","prod_2_quant"),
          array("3", "4 Lakshmi", "Rs 107.00", "Rs 21.00","assets/product-images/3.jpeg","prod_3_name", "prod_3_price", "prod_3_disc_price","prod_3_quant"),
          array("4", "4 Lakshmi Del", "Rs 162.00", "Rs 32.00","assets/product-images/4.jpeg","prod_4_name", "prod_4_price", "prod_4_disc_price","prod_4_quant"),
          array("5", "4 Lakshmi Special Premium", "Rs 257.00", "Rs 51.00","assets/product-images/5.jpeg","prod_5_name", "prod_5_price", "prod_5_disc_price","prod_5_quant"),
          array("6", "Hanuman Super Del", "Rs 198.00", "Rs 40.00","assets/product-images/6.jpeg","prod_6_name", "prod_6_price", "prod_6_disc_price","prod_6_quant"),
          array("7", "2 Sound", "Rs 176.00", "Rs 35.00","assets/product-images/7.jpeg","prod_7_name", "prod_7_price", "prod_7_disc_price","prod_7_quant"),
          array("8", "2 Sound Special Premium", "Rs 257.00", "Rs 51.00","assets/product-images/8.jpeg","prod_8_name", "prod_8_price", "prod_8_disc_price","prod_8_quant"),
          array("9", "28 Chorsa","Rs 62.00", "Rs 12.00","assets/product-images/9.jpeg","prod_9_name", "prod_9_price", "prod_9_disc_price","prod_9_quant"),
          array("10", "28 Gaint", "Rs 157.00", "Rs 31.00","assets/product-images/10.jpeg","prod_10_name", "prod_10_price", "prod_10_disc_price","prod_10_quant"),

          array("11", "56 Giant", "Rs 314.00", "Rs 62.00","assets/product-images/11.jpeg","prod_11_name", "prod_11_price", "prod_11_disc_price","prod_11_quant"),
          array("12", "24 Deluxe", "Rs 252.00", "Rs 50.00","assets/product-images/12.jpeg","prod_12_name", "prod_12_price", "prod_12_disc_price","prod_12_quant"),
          array("13", "100 Deluxe", "Rs 1300.00", "Rs 260.00","assets/product-images/13.jpeg","prod_13_name", "prod_13_price", "prod_13_disc_price","prod_13_quant"),
          array("14", "Red Bijili", "Rs 190.00", "Rs 38.00","assets/product-images/14.jpeg","prod_14_name", "prod_14_price", "prod_14_disc_price","prod_14_quant"),
          array("15", "Stripped Bijili", "Rs 210.00", "Rs 42.00","assets/product-images/15.jpeg","prod_15_name", "prod_15_price", "prod_15_disc_price","prod_15_quant"),
          array("16", "Gold Red Bijili", "Rs 210.00", "Rs 42.00","assets/product-images/16.jpeg","prod_16_name", "prod_16_price", "prod_16_disc_price","prod_16_quant"),
          array("17", "Basket Bijili", "Rs 379.00", "Rs 76.00","assets/product-images/17.jpeg","prod_17_name", "prod_17_price", "prod_17_disc_price","prod_17_quant"),
          array("18", "Bullet Bomb", "Rs 143.00", "Rs 29.00","assets/product-images/18.jpeg","prod_18_name", "prod_18_price", "prod_18_disc_price","prod_18_quant"),
          array("19", "Hydro Bomb", "Rs 340.00", "Rs 68.00","assets/product-images/19.jpeg","prod_19_name", "prod_19_price", "prod_19_disc_price","prod_19_quant"),
          array("20", "King of King", "Rs 465.00", "Rs 93.00","assets/product-images/20.jpeg","prod_20_name", "prod_20_price", "prod_20_disc_price","prod_20_quant"),

          array("21", "Classic Bomb", "Rs 639.00", "Rs 128.00","assets/product-images/21.jpeg","prod_21_name", "prod_21_price", "prod_21_disc_price","prod_21_quant"),
          array("22", "555 Magic Bomb", "Rs 600.00", "Rs 120.00","assets/product-images/22.jpeg","prod_22_name", "prod_22_price", "prod_22_disc_price","prod_22_quant"),
          array("23", "King Kong Mega", "Rs 1041.00", "Rs 208.00","assets/product-images/23.jpeg","prod_23_name", "prod_23_price", "prod_23_disc_price","prod_23_quant"),
          array("24", "100 Wala", "Rs 250.00", "Rs 50.00","assets/product-images/24.jpeg","prod_24_name", "prod_24_price", "prod_24_disc_price","prod_24_quant"),
          array("25", "100 Wala Mega", "Rs 272.00", "Rs 54.00","assets/product-images/25.jpeg","prod_25_name", "prod_25_price", "prod_25_disc_price","prod_25_quant"),
          array("26", "100 Jegajal", "Rs 250.00", "Rs 50.00","assets/product-images/26.jpeg","prod_26_name", "prod_26_price", "prod_26_disc_price","prod_26_quant"),
          array("27", "28 Jegajal", "Rs 62.00", "Rs 12.00","assets/product-images/27.jpeg","prod_27_name", "prod_27_price", "prod_27_disc_price","prod_27_quant"),
          array("28", "1000 Wala Mega", "Rs 2426.00", "Rs 485.00","assets/product-images/29.jpeg","prod_28_name", "prod_28_price", "prod_28_disc_price","prod_29_quant"),
          array("29", "1000 Wala Half Count", "Rs 1139.00", "Rs 228.00","assets/product-images/30.jpeg","prod_29_name", "prod_29_price", "prod_29_disc_price","prod_30_quant"),
          array("30", "5000 Wala", "Rs 5695.00", "Rs 1140.00","assets/product-images/31.jpeg","prod_30_name", "prod_30_price", "prod_30_disc_price","prod_30_quant"),

          array("31", "5000 Wala Spec", "Rs 12128.00", "Rs 2426.00","assets/product-images/32.jpeg","prod_31_name", "prod_31_price", "prod_31_disc_price","prod_31_quant"),
          array("32", "10000 Wala", "Rs 11390.00", "Rs 2280.00","assets/product-images/33.jpeg","prod_32_name", "prod_32_price", "prod_32_disc_price","prod_32_quant"),
          array("33", "10000 Wala Spec", "Rs 24256.00", "Rs 4852.00","assets/product-images/33.jpeg","prod_33_name", "prod_33_price", "prod_33_disc_price","prod_33_quant"),
          array("34", "Rocket Bomb", "Rs 349.00", "Rs 70.00","assets/product-images/34.jpeg","prod_34_name", "prod_34_price", "prod_34_disc_price","prod_34_quant"),
          array("35", "Lunick Rocket Bomb", "Rs 621.00", "Rs 124.00","assets/product-images/35.jpeg","prod_35_name", "prod_35_price", "prod_35_disc_price","prod_35_quant"),
          array("36", "2 Sound Rocket", "Rs 676.00", "Rs 135.00","assets/product-images/36.jpeg","prod_36_name", "prod_36_price", "prod_36_disc_price","prod_36_quant"),
          array("37", "3 Sound Rocket", "Rs 2021.00", "Rs 404.00","assets/product-images/37.jpeg","prod_37_name", "prod_37_price", "prod_37_disc_price","prod_37_quant"),
          array("38", "Flower Pot Big", "Rs 360.00", "Rs 72.00","assets/product-images/38.jpeg","prod_38_name", "prod_38_price", "prod_38_disc_price","prod_38_quant"),
          array("39", "Flower Pot Special", "Rs 542.00", "Rs 108.00","assets/product-images/39.jpeg","prod_39_name", "prod_39_price", "prod_39_disc_price","prod_39_quant"),
          array("40", "Flower Pot Ashoka", "Rs 796.00", "Rs 159.00","assets/product-images/40.jpeg","prod_40_name", "prod_40_price", "prod_40_disc_price","prod_40_quant"),
          
          array("41", "Flower Pot Special Mega", "Rs 1101.00", "Rs 220.00","assets/product-images/41.jpeg","prod_41_name", "prod_41_price", "prod_41_disc_price","prod_41_quant"),
          array("42", "Flower Pot Del", "Rs 1103.00", "Rs 221.00","assets/product-images/42.jpeg","prod_42_name", "prod_42_price", "prod_42_disc_price","prod_42_quant"),
          array("43", "Flower Pot Del Spec", "Rs 1500.00", "Rs 300.00","assets/product-images/42.jpeg","prod_43_name", "prod_43_price", "prod_43_disc_price","prod_43_quant"),
          array("44", "Colour Koti", "Rs 1103.00", "Rs 221.00","assets/product-images/43.jpeg","prod_44_name", "prod_44_price", "prod_44_disc_price","prod_44_quant"),
          array("45", "Green Berry Colour Koti Big", "Rs 3200.00", "Rs 640.00","assets/product-images/44.jpeg","prod_45_name", "prod_45_price", "prod_45_disc_price","prod_45_quant"),
          array("46", "Ground Chakkar Big (25 ps)", "Rs 472.00", "Rs 94.00","assets/product-images/45.jpeg","prod_46_name", "prod_46_price", "prod_46_disc_price","prod_46_quant"),
          array("47", "Ground Chakkar Big 10","Rs 211.00", "Rs 42.00","assets/product-images/46.jpeg","prod_47_name", "prod_47_price", "prod_47_disc_price","prod_47_quant"),
          array("48", "Ground Chakkar Special", "Rs 377.00", "Rs 75.00","assets/product-images/47.jpeg","prod_48_name", "prod_48_price", "prod_48_disc_price","prod_48_quant"),
          array("49", "Chocolate Chakkar", "Rs 827.00", "Rs 165.00","assets/product-images/48.jpeg","prod_49_name", "prod_49_price", "prod_49_disc_price","prod_49_quant"),
          array("50", "Ground Chakkar Del", "Rs 757.00", "Rs 151.00","assets/product-images/49.jpeg","prod_50_name", "prod_50_price", "prod_50_disc_price","prod_50_quant"),
          
          array("51", "Ground Chakkar Del Mega","Rs 1200.00", "Rs 240.00","assets/product-images/50.jpeg","prod_51_name", "prod_51_price", "prod_51_disc_price","prod_51_quant"),
          array("52", "Wire Chakkar","Rs 950.00", "Rs 190.00","assets/product-images/50.jpeg","prod_52_name", "prod_52_price", "prod_52_disc_price","prod_52_quant"),
          array("53", "10 Colour Pencil", "Rs 272.00", "Rs 54.00","assets/product-images/51.jpeg","prod_53_name", "prod_53_price", "prod_53_disc_price","prod_53_quant"),
          array("54", "12 Colour Pencil", "Rs 342.00", "Rs 68.00","assets/product-images/52.jpeg","prod_54_name", "prod_54_price", "prod_54_disc_price","prod_54_quant"),
          array("55", "15 Color Pencil", "Rs 404.00", "Rs 81.00","assets/product-images/53.jpeg","prod_55_name", "prod_55_price", "prod_55_disc_price","prod_55_quant"),
          array("56", "Jil Jil", "Rs 235.00", "Rs 47.00","assets/product-images/54.jpeg","prod_56_name", "prod_56_price", "prod_56_disc_price","prod_56_quant"),
          array("57", "1.5 Twinkling Star", "Rs 143.00", "Rs 29.00","assets/product-images/55.jpeg","prod_57_name", "prod_57_price", "prod_57_disc_price","prod_57_quant"),
          array("58", "4 Twinkling Star", "Rs 432.00", "Rs 86.00","assets/product-images/56.jpeg","prod_58_name", "prod_58_price", "prod_58_disc_price","prod_58_quant"),
          array("59", "Silver Flare", "Rs 527.00", "Rs 105.00","assets/product-images/silverflare_59.jpeg","prod_59_name", "prod_59_price", "prod_59_disc_price","prod_59_quant"),
          array("60", "Glittering Gems", "Rs 92.00", "Rs 18.00","assets/product-images/57.jpeg","prod_60_name", "prod_60_price", "prod_60_disc_price","prod_60_quant"),


          array("61", "Assorted Cartoons", "Rs 221.00", "Rs 44.00","assets/product-images/58.jpeg","prod_61_name", "prod_61_price", "prod_61_disc_price","prod_61_quant"),
          array("62", "7 cm Electric Sparkler", "Rs 50.00", "Rs 10.00","assets/product-images/59.jpeg","prod_62_name", "prod_62_price", "prod_62_disc_price","prod_62_quant"),
          array("63", "7 cm Color", "Rs 60.00", "Rs 12.00","assets/product-images/60.jpeg","prod_63_name", "prod_63_price", "prod_63_disc_price","prod_63_quant"),
          array("64", "7 cm Red", "Rs 86.00", "Rs 17.00","assets/product-images/61.jpeg","prod_64_name", "prod_64_price", "prod_64_disc_price","prod_64_quant"),
          array("65", "7 cm Green", "Rs 77.00", "Rs 15.00","assets/product-images/62.jpeg","prod_65_name", "prod_65_price", "prod_65_disc_price","prod_65_quant"),
          array("66", "10 cm Electric", "Rs 96.00", "Rs 19.00","assets/product-images/63.jpeg","prod_66_name", "prod_66_price", "prod_66_disc_price","prod_66_quant"),
          array("67", "10 cm Color", "Rs 107.00", "Rs 21.00","assets/product-images/64.jpeg","prod_67_name", "prod_67_price", "prod_67_disc_price","prod_67_quant"),
          array("68", "10 cm Red", "Rs 129.00", "Rs 26.00","assets/product-images/65.jpeg","prod_68_name", "prod_68_price", "prod_68_disc_price","prod_68_quant"),
          array("69", "10 cm Green", "Rs 116.00", "Rs 23.00","assets/product-images/66.jpeg","prod_69_name", "prod_69_price", "prod_69_disc_price","prod_69_quant"),
          array("70", "15 cm Electric", "Rs 244.00", "Rs 49.00","assets/product-images/67.jpeg","prod_70_name", "prod_70_price", "prod_70_disc_price","prod_70_quant"),

          array("71", "15 cm Color", "Rs 270.00", "Rs 54.00","assets/product-images/68.jpeg","prod_71_name", "prod_71_price", "prod_71_disc_price","prod_71_quant"),
          array("72", "15 cm Green", "Rs 323.00", "Rs 65.00","assets/product-images/69.jpeg","prod_72_name", "prod_72_price", "prod_72_disc_price","prod_72_quant"),
          array("73", "15 cm Red", "Rs 300.00", "Rs 60.00","assets/product-images/70.jpeg","prod_73_name", "prod_73_price", "prod_73_disc_price","prod_73_quant"),
          array("74", "30 cm Electric", "Rs 254.00", "Rs 51.00","assets/product-images/71.jpeg","prod_74_name", "prod_74_price", "prod_74_disc_price","prod_74_quant"),
          array("75", "30 cm Colour", "Rs 279.00", "Rs 56.00","assets/product-images/72.jpeg","prod_75_name", "prod_75_price", "prod_75_disc_price","prod_75_quant"),
          array("76", "30 cm Red", "Rs 333.00", "Rs 67.00","assets/product-images/73.jpeg","prod_76_name", "prod_76_price", "prod_76_disc_price","prod_76_quant"),
          array("77", "30 cm Green", "Rs 307.00", "Rs 61.00","assets/product-images/74.jpeg","prod_77_name", "prod_77_price", "prod_77_disc_price","prod_77_quant"),
          array("78", "50 cm Electric", "Rs 919.00", "Rs 184.00","assets/product-images/75.jpeg","prod_78_name", "prod_78_price", "prod_78_disc_price","prod_78_quant"),
          array("79", "15 cm pink violet/orange", "Rs 397.00", "Rs 79.00","assets/product-images/76.jpeg","prod_79_name", "prod_79_price", "prod_79_disc_price","prod_79_quant"),
          array("80", "30 cm Thunder Sound", "Rs 900.00", "Rs 180.00","assets/product-images/77.jpeg","prod_80_name", "prod_80_price", "prod_80_disc_price","prod_80_quant"),
          
          array("81", "Motu Patlu 2 Pcs", "Rs 1550.00", "Rs 310.00","assets/product-images/78.jpeg","prod_81_name", "prod_81_price", "prod_81_disc_price","prod_81_quant"),
          array("82", "Colour Chit Put", "Rs 210.00", "Rs 42.00","assets/product-images/79.jpeg","prod_82_name", "prod_82_price", "prod_82_disc_price","prod_82_quant"),
          array("83", "Ganga Jamuna", "Rs 790.00", "Rs 158.00","assets/product-images/80.jpeg","prod_83_name", "prod_83_price", "prod_83_disc_price","prod_83_quant"),
          array("84", "7 Colour Shot", "Rs 801.00", "Rs 160.00","assets/product-images/81.jpeg","prod_84_name", "prod_84_price", "prod_84_disc_price","prod_84_quant"),
          array("85", "Chotta Fancy", "Rs 312.00", "Rs 62.00","assets/product-images/82.jpeg","prod_85_name", "prod_85_price", "prod_85_disc_price","prod_85_quant"),
          array("86", "Teddy Color Fountain", "Rs 292.00", "Rs 58.00","assets/product-images/teddy_color_86.jpeg","prod_86_name", "prod_86_price", "prod_86_disc_price","prod_86_quant"),
          array("87", "Shower", "Rs 551.00", "Rs 110.00","assets/product-images/84.jpeg","prod_87_name", "prod_87_price", "prod_87_disc_price","prod_87_quant"),
          array("88", "Tri Colour Fountain", "Rs 1654.00", "Rs 331.00","assets/product-images/85.jpeg","prod_88_name", "prod_88_price", "prod_88_disc_price","prod_88_quant"),
          array("89", "Star Buzz", "Rs 852.00", "Rs 170.00","assets/product-images/86.jpeg","prod_89_name", "prod_89_price", "prod_89_disc_price","prod_89_quant"),
          array("90", "Pop Star", "Rs 852.00", "Rs 170.00","assets/product-images/87.jpeg","prod_90_name", "prod_90_price", "prod_90_disc_price","prod_90_quant"),
          
          
          array("91", "Bat and Ball", "Rs 1320.00", "Rs 264.00","assets/product-images/88.jpeg","prod_91_name", "prod_91_price", "prod_91_disc_price","prod_91_quant"),
          array("92", "Pappu Shower", "Rs 765.00", "Rs 153.00","assets/product-images/89.jpeg","prod_92_name", "prod_92_price", "prod_92_disc_price","prod_92_quant"),
          array("93", "Peacock", "Rs 919.00", "Rs 184.00","assets/product-images/90.jpeg","prod_93_name", "prod_93_price", "prod_93_disc_price","prod_93_quant"),
          array("94", "Talking Tom", "Rs 3000.00", "Rs 600.00","assets/product-images/91.jpeg","prod_94_name", "prod_94_price", "prod_94_disc_price","prod_94_quant"),
          array("95", "Multi Color Fountain", "Rs 877.00", "Rs 175.00","assets/product-images/92.jpeg","prod_95_name", "prod_95_price", "prod_95_disc_price","prod_95_quant"),
          array("96", "Drone", "Rs 794.00", "Rs 159.00","assets/product-images/93.jpeg","prod_96_name", "prod_96_price", "prod_96_disc_price","prod_96_quant"),
          array("97", "Magic Show Paper Shot", "Rs 2261.00", "Rs 452.00","assets/product-images/94.jpeg","prod_97_name", "prod_97_price", "prod_97_disc_price","prod_97_quant"),
          array("98", "Angry Bird", "Rs 2142.00", "Rs 416.00","assets/product-images/95.jpeg","prod_98_name", "prod_98_price", "prod_98_disc_price","prod_98_quant"),
          array("99", "Sun Flower", "Rs 460.00", "Rs 92.00","assets/product-images/96.jpeg","prod_99_name", "prod_99_price", "prod_99_disc_price","prod_99_quant"),
          array("100", "Tin Beer", "Rs 827.00", "Rs 165.00","assets/product-images/97.jpeg","prod_100_name", "prod_100_price", "prod_100_disc_price","prod_100_quant"),
          
          
          array("101", "Water Queen", "Rs 1040.00", "Rs 208.00","assets/product-images/98.jpeg","prod_101_name", "prod_101_price", "prod_101_disc_price","prod_101_quant"),
          array("102", "Photo Flash", "Rs 300.00", "Rs 60.00","assets/product-images/99.jpeg","prod_102_name", "prod_102_price", "prod_102_disc_price","prod_102_quant"),
          array("103", "Star Crackling", "Rs 911.00", "Rs 182.00","assets/product-images/100.jpeg","prod_103_name", "prod_103_price", "prod_103_disc_price","prod_103_quant"),
          array("104", "20:20", "Rs 1746.00", "Rs 349.00","assets/product-images/101.jpeg","prod_104_name", "prod_104_price", "prod_104_disc_price","prod_104_quant"),
          array("105", "1000 Bullet", "Rs 1735.00", "Rs 347.00","assets/product-images/102.jpeg","prod_105_name", "prod_105_price", "prod_105_disc_price","prod_105_quant"),
          array("106", "Rainbow Smoke", "Rs 1000.00", "Rs 200.00","assets/product-images/103.jpeg","prod_106_name", "prod_106_price", "prod_106_disc_price","prod_106_quant"),
          array("107", "Emu Egg", "Rs 1000.00", "Rs 200.00","assets/product-images/emu_egg_107.jpeg","prod_107_name", "prod_107_price", "prod_107_disc_price","prod_107_quant"),
          array("108", "Hello Kitty", "Rs 1470.00", "Rs 294.00","assets/product-images/105.jpeg","prod_108_name", "prod_108_price", "prod_108_disc_price","prod_108_quant"),
          array("109", "4 * 4 Wheel", "Rs 827.00", "Rs 165.00","assets/product-images/106.jpeg","prod_109_name", "prod_109_price", "prod_109_disc_price","prod_109_quant"),
          array("110", "Nemo Candle", "Rs 4608.00", "Rs 922.00","assets/product-images/107.jpeg","prod_110_name", "prod_110_price", "prod_110_disc_price","prod_110_quant"),
          
          array("111", "Twin Ligting Ball", "Rs 2029.00", "Rs 406.00","assets/product-images/108.jpeg","prod_111_name", "prod_111_price", "prod_111_disc_price","prod_111_quant"),
          array("112", "Striking Force", "Rs 2690.00", "Rs 538.00","assets/product-images/109.jpeg","prod_112_name", "prod_112_price", "prod_112_disc_price","prod_112_quant"),
          array("113", "Star Fire", "Rs 800.00", "Rs 160.00","assets/product-images/110.jpeg","prod_113_name", "prod_113_price", "prod_113_disc_price","prod_113_quant"),
          array("114", "Colour Tree", "Rs 900.00", "Rs 180.00","assets/product-images/111.jpeg","prod_114_name", "prod_114_price", "prod_114_disc_price","prod_114_quant"),
          array("115", "Bada Peacock", "Rs 1838.00", "Rs 368.00","assets/product-images/112.jpeg","prod_115_name", "prod_115_price", "prod_115_disc_price","prod_115_quant"),
          array("116", "Loli Pop", "Rs 1300.00", "Rs 260.00","assets/product-images/113.jpeg","prod_116_name", "prod_116_price", "prod_116_disc_price","prod_116_quant"),
          array("117", "Polo Fountain", "Rs 150.00", "Rs 30.00","assets/product-images/114.jpeg","prod_117_name", "prod_117_price", "prod_117_disc_price","prod_117_quant"),
          array("118", "KJ Pot Fountain", "Rs 880.00", "Rs 176.00","assets/product-images/115.jpeg","prod_118_name", "prod_118_price", "prod_118_disc_price","prod_119_quant"),
          array("119", "Happy Birthday Papershot4", "Rs 1224.00", "Rs 244.00","assets/product-images/116.jpeg","prod_119_name", "prod_119_price", "prod_119_disc_price","prod_119_quant"),
          array("120", "5 Star", "Rs 1700.00", "Rs 340.00","assets/product-images/117.jpeg","prod_120_name", "prod_120_price", "prod_120_disc_price","prod_120_quant"),
          
          array("121", "Fly Magic", "Rs 820.00", "Rs 164.00","assets/product-images/118.jpeg","prod_121_name", "prod_121_price", "prod_121_disc_price","prod_121_quant"),
          array("122", "Teen Titans", "Rs 820.00", "Rs 164.00","assets/product-images/119.jpeg","prod_122_name", "prod_122_price", "prod_122_disc_price","prod_122_quant"),
          array("123", "Welcome Show", "Rs 1546.00", "Rs 309.00","assets/product-images/welcome_show_123.jpeg","prod_123_name", "prod_123_price", "prod_123_disc_price","prod_123_quant"),
          array("124", "IPL Mix", "Rs 850.00", "Rs 170.00","assets/product-images/ipl_mix_124.jpeg","prod_124_name", "prod_124_price", "prod_124_disc_price","prod_124_quant"),
          array("125", "Guidar", "Rs 1320.00", "Rs 264.00","assets/product-images/120.jpeg","prod_125_name", "prod_125_price", "prod_125_disc_price","prod_125_quant"),
          array("126", "AK 47", "Rs 950.00", "Rs 190.00","assets/product-images/ak_47_126.jpeg","prod_126_name", "prod_126_price", "prod_126_disc_price","prod_126_quant"),
          array("127", "Tower Pot", "Rs 2120.00", "Rs 424.00","assets/product-images/tower_pot-127.jpeg","prod_127_name", "prod_127_price", "prod_127_disc_price","prod_127_quant"),
          array("128", "Violet Matrix", "Rs 2120.00", "Rs 424.00","assets/product-images/violet_matrix_128.jpeg","prod_128_name", "prod_128_price", "prod_128_disc_price","prod_128_quant"),
          array("129", "3 Pcs Fancy", "Rs 1779.00", "Rs 356.00","assets/product-images/121.jpeg","prod_129_name", "prod_129_price", "prod_129_disc_price","prod_129_quant"),
          array("130", "2.5 Fancy Special (2pcs)", "Rs 2050.00", "Rs 410.00","assets/product-images/122.jpeg","prod_130_name", "prod_130_price", "prod_130_disc_price","prod_130_quant"),
          
          array("131", "2.5 Fancy", "Rs 735.00", "Rs 147.00","assets/product-images/123.jpeg","prod_131_name", "prod_131_price", "prod_131_disc_price","prod_131_quant"),
          array("132", "3 Fancy Special", "Rs 889.00", "Rs 178.00","assets/product-images/124.jpeg","prod_132_name", "prod_132_price", "prod_132_disc_price","prod_132_quant"),
          array("133", "Ocean 3 pcs Fancy Special", "Rs 2485.00", "Rs 497.00","assets/product-images/125.jpeg","prod_133_name", "prod_133_price", "prod_133_disc_price","prod_133_quant"),
          array("134", "3.5 Fancy", "Rs 1470.00", "Rs 294.00","assets/product-images/126.jpeg","prod_134_name", "prod_134_price", "prod_134_disc_price","prod_134_quant"),
          array("135", "4 Fancy ", "Rs 3399.00", "Rs 680.00","assets/product-images/127.jpeg","prod_135_name", "prod_135_price", "prod_135_disc_price","prod_135_quant"),
          array("136", "4 Fancy Special 2 pcs", "Rs 6200.00", "Rs 1240.00","assets/product-images/128.jpeg","prod_136_name", "prod_136_price", "prod_136_disc_price","prod_136_quant"),
          array("137", "4 Fancy Double Ball", "Rs 2560.00", "Rs 512.00","assets/product-images/129.jpeg","prod_137_name", "prod_137_price", "prod_137_disc_price","prod_137_quant"),
          array("138", "Jolyday Series 2 Pcs", "Rs 5149.00", "Rs 1029.00","assets/product-images/joly_day_138.jpeg","prod_138_name", "prod_138_price", "prod_138_disc_price","prod_138_quant"),
          array("139", "Evershine Novelties 2 Pcs ", "Rs 4212.00", "Rs 842.00","assets/product-images/ever_shine_139.jpeg","prod_139_name", "prod_139_price", "prod_139_disc_price","prod_139_quant"),
          array("140", "Budget Aerial 2 Pcs", "Rs 2550.00", "Rs 510.00","assets/product-images/budget_serial_140.jpeg","prod_140_name", "prod_140_price", "prod_140_disc_price","prod_140_quant"),
          
          array("141", "Great Wall 2 Pcs", "Rs 5600.00", "Rs 1120.00","assets/product-images/great_wall_141.jpeg","prod_141_name", "prod_141_price", "prod_141_disc_price","prod_141_quant"),
          array("142", "3 Fancy Special", "Rs 2100.00", "Rs 420.00","assets/product-images/3_fancy_special_142.jpeg","prod_142_name", "prod_142_price", "prod_142_disc_price","prod_142_quant"),
          array("143", "12 Shot Laka Laka", "Rs 919.00", "Rs 184.00","assets/product-images/132.jpeg","prod_143_name", "prod_143_price", "prod_143_disc_price","prod_143_quant"),
          array("144", "Scud Missiles 6 Shot Chakkar Effort", "Rs 1410.00", "Rs 282.00","assets/product-images/134.jpeg","prod_144_name", "prod_144_price", "prod_144_disc_price","prod_144_quant"),
          array("145", "Jack N Jill 15 Shot", "Rs 2650.00", "Rs 530.00","assets/product-images/jack_and_jill_145.jpeg","prod_145_name", "prod_145_price", "prod_145_disc_price","prod_145_quant"),
          array("146", "Avenger 25 Shot", "Rs 3980.00", "Rs 796.00","assets/product-images/136.jpeg","prod_146_name", "prod_146_price", "prod_146_disc_price","prod_146_quant"),
          array("147", "Parasuit", "Rs 1500.00", "Rs 300.00","assets/product-images/parasuit_147.jpeg","prod_147_name", "prod_147_price", "prod_147_disc_price","prod_147_quant"),
          array("148", "30 Shot Square Box", "Rs 2200.00", "Rs 440.00","assets/product-images/138.jpeg","prod_148_name", "prod_148_price", "prod_148_disc_price","prod_148_quant"),
          array("149", "30 Shot ", "Rs 2600.00", "Rs 520.00","assets/product-images/139.jpeg","prod_149_name", "prod_149_price", "prod_149_disc_price","prod_149_quant"),
          array("150", "30 Shot Premium", "Rs 3980.00", "Rs 796.00","assets/product-images/140.jpeg","prod_150_name", "prod_150_price", "prod_150_disc_price","prod_150_quant"),

          array("151", "50 Shot", "Rs 5920.00", "Rs 1184.00","assets/product-images/141.jpeg","prod_151_name", "prod_151_price", "prod_151_disc_price","prod_151_quant"),
          array("152", "60 Shot", "Rs 5200.00", "Rs 1040.00","assets/product-images/60_shot_152.jpeg","prod_152_name", "prod_152_price", "prod_152_disc_price","prod_152_quant"),
          array("153", "101 Shot", "Rs 14000.00", "Rs 2800.00","assets/product-images/143.jpeg","prod_153_name", "prod_153_price", "prod_153_disc_price","prod_153_quant"),
          array("154", "120 Shot", "Rs 10400.00", "Rs 2080.00","assets/product-images/120_shot_154.jpeg","prod_154_name", "prod_154_price", "prod_154_disc_price","prod_154_quant"),
          array("155", "240 Shot", "Rs 20800.00", "Rs 4160.00","assets/product-images/145.jpeg","prod_155_name", "prod_155_price", "prod_155_disc_price","prod_155_quant"),
          array("156", "Crackling Coconut", "Rs 8453.00", "Rs 1800.00","assets/product-images/146.jpeg","prod_156_name", "prod_156_price", "prod_156_disc_price","prod_156_quant"),
          array("157", "Carnival Set Out", "Rs 29400.00", "Rs 5880.00","assets/product-images/147.jpeg","prod_157_name", "prod_157_price", "prod_157_disc_price","prod_157_quant"),
          array("158", "Valcano", "Rs 15619.00", "Rs 3124.00","assets/product-images/148.jpeg","prod_158_name", "prod_158_price", "prod_158_disc_price","prod_158_quant"),
          array("159", "Terminator 120 Shot", "Rs 18378.00", "Rs 3800.00","assets/product-images/149.jpeg","prod_159_name", "prod_159_price", "prod_159_disc_price","prod_159_quant"),
          array("160", "Champion Mini", "Rs 92.00", "Rs 18.00","assets/product-images/150.jpeg","prod_160_name", "prod_160_price", "prod_160_disc_price","prod_160_quant"),
          
          array("161", "Royal Super Del 3 in 1", "Rs 165.00", "Rs 33.00","assets/product-images/151.jpeg","prod_161_name", "prod_161_price", "prod_161_disc_price","prod_161_quant"),
          array("162", "Kids Wonder Pack", "Rs 404.00", "Rs 81.00","assets/product-images/152.jpeg","prod_162_name", "prod_162_price", "prod_162_disc_price","prod_162_quant"),
          array("163", "Royal Super 10 in 1", "Rs 650.00", "Rs 130.00","assets/product-images/153.jpeg","prod_163_name", "prod_163_price", "prod_163_disc_price","prod_163_quant"),
          array("164", "Smart Jumbo Duke ", "Rs 850.00", "Rs 170.00","assets/product-images/154.jpeg","prod_164_name", "prod_164_price", "prod_164_disc_price","prod_164_quant"),
          array("165", "Majestic Mega", "Rs 1550.00", "Rs 310.00","assets/product-images/155.jpeg","prod_165_name", "prod_165_price", "prod_165_disc_price","prod_165_quant"),
          array("166", "Whisling Rocket", "Rs 760.00", "Rs 152.00","assets/product-images/156.jpeg","prod_166_name", "prod_166_price", "prod_166_disc_price","prod_166_quant"),
          array("167", "Whisling Wheel", "Rs 720.00", "Rs 144.00","assets/product-images/157.jpeg","prod_167_name", "prod_167_price", "prod_167_disc_price","prod_167_quant"),
          array("168", "Whisling Pencil", "Rs 970.00", "Rs 194.00","assets/product-images/158.jpeg","prod_168_name", "prod_168_price", "prod_168_disc_price","prod_168_quant"),
          array("169", "Salsa Dancing", "Rs 1170.00", "Rs 234.00","assets/product-images/159.jpeg","prod_169_name", "prod_169_price", "prod_169_disc_price","prod_169_quant"),
          array("170", "Siren", "Rs 919.00", "Rs 184.00","assets/product-images/160.jpeg","prod_170_name", "prod_170_price", "prod_170_disc_price","prod_170_quant"),

          array("171", "Lovely Music ", "Rs 720.00", "Rs 144.00","assets/product-images/161.jpeg","prod_171_name", "prod_171_price", "prod_171_disc_price","prod_171_quant"),
          array("172", "Butterfly", "Rs 551.00", "Rs 110.00","assets/product-images/162.jpeg","prod_172_name", "prod_172_price", "prod_172_disc_price","prod_172_quant"),
          array("173", "Spinner Plastic Wheel", "Rs 580.00", "Rs 116.00","assets/product-images/163.jpeg","prod_173_name", "prod_173_price", "prod_173_disc_price","prod_173_quant"),
          array("174", "Bling Bling 6 Shot Whisling", "Rs 1310.00", "Rs 262.00","assets/product-images/164.jpeg","prod_174_name", "prod_174_price", "prod_174_disc_price","prod_174_quant"),
          array("175", "Arabian Night 12 Shot Whisling", "Rs 1975.00", "Rs 395.00","assets/product-images/165.jpeg","prod_175_name", "prod_175_price", "prod_175_disc_price","prod_175_quant"),
          array("176", "Rock And Roll 25 Shot Whisling", "Rs 4360.00", "Rs 872.00","assets/product-images/166.jpeg","prod_176_name", "prod_176_price", "prod_176_disc_price","prod_176_quant"),
          array("177", "Rotating Sparkler", "Rs 1100.00", "Rs 220.00","assets/product-images/166.jpeg","prod_177_name", "prod_177_price", "prod_177_disc_price","prod_177_quant"),

        );

                
            ?>
            <div class="products col-12">
  <div class="table-responsive">
    <table class="table" id="items">
      <thead>
        <tr style="color:red; font-weight:bold; font-size:18px">
          <th>S.No</th>
          <th>Product</th>
          <th>Image</th>
          <th>Unit Price</th>
          <th>Disc Price (80%)</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($prodarray as $product) { ?>
          <tr class="item-row">
            <td style="font-size:16px">
              <?php echo $product[0]; ?>
            </td>
            <td class="item-name">
              <input name="<?= $product[5] ?>" class="p_name" style="border: 0; background-color: #fff; font-size:16px" value="<?= $product[1] ?>" size="30" readonly>
            </td>
            <td>
              <a href="#" class="pop">
                <img src="<?= $product[4] ?>" style="width: 50px; height: 50px;">
              </a>
            </td>
            <td>
              <input name="<?= $product[6] ?>" class="original_cost" style="border: 0; background-color: #fff; font-size:16px; text-decoration: line-through; color:red; text-align:center;" value="<?= $product[2] ?>" size="10" readonly>
            </td>
            <td>
              <input name="<?= $product[7] ?>" class="cost" style="border: 0; background-color: #fff; font-size:16px" value="<?= $product[3] ?>" size="10" readonly>
            </td>
            <td>
              <input name="<?= $product[8] ?>" type="text" class="form-control qty" style="font-size:16px" size="4" value="0">
            </td>
            <td>
              <span class="price" aria-disabled="true" style="font-size:16px">Rs 0</span>
            </td>
          </tr>
              <?php 
            } ?>
              
              <tr style="font-size:16px">
                <td  class="total-line">Total</td>
                <td class="total-value" style="width:100px"><input name="prods_total" class="total" value="Rs 0" readonly size=10/></td>
                <td  class="total-line"></td>
                <td  class="total-line"></td>
              </tr>
              <!-- <tr style="font-size:16px">
          
                <td class="total-line">Discount</td>
                <td class="total-value"><div id="discount">10%</div></td>
                <td  class="total-line"></td>
                <td  class="total-line"></td>
              </tr> -->
              
              <!-- <tr style="font-size:16px">
                <td  class="total-line balance">Final Amount</td>
                <td class="total-value balance"><input name="prods_ftotal" class="due" value="Rs 0" readonly size=10/></td>
                <td  class="total-line"></td>
                <td  class="total-line"></td>
              </tr> -->
              
              </table>
            </div>
            <input type="submit" name = "PlaceOrder" value="Place Order"  style="font-size:18px" class="col-md-offset-4 col-md-4 btn btn-info">
          </form>
        </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-3 footer-contact">
            <h3>SRI VINAYAGA CRACKERS<span>.</span></h3>
            <p>
              5/288/13, KAMARAJ NAGAR, <br>
              ANUPANKULAM VILLAGE<br>
              Sivakasi, Tamil Nadu <br><br>
              <strong>Phone:</strong> +91-95979 94120<br>
              <strong>Whatsapp:</strong> <b>+91-95979 94120 ,<br/>  +91-81900 10528 </b><br>
              <strong>Email:</strong> shivatraders6@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Products</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#team">Terms & Conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="price-list.php">Price List</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="place-order.php">Place Order</a></li>
            </ul>
          </div>

          
          <div class="col-lg-3 col-md-3 footer-links">
            <h5>Payment Details</h5>
            <h4>Karur Vysya Bank</h4>
            <p>
            S. Siva Prakash <br/>
            A/C No: 1261155000095205 <br/>
            Karur Vysya Bank <br/>
            IFSC Code: KVBL0001261 <br/>
            Branch : Sivakasi <br/>
            Type : Savings <br/>
            <p>
          </div>


          <div class="col-lg-3 col-md-3 footer-links">
            <h5></h5> <br/>
            <h4>AXIS Bank</h4>
            <p>
            S. Siva Prakash <br/>
            A/C No: 913010049074945 </br>
            AXIS BANK <br/>
            IFSC Code: UTIB0000089 <br/>
            Branch : Sivakasi <br/>
            Type : Savings <br/>
          </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-205878000-1">
</script>
    
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-205878000-1');
</script>

</body>
</html>