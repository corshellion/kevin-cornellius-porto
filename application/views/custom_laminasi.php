<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        TCREATIVE
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/owl.carousel.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/owl.theme.css');?>" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo base_url('assets/css/style.default.css');?>" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/respond.min.js');?>"></script>

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png');?>">



</head>

<body>
<?php  $email = $this->session->userdata('username_login');?>
  <?php $keranjang=0;?>
    <?php  $data=$this->cart->contents(); ?>
    <?php foreach($data as $items){  ?>
    <?php if($items['status']=='terbuka'){  ?> 
        <?php $keranjang+=1;?>
     <?php } ?>
    <?php } ?>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <?php if($email!=""){?>
                 <ul class="menu">
                    <li><font color="white">
					
						<?php
                        $email = $this->session->userdata('username_login');
						 //echo "Welcome, ". $_POST['email'];
                    $tampnama="";
                    $query = $this->db->query("SELECT nama_user FROM user where email_user ='$email'");

                            foreach ($query->result_array() as $row)
                            {
                                    $tampnama=$row['nama_user'];
                            }
						?>
                        </a>
                            <a href="<?php echo base_url('Php/account')?>"><span><?php echo "Welcome, ".$tampnama ?></span></a>
					</font></li>
                    <li><a href="<?php echo base_url('Php/logout')?>">Logout</a>
                    </li>
                </ul>
                <?php } ?>
                <?php if($email=="") { ?>
                  <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="<?php echo base_url('Php/register')?>">Register</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="index_login.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo base_url('Php/register');?>"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="<?php echo base_url('');?>" data-animate-hover="bounce">
                    <img src="<?php echo base_url('assets/img/LogoTcreativeCrop.png');?>" height="60px" alt="TCREATIVE logo" class="hidden-xs">
                    <img src="<?php echo base_url('assets/img/logo-small.png');?>" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="<?php echo base_url('Php/basket');?>">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"><?php echo $keranjang;?> items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active">
						<a href="<?php echo base_url('');?>"class="dropdown-toggle" data-hover="dropdown" data-delay="200">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Php/product');?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Product </a>
					</li>

                    <li>
                        <a href="<?php echo base_url('Php/galery');?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Galery </a>
                    </li>

					<li>
                        <a href="<?php echo base_url('Php/contact');?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Contact Us</a>
					</li>
				</ul>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="<?php echo base_url('Php/basket');?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $keranjang;?> items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">
			
			

                <div class="container">
				
				<div class="box">
					<form method="post" action="<?php echo base_url('Php/size');?>">
						<h1>Choose Your Paper</h1>
						<ul class="nav nav-pills nav-justified">
							<li class="disabled"><a href="#"><b>1</b><br>Choose Your Paper</a>
							</li>
							<li class="active"><a href="#"><b>2</b><br>Choose Your Lamination</a>
							</li>
							<li class="disabled"><a href="#"><b>3</b><br>Set the Size & Quantity</a>
							</li>
							<li class="disabled"><a href="#"><b>4</b><br>Customize Your Own Sticker</a>
							</li>
							
						</ul>
					<div class="content">
						<div class="table-responsive">
							<div class="same-height-row">
								<div class="col-sm-4">
									<div class="box same-height clickable">
										<h3><a href="<?php echo base_url('Php/customlaminasi/glossy/'.$kode);?>">GLOSSY</a></h3>
										<p>Laminasi glossy menghasilkan cetakan yang hasilnya terang dan berkilau. Mencetak dengan laminasi glossy memantulkan cahaya lebih banyak dan menghasilkan warna yang lebih baik daripada laminasi doff karena sifatnya yang menyerap warna pada tinta.</p>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="box same-height clickable">
										<h3><a href="<?php echo base_url('Php/customlaminasi/doff/'.$kode);?>">DOFF</a></h3>
										<p>Laminasi doff menghasilkan cetakan yang tidak berkilau dan bertujuan untuk memberikan perlindungan pada hasil printing. Mencetak dengan laminasi doff menghalangi kotoran dan bekas sidik jari pada kertas. Cahaya juga tidak akan memantul dari kertas, apabila dibandingkan dengan hasil laminasi glossy.</p>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="box same-height clickable">
										<h3><a href="<?php echo base_url('Php/customlaminasi/none/'.$kode);?>">NO LAMINATION</a></h3>
										<p>Tidak menggunakan laminasi.</p>
									</div>
								</div>
							</div>
						</div>
						
						<div class="box-footer">
							<div class="pull-left">
								<a href="<?php echo base_url('Php/kertas/'.$kode);  ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Continue<i class="fa fa-chevron-right"></i>
								</button>
							</div>
						</div>
						
					</div>
                    <!-- /.row -->
					
					</form>
				</div>
                </div>
                <!-- /.container -->
				
            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="<?php echo base_url('Php/about');?>">About Us</a>
                            </li>
							<li><a href="<?php echo base_url('Php/contact');?>">Contact Us</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/about');?>">Terms and Conditions</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/faq');?>">FAQ</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User Section</h4>

                        <ul>
                            <li><a href="<?php echo base_url('Php/login');?>" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/register');?>">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Product</h4>
                        <ul>
                            <li><a href="<?php echo base_url('Php/product');?>">Name Label</a>
							</li>
							<li><a href="<?php echo base_url('Php/product');?>">Shipping Label</a>
							</li>
							<li><a href="<?php echo base_url('Php/product');?>">Product Sticker</a>
							</li>
							<li><a href="<?php echo base_url('Php/product');?>">Round Sticker</a>
							</li>
                            </li>
                        </ul>
						
						<h4>Call Center</h4>
						
						<p><strong>TCREATIVE</strong>
						<br>+62 811 523 105
                        </p>
						
						<a href="<?php echo base_url('Php/contact');?>">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the News</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in Touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2019 TCREATIVE</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstraptemple.com">Bootstrap Temple</a>
                         <!-- Please do not remove the backlink to us unless you have purchased the attribution-free license at https://bootstraptemple.com. It is part of the license conditions. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.cookie.js');?>"></script>
    <script src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-hover-dropdown.js');?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/front.js');?>"></script>


</body>

</html>