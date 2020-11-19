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
<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/animate.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/owl.carousel.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/owl.theme.css') ?>" rel="stylesheet">

<!-- theme stylesheet -->
<link href="<?php echo base_url('assets/css/style.default.css') ?>" rel="stylesheet" id="theme-stylesheet">

<!-- your stylesheet with modifications -->
<link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>

<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>">

<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
	<div class="container">
		<div class="col-md-6 offer" data-animate="fadeInDown">
			<a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
		</div>
		<div class="col-md-6" data-animate="fadeInDown">
		<ul class="menu">
				<li><a href="<?php echo base_url('Php/login');?>" data-toggle="modal" data-target="#login-modal">Login</a>
				</li>
				<li><a href="<?php echo base_url('Php/register');?>">Register</a>
				</li>
			</ul>
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
							<input type="text" class="form-control" id="email-modal" placeholder="email" name="email">
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

		<a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
				<img src="<?php echo base_url('assets/img/LogoTcreativeCrop.png');?>" height="60px" alt="TCREATIVE logo" class="hidden-xs">
				<img src="<?php echo base_url('assets/img/logo-small.png');?>" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
			</a>
		</div>
	</div>
	<!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->

<?php 
	echo "<font face="."'Century Gothic'"."><center>";
	
	echo "<a href="."'barang'"."><button>Master Barang</button></a> ";
    echo "<a href="."'pricelist'"."><button>Master Price list</button></a> ";
	echo "<a href="."'bahan'"."><button>Master Bahan</button></a> ";
	echo "<a href="."'mukuran'"."><button>Master Ukuran</button></a> ";
	echo "<a href="."'mlaminasi'"."><button>Master Laminasi</button></a> ";
	echo "<a href="."'master_user'"."><button>Master User</button></a> ";
	echo "<a href="."'mgalery'"."><button>Master Gallery</button></a> ";
	echo "<a href="."'dpesan'"."><button>Master DPesan</button></a> ";
	echo "<a href="."'hpesan'"."><button>Master HPesan</button></a>";
	
	echo "<h1>MASTER BARANG</h1>";
	
	include "conn.php";
	
	$select_barang = "SELECT * FROM barang";
	$select_bahan = "SELECT * FROM bahan";
	$select_laminasi = "SELECT * FROM laminasi";
	$select_ukuran = "SELECT * FROM ukuran";

	$query_barang = mysqli_query($conn, $select_barang);

	if (!$query_barang) {
		die ('SQL Error: ' . mysqli_error($conn));
	}
	
	$query_bahan = mysqli_query($conn, $select_bahan);

	if (!$query_bahan) {
		die ('SQL Error: ' . mysqli_error($conn));
	}
	
	$query_laminasi = mysqli_query($conn, $select_laminasi);

	if (!$query_laminasi) {
		die ('SQL Error: ' . mysqli_error($conn));
	}
	
	$query_ukuran = mysqli_query($conn, $select_ukuran);

	if (!$query_ukuran) {
		die ('SQL Error: ' . mysqli_error($conn));
	}
	
	echo "<table border=1 width=800>
			<thead>
			<tr>
				<th><center>Kode Barang</th>
				<th><center>Nama Barang</th>
				<th><center>Gambar 1</th>
                <th><center>Gambar 2</th>
                <th><center>Gambar 3</th>
                <th><center>Status Delete</th>
			</tr>
			</thead>
			</tbody>";
			
	//<td>"."<img src='".$row['gambar_barang']."'></td>
	while ($row = mysqli_fetch_array($query_barang))
	{
		echo "<tr>
				<td><center>".$row['kode_barang']."</td>
				<td><center>".$row['nama_barang']."</td>
				<td><center><img src="."http://localhost/tcreative/assets/images/".$row['gambar_barang']." width='150'></td>
                <td><center><img src="."http://localhost/tcreative/assets/images/".$row['gambar_barang2']." width='150'></td>
                <td><center><img src="."http://localhost/tcreative/assets/images/".$row['gambar_barang3']." width='150'></td>
                 <td><center>".$row['status_delete']."</td>  
				
			</tr>";
	}
	echo "	</tbody>
		</table><br>";
	echo "</font>";
		
	mysqli_free_result($query_barang);
	
	mysqli_close($conn);
	
	echo "<pre>";
	echo "<font face="."'Century Gothic'"." size="."3".">";
	echo "<form action="."barang"." method="."post".">";
	
	echo "<br>Kode Barang		: ";
	echo "<input type="."text"." name="."kode_barang"." style="."width:300px".">";
	
	echo "<br>Nama Barang	: ";
	echo "<input type="."text"." name="."nama_barang"." style="."width:300px".">";
	
	
	echo "</select>";
	
	echo "<br>Gambar			: ";
	echo "<input type="."file"." name="."gambar_barang"." id="."gambar_barang".">";
    
	echo "<br><br><input type="."submit"." value="."INSERT"." name="."insert"."> ";
    echo "<input type="."submit"." value="."UPDATE"." name="."update"."> ";
    echo "<input type="."submit"." value="."DELETE"." name="."delete".">";
	
	echo "</form></pre>";
	echo "</font>";
	
