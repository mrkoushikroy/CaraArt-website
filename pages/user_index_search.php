<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cara Art</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="../assets/style.css" rel="stylesheet"/>
    <!--     inserted     -->

</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-dark ">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Serve(8) Web Solutions, Inc." data-placement="bottom" target="">
                    Cara Art
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user_index.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Electronic Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_order.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons files_box"></i>
                            <p>Transactions</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Shopping Cart</p>
                        </a>
                    </li>
                    <li  class="nav-item">
                        <form method="POST" action="user_index_search.php" class="nav-link" >
                       
                        <input type="text" class="form-control mr-sm-2  is-valid" type="search" name="search" class="search-query"  placeholder="Search product">
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets\img\men.jpg" class="d-block w-100" alt="..." class="d-block w-100 img-body" alt="..." height="550" width="1200">
      <div class="carousel-caption d-none d-md-block">
      <h5 class="bg-danger">Abstract Art Painting</h5>
        <p class="bg-dark">Buy and sell Painting, Book Appointment and much more</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets\img\brush.jpeg" class="d-block w-100" alt="..." class="d-block w-100 img-body" alt="..." height="550" width="1200">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="bg-danger">Brush Arts</h5>
        <p class="bg-dark">Buy and sell Painting, Book Appointment and much more</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets\img\little.png" class="d-block w-100" alt="..." class="d-block w-100 img-body" alt="..." height="550" width="1200">
      <div class="carousel-caption d-none d-md-block">
      <h5 class="bg-danger">Littlr Art</h5>
        <p class="bg-dark">Buy and sell Painting, Book Appointment and much more</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    
    <!-- ------------------------ -->
    <br><hr color="orange">

<div class="container tab-pane  active" id="">
    <ul class="thumbnails">
        <?php
        if (isset($_POST['search'])){
                                        
        $search=$_POST['search'];
                                            
        $query="SELECT * FROM products WHERE category LIKE '%$search%' OR prod_name LIKE '%$search%' OR prod_desc LIKE '%$search%'";
        $result = mysqli_query($dbconn,$query);
        while($res=mysqli_fetch_array($result)){
            $prod_id=$res['prod_id'];
        ?> 

<div class="row">
    
        
    <?php if($res['prod_pic1'] != ""): ?>
        <div class="col-lg-4">
    <img src="../uploads/<?php echo $res['prod_pic1']; ?>" width="300px" height="200px">
    </div>
    <?php else: ?>
    <img src="../uploads/default.png" width="300px" height="200px">
    <?php endif; ?>
    <div class="col-lg-4">


  <h5><b><?php echo $res['prod_name'];?></b></h5>
  <p><b><?php echo $res['prod_desc'];?></b></p>
  <b>Art by: <?php echo $res['supplier'];?></b>
  </div>
  <div class="col-lg-2">
  <h6><a class="btn btn-success btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>More</a></h6>
  <h6><a class="btn btn-outline-danger btn-round" title="Price" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="fa fa-inr" aria-hidden="true"></i>Price <?php echo $res['prod_price']; ?></a></h6>
  <h6><a class="btn btn-danger btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="fa fa-cart-plus" aria-hidden="true"></i>
</i>Buy</a></h6>

  </div>
</div>


<hr color="orange">
          </div>
                 
            <?php }?> 
            <?php }?> 

    </ul>
</div>




</div>
</div>     
</div>
<footer class="footer" data-background-color="black">
<div class="container">
<nav>
<ul>
    <li>
        <a href="" target="_blank">
            Cara
        </a>
    </li>
    <li>
        Elective02
    </li>
</ul>
</nav>
<div class="copyright">
&copy;
<script>
    document.write(new Date().getFullYear())
</script>, Designed and Coded by Cara Art Web Solutions, Inc.
</div>
</div>
</footer>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
// the body of this function is in assets/js/now-ui-kit.js
nowuiKit.initSliders();
});

function scrollToDownload() {

if ($('.section-download').length != 0) {
$("html, body").animate({
scrollTop: $('.section-download').offset().top
}, 1000);
}
}
</script>



<!---  inserted  -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/google-code-prettify/prettify.js"></script>
<script src="../assets/js/application.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>
<script src="../assets/js/bootstrap-affix.js"></script>
<script src="../assets/js/jquery.lightbox-0.5.js"></script>
<script src="../assets/js/bootsshoptgl.js"></script>
<script type="text/javascript">
$(function() {
$('#gallery a').lightBox();
});
</script>

<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plugins/demo.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$(function () {
$("#example1").DataTable({
});
});
</script>
<!--  inserted  -->

</html>