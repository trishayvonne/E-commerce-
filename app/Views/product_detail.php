<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>FURNITURE</title>
    <style>
        img{
            width: 400px;
            height: 400px;
        }
        .container{
        display:flex;
        justify-content:center;
        align-items:center;
    }
    *{
        font-family: Arial;
    }
    </style>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="template/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    
  <!-- furniture section -->
        <section class="product_detail_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product_image">
                            <img src="/public/uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product_details">
                            <h2><?= $product['name'] ?></h2>
                            <p><?= $product['description'] ?></p>
                            <div class="price_box">
                                <h6 class="price_heading">
                                    <span>₱</span> <?= number_format($product['price'], 2) ?>
                                </h6>
                                <a href="">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>