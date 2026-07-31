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
<script>
$(document).ready(function(){
	$('.pop').on('click',function(){
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
          <li><a class="nav-link scrollto " href="price-list.php">Price List</a></li>
          <li><a class="nav-link scrollto" href="place-order.php">Place Order</a></li>
          <li><a class="nav-link scrollto" href="products-show.php">Product Gallery</a></li>
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
          <h2>Price List</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Price List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Product</th>
      <th scope="col" style='text-align:center'>Price (Rs)</th>
      <th scope="col"  style='text-align:center'>Disc. Price (80%)</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th scope="row">1</th>
      <td>2.75 Kurvi</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 50.00</td>
      <td style= 'text-align:center'>&#8377; 10.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/1.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">2</th>
      <td>3.5 Lakshmi</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 70.00</td>
      <td style= 'text-align:center'>&#8377; 14.00</td>
      
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/2.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>4 Lakshmi</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 107.00</td>
      <td style= 'text-align:center'>&#8377; 21.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/3.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>

    </tr>

    <tr>
      <th scope="row">4</th>
      <td>4 Lakshmi Del</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 162.00</td>
      <td style= 'text-align:center'>&#8377; 32.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/4.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>4 Lakshmi Special Premium</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 257.00</td>
      <td style= 'text-align:center'>&#8377; 51.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/5.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">6</th>
      <td>Hanuman Super Del </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 198.00</td>
      <td style= 'text-align:center'>&#8377; 40.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/6.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>2 Sound </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 176.00</td>
      <td style= 'text-align:center'>&#8377; 35.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/7.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">8</th>
      <td>2 Sound Special Premium</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 257.00</td>
      <td style= 'text-align:center'>&#8377; 51.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/8.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">9</th>
      <td>28 Chorsa</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 62.00</td>
      <td style= 'text-align:center'>&#8377; 12.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/9.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">10</th>
      <td>28 Gaint</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 143.00</td>
      <td style= 'text-align:center'>&#8377; 29.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/10.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">11</th>
      <td>56 Gaint</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 287.00</td>
      <td style= 'text-align:center'>&#8377; 57.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/11.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">12</th>
      <td>24 Deluxe</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 235.00</td>
      <td style= 'text-align:center'>&#8377; 47.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/12.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">13</th>
      <td>100 Deluxe</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1617.00</td>
      <td style= 'text-align:center'>&#8377; 323.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/13.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">14</th>
      <td>Red Bijili</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 184.00</td>
      <td style= 'text-align:center'>&#8377; 37.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/14.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">15</th>
      <td>Striped Bijili</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 202.00</td>
      <td style= 'text-align:center'>&#8377; 40.00</td>
      
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/15.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">16</th>
      <td>Gold Red Bijili</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 198.00</td>
      <td style= 'text-align:center'>&#8377; 40.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/16.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">17</th>
      <td>Basket Bijili</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 368.00</td>
      <td style= 'text-align:center'>&#8377; 74.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/17.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">18</th>
      <td>Bullet Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 143.00</td>
      <td style= 'text-align:center'>&#8377; 29.00</td>
      
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/18.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
    
    <tr>
      <th scope="row">19</th>
      <td>Hydro Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 340.00</td>
      <td style= 'text-align:center'>&#8377; 68.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/19.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">20</th>
      <td>King of King</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 465.00</td>
      <td style= 'text-align:center'>&#8377; 93.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/20.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>

    </tr>

    <tr>
      <th scope="row">21</th>
      <td>Classic Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 639.00</td>
      <td style= 'text-align:center'>&#8377; 128.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/21.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>

    </tr>

    <tr>
      <th scope="row">22</th>
      <td>555 Magic Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 535.00</td>
      <td style= 'text-align:center'>&#8377; 107.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/22.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">23</th>
      <td>King Kong Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1011.00</td>
      <td style= 'text-align:center'>&#8377; 202.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/23.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">24</th>
      <td>100 Wala</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 195.00</td>
      <td style= 'text-align:center'>&#8377; 39.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/24.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">25</th>
      <td>100 Wala Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 272.00</td>
      <td style= 'text-align:center'>&#8377; 54.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/25.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">26</th>
      <td>100 jegajal</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 195.00</td>
      <td style= 'text-align:center'>&#8377; 39.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/26.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">27</th>
      <td>28 jegajal</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 62.00</td>
      <td style= 'text-align:center'>&#8377; 12.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/27.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">28</th>
      <td>1000 Wala  </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1654.00</td>
      <td style= 'text-align:center'>&#8377; 331.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/28.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">29</th>
      <td>1000 Wala Mega </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2426.00</td>
      <td style= 'text-align:center'>&#8377; 485.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/29.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">30</th>
      <td>1000 Wala Half Count</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1139.00</td>
      <td style= 'text-align:center'>&#8377; 228.00</td>
      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/30.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">31</th>
      <td>5000 Wala </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 8269.00</td>
      <td style= 'text-align:center'>&#8377; 1654.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/31.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">32</th>
      <td>5000 Wala Spec</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 12128.00</td>
      <td style= 'text-align:center'>&#8377; 2426.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/31.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">33</th>
      <td>10000 Wala Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 16538.00</td>
      <td style= 'text-align:center'>&#8377; 3308.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/33.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">34</th>
      <td>Rocket Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 349.00</td>
      <td style= 'text-align:center'>&#8377; 70.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/34.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">35</th>
      <td>Lunick Rocket Bomb</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 621.00</td>
      <td style= 'text-align:center'>&#8377; 124.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/35.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">36</th>
      <td>2 Sound Rocket</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 676.00</td>
      <td style= 'text-align:center'>&#8377; 135.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/36.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">37</th>
      <td>3 Sound Rocket</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2021.00</td>
      <td style= 'text-align:center'>&#8377; 404.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/37.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">38</th>
      <td>Flower Pot Big</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 360.00</td>
      <td style= 'text-align:center'>&#8377; 72.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/38.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">39</th>
      <td>Flower Pot Spec</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 542.00</td>
      <td style= 'text-align:center'>&#8377; 108.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/39.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">40</th>
      <td>Flower Pot Asoka</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 796.00</td>
      <td style= 'text-align:center'>&#8377; 159.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/40.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">41</th>
      <td>Flower Pot Special Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1101.00</td>
      <td style= 'text-align:center'>&#8377; 220.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/41.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">42</th>
      <td>Flower Pot Del</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1103.00</td>
      <td style= 'text-align:center'>&#8377; 221.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/42.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">43</th>
      <td>Colour Koti</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1103.00</td>
      <td style= 'text-align:center'>&#8377; 221.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/43.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">44</th>
      <td>Green Berry Colour Koti Big</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 3021.00</td>
      <td style= 'text-align:center'>&#8377; 604.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/44.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>


  <tr>
      <th scope="row">45</th>
      <td>Ground Chakkar Big 25ps</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 472.00</td>
      <td style= 'text-align:center'>&#8377; 94.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/45.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">46</th>
      <td>Ground Chakkar Big 10</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 211.00</td>
      <td style= 'text-align:center'>&#8377; 42.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/46.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">47</th>
      <td>Ground Chakkar Special</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 377.00</td>
      <td style= 'text-align:center'>&#8377; 75.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/47.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">48</th>
      <td>Chocolate Chakkar</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/48.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">49</th>
      <td>Ground Chakkar Del</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 757.00</td>
      <td style= 'text-align:center'>&#8377; 151.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/49.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>

    </tr>

    <tr>
      <th scope="row">50</th>
      <td>Ground Chakkar Del Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1158.00</td>
      <td style= 'text-align:center'>&#8377; 232.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/50.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">51</th>
      <td>10 Colour Pencil </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 272.00</td>
      <td style= 'text-align:center'>&#8377; 54.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/51.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">52</th>
      <td>12 Colour Pencil</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 342.00</td>
      <td style= 'text-align:center'>&#8377; 68.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/52.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">53</th>
      <td>15 Colour Pencil</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 404.00</td>
      <td style= 'text-align:center'>&#8377; 81.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/53.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>

    </tr>

    <tr>
      <th scope="row">54</th>
      <td>Jil Jil</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 235.00</td>
      <td style= 'text-align:center'>&#8377; 47.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/54.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">55</th>
      <td>1.5 Twinkling Star</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 143.00</td>
      <td style= 'text-align:center'>&#8377; 29.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/55.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">56</th>
      <td>4 Twinkling Star</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 432.00</td>
      <td style= 'text-align:center'>&#8377; 86.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/56.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">57</th>
      <td>Glittering Gems</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 92.00</td>
      <td style= 'text-align:center'>&#8377; 18.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/57.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">58</th>
      <td>Assorted Cartoons</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 221.00</td>
      <td style= 'text-align:center'>&#8377; 44.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/58.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">59</th>
      <td>7 cm Electric Sparkler</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 61.00</td>
      <td style= 'text-align:center'>&#8377; 12.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/59.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">60</th>
      <td>7cm Colour</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 64.00</td>
      <td style= 'text-align:center'>&#8377; 13.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/60.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">61</th>
      <td>7cm Red</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 86.00</td>
      <td style= 'text-align:center'>&#8377; 17.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/61.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">62</th>
      <td>7cm Green</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 77.00</td>
      <td style= 'text-align:center'>&#8377; 15.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/62.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">63</th>
      <td>10cm Electric</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 96.00</td>
      <td style= 'text-align:center'>&#8377; 19.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/63.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">64</th>
      <td>10cm Colour</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 107.00</td>
      <td style= 'text-align:center'>&#8377; 21.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/64.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">65</th>
      <td>10cm Red</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 129.00</td>
      <td style= 'text-align:center'>&#8377; 26.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/65.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">66</th>
      <td>10 cm Green</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 116.00</td>
      <td style= 'text-align:center'>&#8377; 23.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/66.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">67</th>
      <td>15 cm Electric</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 244.00</td>
      <td style= 'text-align:center'>&#8377; 49.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/67.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">68</th>
      <td>15 cm Colour</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 270.00</td>
      <td style= 'text-align:center'>&#8377; 54.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/68.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">69</th>
      <td>15 cm Green</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 323.00</td>
      <td style= 'text-align:center'>&#8377; 65.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/69.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">70</th>
      <td>15 cm Red</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 300.00</td>
      <td style= 'text-align:center'>&#8377; 60.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/70.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">71</th>
      <td>30 cm Electric</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 254.00</td>
      <td style= 'text-align:center'>&#8377; 51.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/71.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">72</th>
      <td>30 cm Colour</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 279.00</td>
      <td style= 'text-align:center'>&#8377; 56.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/72.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">73</th>
      <td>30 cm Red</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 333.00</td>
      <td style= 'text-align:center'>&#8377; 67.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/73.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">74</th>
      <td>30 cm Green</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 307.00</td>
      <td style= 'text-align:center'>&#8377; 61.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/74.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">75</th>
      <td>50 cm Electric</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 919.00</td>
      <td style= 'text-align:center'>&#8377; 184.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/75.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">76</th>
      <td>15 cm pink violet/orange</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 397.00</td>
      <td style= 'text-align:center'>&#8377; 79.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/76.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">77</th>
      <td>30 cm Thunder Sound</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1400.00</td>
      <td style= 'text-align:center'>&#8377; 180.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/77.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">78</th>
      <td>Motu Patlu 2 Pcs</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1286.00</td>
      <td style= 'text-align:center'>&#8377; 257.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/78.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">79</th>
      <td>Colour Chit Put</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 210.00</td>
      <td style= 'text-align:center'>&#8377; 42.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/79.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">80</th>
      <td>Ganga Jamuna</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 790.00</td>
      <td style= 'text-align:center'>&#8377; 158.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/80.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">81</th>
      <td>7 Colour Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 801.00</td>
      <td style= 'text-align:center'>&#8377; 160.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/81.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">82</th>
      <td>Chotta Fancy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 312.00</td>
      <td style= 'text-align:center'>&#8377; 62.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/82.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">83</th>
      <td>Teddy Color Fountain</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 276.00</td>
      <td style= 'text-align:center'>&#8377; 55.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/83.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">84</th>
      <td>Shower </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 551.00</td>
      <td style= 'text-align:center'>&#8377; 110.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/84.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">85</th>
      <td>Tri Colour Fountain</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1654.00</td>
      <td style= 'text-align:center'>&#8377; 331.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/85.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">86</th>
      <td>Star Buzz</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/86.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">87</th>
      <td>Pop Star</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/87.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">88</th>
      <td>Golden Spring</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/88.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">89</th>
      <td>Pappu Shower</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/89.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">90</th>
      <td>Peacock</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 919.00</td>
      <td style= 'text-align:center'>&#8377; 184.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/90.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">91</th>
      <td>Talking Tom</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2756.00</td>
      <td style= 'text-align:center'>&#8377; 551.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/91.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">92</th>
      <td>Multi Color Fountain</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/92.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">93</th>
      <td>Drone</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 794.00</td>
      <td style= 'text-align:center'>&#8377; 159.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/93.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">94</th>
      <td>Magic Show Paper Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2139.00</td>
      <td style= 'text-align:center'>&#8377; 428.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/94.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">95</th>
      <td>Angry Bird</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2021.00</td>
      <td style= 'text-align:center'>&#8377; 404.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/95.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">96</th>
      <td>Sun Flower</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 447.00</td>
      <td style= 'text-align:center'>&#8377; 89</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/96.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">97</th>
      <td>Tin Beer</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/97.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">98</th>
      <td>Water Queen</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/98.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">99</th>
      <td>Photo Flash</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 257.00</td>
      <td style= 'text-align:center'>&#8377; 51.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/99.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">100</th>
      <td>Star Crackling</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 860.00</td>
      <td style= 'text-align:center'>&#8377; 172.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/100.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">101</th>
      <td>20:20</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1646.00</td>
      <td style= 'text-align:center'>&#8377; 329.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/101.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">102</th>
      <td>1000 Bullet</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1735.00</td>
      <td style= 'text-align:center'>&#8377; 347.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/102.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
    <tr>
      <th scope="row">103</th>
      <td>Rainbow Smoke</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1374.00</td>
      <td style= 'text-align:center'>&#8377; 275.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/103.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
    <tr>
      <th scope="row">104</th>
      <td>Emu Egg</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1000.00</td>
      <td style= 'text-align:center'>&#8377; 200.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/104.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
    <tr>
      <th scope="row">105</th>
      <td>Kinderjoy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1400.00</td>
      <td style= 'text-align:center'>&#8377; 280.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/105.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
    
    <tr>
      <th scope="row">106</th>
      <td>4 * 4 Wheel</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/106.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">107</th>
      <td>Nemo Candle</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 4608.00</td>
      <td style= 'text-align:center'>&#8377; 922.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/107.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">108</th>
      <td>Twin Ligting Ball</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2029.00</td>
      <td style= 'text-align:center'>&#8377; 406.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/108.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">109</th>
      <td>Striking Force</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2690.00</td>
      <td style= 'text-align:center'>&#8377; 538.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/109.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">110</th>
      <td>Star Fire</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 728.00</td>
      <td style= 'text-align:center'>&#8377; 146.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/110.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">111</th>
      <td>Colour Tree</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 831.00</td>
      <td style= 'text-align:center'>&#8377; 166.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/111.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">112</th>
      <td>Bada Peacock</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1838.00</td>
      <td style= 'text-align:center'>&#8377; 368.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/112.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">113</th>
      <td>Loli Pop</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1397.00</td>
      <td style= 'text-align:center'>&#8377; 279.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/113.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">114</th>
      <td>Polo Fountain</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 140.00</td>
      <td style= 'text-align:center'>&#8377; 28.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/114.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">115</th>
      <td>KJ Pot Fountain</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 827.00</td>
      <td style= 'text-align:center'>&#8377; 165.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/115.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">116</th>
      <td>Hip Hop</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 198.00</td>
      <td style= 'text-align:center'>&#8377; 40.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/116.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">117</th>
      <td>5 Star</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1470.00</td>
      <td style= 'text-align:center'>&#8377; 294.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/117.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">118</th>
      <td>Fly Magic</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/118.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">119</th>
      <td>Teen Titans</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/119.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">120</th>
      <td>Welcome Show</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1397.00</td>
      <td style= 'text-align:center'>&#8377; 279.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/120.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">121</th>
      <td>3 Ps  Fancy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1779.00</td>
      <td style= 'text-align:center'>&#8377; 356.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/121.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">122</th>
      <td>2.5 Fancy Special (2pcs)</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1904.00</td>
      <td style= 'text-align:center'>&#8377; 381.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/122.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">123</th>
      <td>2.5 Fancy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/123.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">124</th>
      <td>3 Fancy Special </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 889.00</td>
      <td style= 'text-align:center'>&#8377; 178.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/124.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">125</th>
      <td>Ocean 3 pcs Fancy Special </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2279.00</td>
      <td style= 'text-align:center'>&#8377; 456.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/125.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">126</th>
      <td>3.5 Fancy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1470.00</td>
      <td style= 'text-align:center'>&#8377; 294.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/126.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">127</th>
      <td>4 Fancy</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 3399.00</td>
      <td style= 'text-align:center'>&#8377; 680.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/127.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">128</th>
      <td>4 Fancy  Special 2 pcs</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 5656.00</td>
      <td style= 'text-align:center'>&#8377; 1131.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/128.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">129</th>
      <td>3.5 Fancy Double Ball</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2389.00</td>
      <td style= 'text-align:center'>&#8377; 478.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/129.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">130</th>
      <td>3 Fancy Special</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2100.00</td>
      <td style= 'text-align:center'>&#8377; 420.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/130.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">131</th>
      <td>Mr. Bean</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 4079.00</td>
      <td style= 'text-align:center'>&#8377; 816.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/130.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">132</th>
      <td>12 Shot Laka Laka</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 919.00</td>
      <td style= 'text-align:center'>&#8377; 184.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/131.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">133</th>
      <td>12 Shot </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 662.00</td>
      <td style= 'text-align:center'>&#8377; 132.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/132.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">134</th>
      <td>Scud missiles 6 shot chakkar effort</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1369.00</td>
      <td style= 'text-align:center'>&#8377; 274.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/133.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">135</th>
      <td>Jack n Jill 15 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2573.00</td>
      <td style= 'text-align:center'>&#8377; 515.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/134.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">136</th>
      <td>Avenger 25 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 3859.00</td>
      <td style= 'text-align:center'>&#8377; 772.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/135.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">137</th>
      <td>Parasuit</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1500.00</td>
      <td style= 'text-align:center'>&#8377; 300.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/136.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">138</th>
      <td>30 Shots Square Box</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2084.00</td>
      <td style= 'text-align:center'>&#8377; 417.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/137.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">139</th>
      <td>30 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 2444.00</td>
      <td style= 'text-align:center'>&#8377; 489.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/138.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">140</th>
      <td>30 Shot Premium</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 3859.00</td>
      <td style= 'text-align:center'>&#8377; 772.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/139.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">141</th>
      <td>50 Shot </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 5739.00</td>
      <td style= 'text-align:center'>&#8377; 1148.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/140.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">142</th>
      <td>60 Shot </td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 4778.00</td>
      <td style= 'text-align:center'>&#8377; 956.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/141.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">143</th>
      <td>101 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 13598.00</td>
      <td style= 'text-align:center'>&#8377; 2720.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/142.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">144</th>
      <td>120 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 9555.00</td>
      <td style= 'text-align:center'>&#8377; 1911.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/143.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">145</th>
      <td>240 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 18743.00</td>
      <td style= 'text-align:center'>&#8377; 3749.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/144.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">146</th>
      <td>Crackling Coconut</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 8453.00</td>
      <td style= 'text-align:center'>&#8377; 1691.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/147.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">147</th>
      <td>Carnival Set Out</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 29400.00</td>
      <td style= 'text-align:center'>&#8377; 5880.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/148.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">148</th>
      <td>Volcano</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 15619.00</td>
      <td style= 'text-align:center'>&#8377; 3124.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/149.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">149</th>
      <td>Terminator 120 Shot</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 18378.00</td>
      <td style= 'text-align:center'>&#8377; 3675.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/150.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>


    <tr>
      <th scope="row">150</th>
      <td>Champion Mini</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 92.00</td>
      <td style= 'text-align:center'>&#8377; 18.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/151.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">151</th>
      <td>Royal Super Del 3 in 1</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 165.00</td>
      <td style= 'text-align:center'>&#8377; 33.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/152.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">152</th>
      <td>Kids Wonder Pack</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 404.00</td>
      <td style= 'text-align:center'>&#8377; 81.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/153.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">153</th>
      <td>Royal Super 10 in 1</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 515.00</td>
      <td style= 'text-align:center'>&#8377; 103.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/154.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">154</th>
      <td>Twinkle Minkle</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/155.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">155</th>
      <td>Majestic Mega</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1360.00</td>
      <td style= 'text-align:center'>&#8377; 272.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/156.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">156</th>
      <td>Whisling Rocket</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 735.00</td>
      <td style= 'text-align:center'>&#8377; 147.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/157.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">157</th>
      <td>Whisling Wheel</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 698.00</td>
      <td style= 'text-align:center'>&#8377; 140.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/158.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">158</th>
      <td>Whisling Pencil</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 937.00</td>
      <td style= 'text-align:center'>&#8377; 187.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/159.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">159</th>
      <td>Salsa Dancing</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1132.00</td>
      <td style= 'text-align:center'>&#8377; 226.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/160.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">160</th>
      <td>Siren</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 919.00</td>
      <td style= 'text-align:center'>&#8377; 184.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/161.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">161</th>
      <td>Lovely Music</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 700.00</td>
      <td style= 'text-align:center'>&#8377; 140.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/162.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">162</th>
      <td>Butterfly</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 551.00</td>
      <td style= 'text-align:center'>&#8377; 110.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/163.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">163</th>
      <td>Spinner Plastic Wheel</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 551.00</td>
      <td style= 'text-align:center'>&#8377; 110.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/164.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">164</th>
      <td>Bling Bling 6 Shot Whisling</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1268.00</td>
      <td style= 'text-align:center'>&#8377; 254.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/165.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">165</th>
      <td>Arabian Night 12 Shot Whisling</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 1918.00</td>
      <td style= 'text-align:center'>&#8377; 384.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/166.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>

    <tr>
      <th scope="row">166</th>
      <td>Rock and Roll 25 Shot Whisling</td>
      <td style= 'text-decoration: line-through; color:red; text-align:center;'>&#8377; 4226.00</td>
      <td style= 'text-align:center'>&#8377; 845.00</td>

      <td> 
      <a href="#" class="pop">
    <img src="assets/product-images/167.jpeg" style="width: 50px; height: 50px;">
    </a>    
    </td>
    </tr>
  
  </tbody>
</table>
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