//----------INSERT----------
	include "conn.php";
	
	if(isset($_POST["insert"])){
		// menyimpan data kedalam variabel
		$kode_barang     = $_POST['kode_barang'];
		$nama_barang     = $_POST['nama_barang'];
		$gambar_barang   = $_POST['gambar_barang'];
		$userfile  = $_POST['gambar_barang'];
		$insert_barang = "INSERT INTO barang VALUES ('$kode_barang','$nama_barang','$gambar_barang','$gambar_barang','$gambar_barang','-','0')";
		
		$query_insert  = mysqli_query($conn, $insert_barang);
		if (!$query_insert) {
			die ('SQL Error: ' . mysqli_error($conn));
		}
         
		header("location:http://localhost/tcreative/Php/barang");
    
	}
	mysqli_close($conn);
//--------------------------

//----------UPDATE----------
	include "conn.php";
	
	if(isset($_POST["update"])){
		// menyimpan data kedalam variabel
		$kode_barang     = $_POST['kode_barang'];
		$nama_barang     = $_POST['nama_barang'];
		$gambar_barang   = $_POST['gambar_barang'];
		
		$update_barang = "UPDATE barang SET kode_barang='$kode_barang',nama_barang='$nama_barang',gambar_barang='$gambar_barang' where kode_barang='$kode_barang'";
		
		$query_update  = mysqli_query($conn, $update_barang);
		if (!$query_update) {
			die ('SQL Error: ' . mysqli_error($conn));
		}
		header("location:http://localhost/tcreative/Php/barang");
	}
	mysqli_close($conn);
//--------------------------

//----------DELETE----------
	include "conn.php";
	
	if(isset($_POST["delete"])){
		// menyimpan data kedalam variabel
		$kode_barang     = $_POST['kode_barang'];
		
		$delete_barang="DELETE from barang where kode_barang='$kode_barang'";
		
		$query_delete  = mysqli_query($conn, $delete_barang);
		if (!$query_delete) {
			die ('SQL Error: ' . mysqli_error($conn));
		}
		header("location:http://localhost/tcreative/Php/barang");
	}
	mysqli_close($conn);
	echo "</center>";
//--------------------------
?>

<!-- *** FOOTER ***
_________________________________________________________ -->
	<div id="footer" data-animate="fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<h4>Pages</h4>

					<ul>
						<li><a href="aboutus.html">About Us</a>
						</li>
						<li><a href="contact.html">Contact Us</a>
						</li>
						<li><a href="text.html">Terms and Conditions</a>
						</li>
						<li><a href="faq.html">FAQ</a>
						</li>
					</ul>

					<hr>

					<h4>User Section</h4>

					<ul>
						<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
						</li>
						<li><a href="register.html">Regiter</a>
						</li>
					</ul>

					<hr class="hidden-md hidden-lg hidden-sm">

				</div>
				<!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<h4>Product</h4>
					<ul>
						<li><a href="product.html">Name Label</a>
						</li>
						<li><a href="product.html">Shipping Label</a>
						</li>
						<li><a href="product.html">Product Sticker</a>
						</li>
						<li><a href="product.html">Round Sticker</a>
						</li>
						</li>
					</ul>
					
					<h4>Call Center</h4>
					
					<p><strong>TCREATIVE</strong>
					<br>+62 811 523 105
					</p>
					
					<a href="contact.html">Go to contact page</a>

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