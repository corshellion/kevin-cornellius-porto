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
    <link href="<?php echo base_url('assets/') ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo base_url('assets/') ?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url('assets/') ?>css/custom.css" rel="stylesheet">

    <script src="<?php echo base_url('assets/') ?>js/respond.min.js"></script>

    <link rel="shortcut icon" href="<?php echo base_url('assets/') ?>img/icon.png">



</head>

<body>
    <?php $email = $this->session->userdata('username_login');?>
      <?php 
                
        $query = $this->db->query("SELECT gambar_barang FROM barang where kode_barang ='$kodeiklan'");
                $gambar_barang="";
                foreach ($query->result_array() as $row)
                {
                        $gambar_barang=$row['gambar_barang'];
                }
         $query2 = $this->db->query("SELECT gambar_barang2 FROM barang where kode_barang ='$kodeiklan'");
                $gambar_barang2="";
                foreach ($query2->result_array() as $row2)
                {
                        $gambar_barang2=$row2['gambar_barang2'];
                } 
         $query3 = $this->db->query("SELECT gambar_barang3 FROM barang where kode_barang ='$kodeiklan'");
                $gambar_barang3="";
                foreach ($query3->result_array() as $row3)
                {
                        $gambar_barang3=$row3['gambar_barang3'];
                }
        $query4 = $this->db->query("SELECT nama_barang FROM barang where kode_barang ='$kodeiklan'");
                $namabarang="";
                foreach ($query4->result_array() as $row4)
                {
                        $namabarang=$row4['nama_barang'];
                }
         $query5 = $this->db->query("SELECT kode_barang FROM wishlist where kode_barang ='$kodeiklan' and email_user='".$email."'");
			$kodebarang="";
			foreach ($query5->result_array() as $row5)
			{
					$kodebarang=$row5['kode_barang'];
			}
        $query6 = $this->db->query("SELECT deskripsi FROM barang where kode_barang ='$kodeiklan'");
                $deskripsi="";
                foreach ($query6->result_array() as $row6)
                {
                        $deskripsi=$row6['deskripsi'];
                }
             
    ?>
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
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

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

                <a class="navbar-brand home" href="<?php echo base_url()?>" data-animate-hover="bounce">
                    <img src="<?php echo base_url('assets/img/LogoTcreativeCrop.png')?>" height="60px" alt="TCREATIVE logo" class="hidden-xs">
                    <img src="<?php echo base_url('assets/img/logo-small.png')?>" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
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
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">   <?php echo $keranjang;?> items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo base_url('')?>">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="<?php echo base_url('Php/product')?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Product </a>
					</li>

                    <li class="dropdown yamm-fw">
                        <a href="<?php echo base_url('Php/galery')?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Galery </a>
                    </li>

					<li class="dropdown yamm-fw">
                        <a href="<?php echo base_url('Php/contact')?>" class="dropdown-toggle" data-hover="dropdown" data-delay="200">Contact Us</a>
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

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('')?>">Home</a>
                        </li>
                        <li><a href="<?php echo base_url('Php/product')?>">Product</a>
                        </li>
                        <li>Name Label</li>
                    </ul>

                </div>

                <div class="col-md-3">
                      <!-- Memakai bahasa Php murni-->
                        <?php  
                                include "conn.php";
	
                                $select_barang = "SELECT * FROM barang order by RAND()";

                                $query_barang = mysqli_query($conn, $select_barang);
                                $query_barang2 = mysqli_query($conn, $select_barang);
                                $query_barang3 = mysqli_query($conn, $select_barang);
                                if (!$query_barang) {
                                    die ('SQL Error: ' . mysqli_error($conn));
                                }
                        
                        
                        
                        ?>
                    <!-- *** MENUS AND FILTERS ***

 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                           <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <?php $count=0;?>
                                    <?php while ($row = mysqli_fetch_array($query_barang)) {?>  
                                        <?php $count+=1;?>
                                       <?php } ?>
                                    <a href="<?php echo base_url('Php/product')?>">Products <span class="badge pull-right"><?php echo $count;?></span></a>
                                    <ul>
                                        
                                         <?php while ($row2 = mysqli_fetch_array($query_barang2)) {?> 
                                        
                                        <li><a href="<?=base_url()."Php/detail/".$row2['kode_barang']?>"><?php echo $row2['nama_barang'] ?></a>
										</li>
                                        
                                         <?php } ?>
										
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?php echo base_url().'assets/images/'.$gambar_barang ?>" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $namabarang ?></h1>
								<br>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="text-center buttons">
                                    <a href="<?php echo base_url('Php/addcustom/'.$kodeiklan);?>" class="btn btn-primary">Custom</a> 
                                    <?php if($kodebarang==""){?>
                                        <a href="<?php echo base_url('Php/addwishlist/'.$kodeiklan);?>" class="btn btn-default" ><i class="fa fa-heart"></i> Add to wishlist</a>
                                    <?php } ?>
                                    <?php if($kodebarang!="") {?>
                                        <a href="<?php echo base_url('Php/addwishlist/'.$kodeiklan);?>" class="btn btn-default" style="background-color:grey;"><i class="fa fa-heart" style="color:red;"></i> Add to wishlist</a>
                                    <?php } ?>
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url().'assets/images/'.$gambar_barang ?>" class="thumb">
                                        <img src="<?php echo base_url().'assets/images/'.$gambar_barang ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url().'assets/images/'.$gambar_barang2 ?>" class="thumb">
                                        <img src="<?php echo base_url().'assets/images/'.$gambar_barang2 ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url().'assets/images/'.$gambar_barang3 ?>" class="thumb">
                                        <img src="<?php echo base_url().'assets/images/'.$gambar_barang3 ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p><?php echo $deskripsi ?></p>
                            <h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Other Products</h3>
                            </div>
                        </div>
                      
                        <?php $count=0;?>
                           <?php while ($row = mysqli_fetch_array($query_barang3)) {?>         
                                <?php $count+=1;?>
                                <?php if($count<=3) {?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height">
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front">
                                                    <a href="<?=base_url()."Php/detail/".$row['kode_barang']?>">
                                                        <img src="<?php echo base_url().'assets/images/'.$row['gambar_barang'] ?>" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back">
                                                    <a href="<?=base_url()."Php/detail/".$row['kode_barang']?>">
                                                        <img src="<?php echo base_url().'assets/images/'.$row['gambar_barang'] ?>" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="detail.html" class="invisible">
                                            <img src="<?php echo base_url().'assets/images/'.$row['gambar_barang'] ?>" alt="" class="img-responsive">
                                        </a>
                                        <div class="text">
                                            <h3><?php echo $row['nama_barang'] ?></h3>
                                        </div>
                                    </div>
                            <!-- /.product -->
                            </div>
                          <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="<?php echo base_url('Php/about')?>">About Us</a>
                            </li>
							<li><a href="<?php echo base_url('Php/contact')?>">Contact Us</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/about')?>">Terms and Conditions</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/faq')?>">FAQ</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User Section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="<?php echo base_url('Php/register')?>">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Product</h4>
                        <ul>
                            <li><a href="<?php echo base_url('Php/product')?>">Name Label</a>
							</li>
							<li><a href="<?php echo base_url('Php/product')?>">Shipping Label</a>
							</li>
							<li><a href="<?php echo base_url('Php/product')?>">Product Sticker</a>
							</li>
							<li><a href="<?php echo base_url('Php/product')?>">Round Sticker</a>
							</li>
                        </ul>
						
						<h4>Call Center</h4>
						
						<p><strong>TCREATIVE</strong>
						<br>+62 811 523 105
                        </p>
						
						<a href="<?php echo base_url('Php/contact')?>">Go to contact page</a>

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
    <script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.cookie.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-hover-dropdown.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/front.js') ?>"></script>






</body>

</html>