<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->helper("form");
        $this->load->database();
        $this->load->model('Hub');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
		$this->load->library('form_validation');
        $this->load->library('pagination');
		$this->load->helper('cookie');
       $this->load->library('cart');
        $params = array('server_key' => 'SB-Mid-server-gzbPIN5T1L5LMH9L52BMAaJG', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
        //$this->output->enable_profiler(TRUE);
    }
    /*Page*/
	public function index()
	{     
		$this->load->view('index.php');
	}
    public function index_login()
	{
          $iuser = $this->input->post('email');
        $this->session->set_userdata('username_login', $iuser);//email
		$this->load->view('index_login.php',$iuser);
	}
    public function register()
	{
		$this->load->view('register.php');
	}
    public function product()
	{
        $data2['arrItem2'] = $this->Hub->ambildatabarang();//untuk barang
		$this->load->view('product.php',$data2);
	}
      public function detail($kode_barang)
	{
         $email = $this->session->userdata('username_login');
      $data['kodeiklan'] = $kode_barang;
		$this->load->view('detail.php',$data);
	}
    public function contact()
	{
		$this->load->view('contact.php');
	}
    public function about()
	{
		$this->load->view('about.php');
	}
    /*Page*/
   
    /*MASTER*/
      public function logmaster()
	{
		$this->load->view('login.php');
	}
      public function inlog()
	{
		$username=$this->input->post('username');
          $password=$this->input->post('password');
          if($username=="adminku"&&$password=="keamanan")
          {
              $this->load->view('master_bahan.php');
          }else
          {
             $this->load->view('login.php');
          }
	}
     public function bahan()
	{
		$this->load->view('master_bahan.php');
	}
     public function pricelist()
	{
		$this->load->view('master_pricelist.php');
	}
     public function barang()
	{
		$this->load->view('master_barang.php');
	}
     public function dpesan()
	{
		$this->load->view('master_dpesan.php');
	}
     public function mgalery()
	{
		$this->load->view('master_galery.php');
	}
    public function mukuran()
	{
		$this->load->view('master_ukuran.php');
	}
     public function mlaminasi()
	{
		$this->load->view('master_laminasi.php');
	}
     public function master_user()
	{
		$this->load->view('master_user.php');
	}
     public function hpesan()
	{
		$this->load->view('master_hpesan.php');
	}
      public function faq()
	{
		$this->load->view('faq.php');
	}
    /*MASTER*/
    public function galery()
	{
		$data2['arrItem2'] = $this->Hub->ambildatagalery();//untuk galery
		$this->load->view('galery.php',$data2);
	}
    /*KERANJANG*/
     public function basket()
	{
		$this->load->view('basket.php');
	}
    /*KERANJANG*/
    /*Check Out*/
     public function checkout1()
	{
         $email = $this->session->userdata('username_login');
       
         if($email!="")
          {
             
            $this->load->view('checkout1.php');
             
          }else
          {
             $this->load->view('register.php'); 
          }  
		
	}
     public function checkout2()
	{
          $email = $this->session->userdata('username_login');
       
         if($email!="")
          {
             
             $this->load->view('checkout2.php');
             
          }else
          {
             $this->load->view('register.php'); 
          }  
	}
     public function checkout3()
	{
          $email = $this->session->userdata('username_login');
       
         if($email!="")
          {
                    $this->form_validation->set_rules('name','name','required');
                    $this->form_validation->set_rules('address','address','required');
                    $this->form_validation->set_rules('phone','phone','required');
                    if($this->form_validation->run()){
                     $nama = $this->input->post('name');
                     $alamat = $this->input->post('address');
                     $telp = $this->input->post('phone');
                  
                    $this->Hub->update_account($nama,$alamat,$telp,$email);
                    }else{
                        $this->load->view('checkout2.php');
                    }
		     $this->load->view('checkout3.php');
             
          }else
          {
             $this->load->view('register.php'); 
          } 
	}
     public function checkout4()
	{
         $email = $this->session->userdata('username_login');
        $delivery= $this->input->post('delivery');
         if($email!="")
          {
               $data=$this->cart->contents();
        foreach($data as $items)
        {
                $data = array(
				'rowid' =>$items['rowid'],
				'delivery'   => $delivery);
				$this->cart->update($data);
        }
             
     
               
		    $this->load->view('checkout4.php');
          }else
          {
             $this->load->view('register.php'); 
          } 
		
	}
    public function checkout5()
	{
         $email = $this->session->userdata('username_login');
        $payment= $this->input->post('payment');
         if($email!="")
          {
               $data=$this->cart->contents();
                foreach($data as $items)
                {
                        $data = array(
                        'rowid' =>$items['rowid'],
                        'payment'   => $payment);
                        $this->cart->update($data);
                }
                 //Membuat kode pesanan
                $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $kodepesan ="";
                $arr = explode(" ", $email); 
             
                if(count($arr) == 1) {		// kalau sama dgn 1 berarti tidak ada spasi 
                    $kodepesan = strtoupper(substr($email, 0 , 2)).$s; 
                }
                else {						// jika  ada spasi 
                    $kodepesan = strtoupper(substr($arr[0], 0 , 1).substr($arr[1],0,1)); 				
                }
                $qry = $this->db->query("select * from h_pesan where kode_pesanan like '".$kodepesan."%'"); 
                $jum = $qry->num_rows() + 1; 
                if($jum < 10) { 
                    $kodepesan = $kodepesan."00".$jum;
                }
                else if($jum < 100) { 
                    $kodepesan= $kodepesan."0".$jum; 
                }
                else {
                    $kodepesan =$kodepesan.$jum; 							
                }
                 //
                     $data=$this->cart->contents();
                 $total=0;
                foreach($data as $items)
                {
                    if($items['status']=='terbuka')
                    { 
                            $kodebarang=$items['id'];
                            $qty=$items['qty'];
                            $name=$items['name'];
                            $image=$items['image'];
                            $price=$items['price'];
                            $total+=$price;
                            $position=$items['position'];
                            $picture=$items['picture'];
                            $input1=$items['input1'];
                            $input2=$items['input2'];
                            $delivery=$items['delivery'];
                            $payment=$items['payment'];
                            $query = $this->db->query("SELECT kode_bahan FROM bahan where nama_bahan ='".$items['paper']."'");
                            $paper="";
                            foreach ($query->result_array() as $row)
                            {
                                    $paper=$row['kode_bahan'];
                            }
                            $query2 = $this->db->query("SELECT kode_laminasi FROM laminasi where nama_laminasi ='".$items['lamination']."'");
                            $lamination="";
                            foreach ($query2->result_array() as $row2)
                            {
                                    $lamination=$row2['kode_laminasi'];
                            }
                            $query3 = $this->db->query("SELECT kode_ukuran FROM ukuran where ukuran ='".$items['size']."'");
                            $size="";
                            foreach ($query3->result_array() as $row3)
                            {
                                    $size=$row3['kode_ukuran'];
                            }

                        $this->Hub->dpesan($kodepesan,$kodebarang,$qty,$name,$image,$price,$paper,$lamination,$size,$position,$picture,$input1,$input2,$delivery,$payment);
                         $this->Hub->addgalery($kodebarang,$size,$image);  
                    }
                }
            $this->Hub->hpesan($kodepesan,$total,$email);
                
                    $tampnama="";
                    $query = $this->db->query("SELECT nama_user FROM user where email_user ='$email'");

                    foreach ($query->result_array() as $row)
                    {
                        $tampnama=$row['nama_user'];
                    }
                    $alamat="";    
                    $query2 = $this->db->query("SELECT alamat_user FROM user where email_user ='$email'");

                    foreach ($query2->result_array() as $row1)
                    {
                    $alamat=$row1['alamat_user'];
                    }
                    $telp="";    
                    $query3 = $this->db->query("SELECT telp_user FROM user where email_user ='$email'");

                    foreach ($query3->result_array() as $row2)
                    {
                    $telp=$row2['telp_user'];
                    }
                    //Mid Trans Checkout
                        $transaction_details = array(
                        'order_id' 			=> $kodepesan/*uniqid()*/,
                        'gross_amount' 	=> $total
                    );

                  $data=$this->cart->contents();
                    foreach($data as $items1)
                    {
                        $items = [
                            array(
                                'id' 				=> $items1['id'],
                                'price' 		=> $items1['price']/$items1['qty'],
                                'quantity' 	=> $items1['qty'],
                                'name' 			=> $items1['name']
                            )
                        ];
                    }
                   // echo '<pre>'; print_r($items); echo '</pre>';
                    // Populate customer's billing address
                    $billing_address = array(
                        'first_name' 		=> $tampnama,
                        'last_name' 		=> "",
                        'address' 			=> $alamat,
                        'city' 					=> "Indonesia",
                        'postal_code' 	=> "",
                        'phone' 				=> $telp,
                        'country_code'	=> 'IDN'
                        );

                    // Populate customer's shipping address
                    $shipping_address = array(
                        'first_name' 	=> $tampnama,
                        'last_name' 	=> "",
                        'address' 		=> $alamat,
                        'city' 				=> "Indonesia",
                        'postal_code' => "",
                        'phone' 			=> $telp,
                        'country_code'=> 'IDN'
                        );

                    // Populate customer's Info
                    $customer_details = array(
                        'first_name' 			=> $tampnama,
                        'last_name' 			=> "",
                        'email' 					=> $email,
                        'phone' 					=> $telp,
                        'billing_address' => $billing_address,
                        'shipping_address'=> $shipping_address
                        );

                    // Data yang akan dikirim untuk request redirect_url.
                    // Uncomment 'credit_card_3d_secure' => true jika transaksi ingin diproses dengan 3DSecure.
                    $transaction_data = array(
                        'payment_type' 			=> 'vtweb', 
                        'vtweb' 						=> array(
                            //'enabled_payments' 	=> ['credit_card'],
                            'credit_card_3d_secure' => true
                        ),
                        'transaction_details'=> $transaction_details,
                        'item_details' 			 => $items,
                        'customer_details' 	 => $customer_details
                    );

                    try
                    {
                        $vtweb_url = $this->veritrans->vtweb_charge($transaction_data);
                        header('Location: ' . $vtweb_url);
                    } 
                    catch (Exception $e) 
                    {
                        echo $e->getMessage();	
                    }
                    foreach($data as $items)
                  {
                        $data = array(
                        'rowid' =>$items['rowid'],
                        'qty'   => 0);
                        $this->cart->update($data);
                  } 
                    //
                $data2['arrItem2'] = $this->Hub->ambildatahjual();//untuk pesanan
                $this->load->view('customer-orders.php',$data2);
          }else
          {
             $this->load->view('register.php'); 
          } 
		
	}
    /*Check Out*/
      public function logout(){
        session_destroy();
        $email=$this->session->userdata('username_login');
        Redirect('http://localhost/tcreative/', false);
      
	}
    //
    public function addwishlist($kodeiklan)
    {
         $email = $this->session->userdata('username_login');
       
         if($email!="")
          {
             
             $query = $this->db->query("SELECT kode_barang FROM wishlist where kode_barang ='$kodeiklan' and email_user='".$email."'");
			$kodebarang="";
			foreach ($query->result_array() as $row)
			{
					$kodebarang=$row['kode_barang'];
			}
             if($kodebarang=="")
             {
               $this->Hub->towishlist($kodeiklan,$email);
               Redirect("http://localhost/tcreative/Php/detail/".$kodeiklan);   
             }
              if($kodebarang!="")
             {
               $this->Hub->deletewishlist($kodeiklan,$email);
               Redirect("http://localhost/tcreative/Php/detail/".$kodeiklan);   
             }
             
             
          }else
          {
             $this->load->view('register.php'); 
          }  
     }
    //register
    public function postRegister(){
         $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('email','password','required|valid_email');
       if($this->form_validation->run()){
        $namauser= $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if($namauser!='admin'||$namauser!="Admin")
        {
            $this->Hub->register($namauser,$email,$password);
            Redirect('http://localhost/tcreative/Php/register', false);

        }
        else
        {
            Redirect("http://localhost/tcreative/Php/register/uri");     
        }
    }else{
         $this->load->view('register');
           echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';
                    
			}
		
	}
    //login
     public function login()
    {
		$data2['arrItem2'] = $this->Hub->ambildatauser();//untuk user
		$data3['email'] = "";
        $tampuser="";
        $iuser = $this->input->post('email');
			$tampuser=$iuser;
			$data3['email'] = $iuser;
			$ipass = $this->input->post('password');
			
			//tampung password untuk cek user ada atau tidak
			$query = $this->db->query("SELECT pass_user FROM user where email_user ='$iuser'");
			$tampassword="";
			foreach ($query->result_array() as $row)
			{
					$tampassword=$row['pass_user'];
			}
			 if($iuser==$iuser && $ipass==$tampassword&&$iuser!=""&&$ipass!=""){
				$email=$this->input->post('email');
                $data3['email'] = $this->input->post('email');
                $this->session->set_userdata('username_login', $iuser);//email
                $this->load->view('customer-account');
				
			}
			else if($iuser==$iuser && $ipass!=$tampassword){
				 echo '<script> alert("Password/ Email Salah"); </script>';
					$this->load->view('register'); 
			}
			//batas tampung
			else
			{
				 echo '<script> alert("Email Tidak Dikenali"); </script>';
					$this->load->view('register'); 
			}
    }
    //
    //MAILER
     public function mailer()
     {
         $subject = $this->input->post('subject');
         $message = $this->input->post('message');
         $name = $this->input->post('name');
         $email = $this->input->post('email');
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'viprohouse@gmail.com',  // Email gmail
            'smtp_pass'   => '322746kk',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@tcreative.com', 'Tcreative');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Terimakasih '.$name.' Telah Menghubungi Kami | Tcreative');

        // Isi email
        $this->email->message("Ini merupakan e-mail balasan otomatis, terimakasih telah menghubungi kami. Kami akan membalas pesan anda segera.<br><br> Salam hangat, Tcreative");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->load->view('contact'); 
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
         //
         // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@tcreative.com', 'Tcreative');

        // Email penerima
        $this->email->to('viprohouse@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Pesan baru dari '.$name.' | Subject: '.$subject.'| Tcreative ');

        // Isi email
        $this->email->message("Pesan Yang Dikirim oleh ".$name." adalah : <br>".$message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
     }
    //MAILER
    //user account
     public function account()
    {
         $email = $this->session->userdata('username_login');
          if($email!="")
          {
             	$this->load->view('customer-account.php'); 
          }else
          {
             $this->load->view('register.php'); 
          }
     }
    public function order($kode_pesanan)
    {
         $email = $this->session->userdata('username_login');
        $data['kodepesanan']=$kode_pesanan;
          if($email!="")
          {
             	$this->load->view('customer-order.php',$data); 
          }else
          {
             $this->load->view('register.php'); 
          }
     }
    public function orders()
    {
         $email = $this->session->userdata('username_login');
         $data2['arrItem2'] = $this->Hub->ambildatahjual();//untuk pesanan
            $pesanan= $this->Hub->ambildatahjual();
          if($email!="")
          {
              
              foreach ($pesanan as $key)
                    {
                         $kodepesanan= $key->kode_pesanan;
                         $kodeuser= $key->email_user;
                        $status_berhasil="";
                        $status_gagal="";
                        $statusakhir="";
                        $value = $this->veritrans->status($kodepesanan);
                        $status_pesanan= array();
                        foreach ($value as $k => $v){
                            array_push($status_pesanan, $v);
                        }
                        $status1=$status_pesanan[14];//berhasil
                        $status2=$status_pesanan[10];//pending
                        $status3=$status_pesanan[11];//gagal
                        $id1=$status_pesanan[9];//berhasil
                        $id2=$status_pesanan[5];//pending
                        $id3=$status_pesanan[6];//gagal
                            if($status1=='settlement'||$status1=='capture')
                            {
                                $status_berhasil='masuk';
                            }
                             if($status2=='settlement'||$status1=='capture')
                            {
                                $status_berhasil='masuk';
                            }
                             if($status3=='settlement'||$status1=='capture')
                            {
                                $status_berhasil='masuk';
                            }
                             if($status1=='deny')
                            {
                                $status_gagal='masuk';
                            }
                             if($status2=='deny')
                            {
                                $status_gagal='masuk';
                            }
                             if($status3=='deny')
                            {
                                $status_gagal='masuk';
                            }
                        if($status_berhasil=='masuk'&&$kodepesanan==$kodepesanan)
                        {
                            $statusakhir="Payment Received";
                           $this->Hub->paymentstatus($kodepesanan,$statusakhir);
                        }
                        
                        if($status_gagal=='masuk'&&$kodepesanan==$kodepesanan)
                        {
                            $statusakhir="Failed";
                             $this->Hub->paymentstatus($kodepesanan,$statusakhir);
                        }
                    }
              
             $this->load->view('customer-orders.php',$data2);
          }else
          {
             $this->load->view('register.php'); 
          }
     }
    public function wishlist()
    {
         $email = $this->session->userdata('username_login');
         $data2['arrItem2'] = $this->Hub->ambildatawishlist();//untuk barang
          if($email!="")
          {
             	$this->load->view('customer-wishlist.php',$data2); 
          }else
          {
             $this->load->view('register.php'); 
          }
     }
     public function update_password()
    {
         $email = $this->session->userdata('username_login');
          if($email!="")
          {
             
                    $this->form_validation->set_rules('password_old','password_old','required');
                    $this->form_validation->set_rules('password_1','password_1','required');
                    $this->form_validation->set_rules('password_2','password_2','required');
                    if($this->form_validation->run()){
                     $password_old = $this->input->post('password_old');
                     $password_1 = $this->input->post('password_1');
                     $password_2 = $this->input->post('password_2');
                    $query = $this->db->query("SELECT pass_user FROM user where email_user ='$email'");
                        $tampassword="";
                        foreach ($query->result_array() as $row)
                        {
                                $tampassword=$row['pass_user'];
                        }
                         if($password_old==$tampassword){
                             $this->Hub->update_password($password_old,$password_1);
                             Redirect('http://localhost/tcreative/Php/account', false);
                        }
                   
                    else
                    {
                        Redirect("http://localhost/tcreative/Php/account/uri");     
                    }
                    }else{
                        $this->load->view('register');
                        echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';

                    }
          }else
          {
             $this->load->view('register.php'); 
          }
     }
     public function update_account()
    {
         $email = $this->session->userdata('username_login');
          if($email!="")
          {
             
                    $this->form_validation->set_rules('name','name','required');
                    $this->form_validation->set_rules('address','address','required');
                    $this->form_validation->set_rules('phone','phone','required');
                    if($this->form_validation->run()){
                     $nama = $this->input->post('name');
                     $alamat = $this->input->post('address');
                     $telp = $this->input->post('phone');
                  
                    $this->Hub->update_account($nama,$alamat,$telp,$email);
                       Redirect("http://localhost/tcreative/Php/account/uri"); 
                    }else{
                        $this->load->view('register');
                        echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';

                    }
          }else
          {
             $this->load->view('register.php'); 
          }
     }
    //
       //CARTPAGE
          public function addtocart($kode_barang)
	{
        $gambar_barang="";
            $query = $this->db->query("SELECT gambar_barang FROM barang where kode_barang ='$kode_barang'");

                    foreach ($query->result_array() as $row)
                    {
                            $gambar_barang=$row['gambar_barang'];
                    }
        $namabarang="";
            $query2 = $this->db->query("SELECT nama_barang FROM barang where kode_barang ='$kode_barang'");

                    foreach ($query2->result_array() as $row2)
                    {
                            $namabarang=$row2['nama_barang'];
                    }
     
              $harga="";
              $query3 = $this->db->query("SELECT harga FROM pricelist where kode_barang ='$kode_barang' and kode_laminasi='LAM002' and kode_ukuran='UKU001' and qty='10'");
                        
                        foreach ($query3->result_array() as $row3)
                        {
                                $harga=$row3['harga'];
                        }
              $jumker=0;
                 $datakeranjang=$this->cart->contents();
                        foreach($datakeranjang as $items)
                        {
                            $jumker+=1;    
                        }
              if($harga!="")//agar tidak mengulang default cart dan menambah kuantitas, maka dilakukan pengecekan
              {
                  if($jumker==0)
                  {
                      $data = array(
                                'id'      => $kode_barang,
                               'qty'     => 10,
                               'name'      => $namabarang,
                               'image'   => $gambar_barang,
                               'price'   => $harga,
                               'paper'    => 'Bontac',
                               'lamination'    => 'Glossy',
                               'size'    => '5CM X 1CM',
                               'position'    => 'left',
                               'picture'    => $gambar_barang,
                               'input1'    => '-',
                               'input2'    => '-',
                               'delivery'    => '',
                               'payment'    => '',
                               'status'=>'terbuka'
                            );
                        $this->cart->insert($data);
                  }else
                    { 
                       $data2=$this->cart->contents();
                        foreach($data2 as $items)
                        {

                                $data2 = array(
                                        'id' =>$kode_barang,
                                        'qty'   => 10);
                                        $this->cart->update($data2); 
                        }
                    
                  }
               
                     /*echo '<pre>'; print_r($data); echo '</pre>';*/
                       $this->load->view('basket');
                 }else
                 {
                    $this->load->view('basket');
                 }
        
	}
         //CODE CART SHOP
          public function addcustom($kode_barang)//custom barang add to cart
	{
        $gambar_barang="";
            $query = $this->db->query("SELECT gambar_barang FROM barang where kode_barang ='$kode_barang'");

                    foreach ($query->result_array() as $row)
                    {
                            $gambar_barang=$row['gambar_barang'];
                    }
        $namabarang="";
            $query2 = $this->db->query("SELECT nama_barang FROM barang where kode_barang ='$kode_barang'");

                    foreach ($query2->result_array() as $row2)
                    {
                            $namabarang=$row2['nama_barang'];
                    }
       //
            $data = array(
                'id'      => $kode_barang,
               'qty'     => 1,
               'name'      => $namabarang,
               'image'   => $gambar_barang,
               'price'   => 0,
               'paper'    => '',
               'lamination'    => '',
               'size'    => '',
               'position'    => '',
               'picture'    => '',
               'input1'    => '',
               'input2'    => '',
                'delivery'    => '',
               'payment'    => '',
                'status'=>'tertutup'
            );

$this->cart->insert($data);
              $databarang['kode'] = $data['id'];
		$this->load->view('custom_kertas',$databarang);     
        
	}
     /*Kustom Stiker, halaman custom kertas,laminasi,size,sticker*/
    public function kertas($koderow="")
	{
		 $koderow= $this->uri->segment(3);
		$databarang['kode'] =$koderow;
		$this->load->view('custom_kertas',$databarang);
	}
    public function laminasi($koderow="")
	{
		 $koderow= $this->uri->segment(3);
		$databarang['kode'] =$koderow;
		$this->load->view('custom_laminasi',$databarang);
	}
    public function size($koderow="")
	{
		 $koderow= $this->uri->segment(3);
		$databarang['kode'] =$koderow;
		$this->load->view('custom_size',$databarang);
	}
    public function stiker($koderow="")
	{
        $koderow= $this->uri->segment(3);
		$databarang['kode'] =$koderow;
		$this->load->view('custom_stiker',$databarang);
	}
    /*Kustom Stiker*/
     public function customkertas($koderow="",$kertas="")
	{  
         $kertas= $this->uri->segment(3);
         $koderow= $this->uri->segment(4);
     
          
        $data = array(
				'rowid' =>$koderow,
				'paper'   => $kertas);
				$this->cart->update($data);
         $databarang['kode'] =$koderow;
		$this->load->view('custom_laminasi',$databarang);     

	}
     public function customlaminasi($koderow="",$laminasi="")
	{  
         $laminasi= $this->uri->segment(3);
         $koderow= $this->uri->segment(4);
     
          
        $data = array(
				'rowid' =>$koderow,
				'lamination'   => $laminasi);
				$this->cart->update($data);
         $databarang['kode'] =$koderow;
		$this->load->view('custom_size',$databarang);     

	}
     public function customsize($koderow="",$size="")
	{  
         $size= $this->uri->segment(3);
         $koderow= $this->uri->segment(4);
     $url = str_replace("%20", " ", $size);
        $data = array(
				'rowid' =>$koderow,
				'size'   => $url);
				$this->cart->update($data);
         $databarang['kode'] =$koderow;
		$this->load->view('custom_size',$databarang); 

	}
     public function customqty($koderow="",$qty="")
	{  
         $qty= $this->uri->segment(3);
         $koderow= $this->uri->segment(4);
        $data = array(
				'rowid' =>$koderow,
				'qty'   => $qty);
				$this->cart->update($data);
         $databarang['kode'] =$koderow;
		$this->load->view('custom_size',$databarang); 

	}
      public function customstiker($koderow="")
	{  
         $koderow= $this->uri->segment(3);
          echo $koderow;
        $data = array(
				'rowid' =>$koderow,
				'qty'   => $qty);
				$this->cart->update($data);
         $databarang['kode'] =$koderow;
		$this->load->view('custom_stiker',$databarang);

	}
    public function upload($kode)
    {
         //
        $userfile= $this->input->post('userfile');
        $this->load->library('upload');

        $configku['upload_path']          = './assets/admin_data/galery';
        $configku['allowed_types']        = 'jpg|png';
        $configku['max_size']             = 0;
        $configku['max_width']            = 0;
        $configku['max_height']           = 0;
        $configku['file_name']			= $userfile;
        $configku['maintain_ratio'] = TRUE;
        $configku['width'] = 100;
        $configku['height'] = 100;
        $this->load->library('image_lib', $configku);
        $this->image_lib->resize(); 
        $this->upload->initialize($configku);
        $this->upload->overwrite = true;
         
        if (!$this->upload->do_upload('userfile'))
        {
           echo '<script> alert("Pastikan Mengisi Data Dengan Benar : Pastikan anda memberi gambar pada iklan. "); </script>';
         $this->load->view('custom_stiker.php');
        }
          if($this->upload->do_upload('userfile'))
        {
            $data = array('upload_data' => $this->upload->data());
            $all = $this->upload->data();
            $file_name = $all['file_name'];
              $databarang['kode'] =$kode;

        }
        $position = $this->input->post('radio');
        $input1 = $this->input->post('name1');
        $input2 = $this->input->post('name2');
        $data = array(
				'rowid' =>$kode,
				'position'   => $position,
                'input1'   => $input1,
                'input2'   => $input2,);
				$this->cart->update($data);
         $data=$this->cart->contents();
         $kode_laminasi="";
         $kode_ukuran="";
         $kode_barang="";
         $qty_barang="";
         $harga="";
        foreach($data as $items)
        {
            if($items['rowid']==$kode){
                $kode_barang=$items['id'];
                $qty_barang=$items['qty'];
                 $query = $this->db->query("SELECT kode_laminasi FROM laminasi where nama_laminasi ='".$items['lamination']."'");
                       
                        foreach ($query->result_array() as $row)
                        {
                                $kode_laminasi=$row['kode_laminasi'];
                        }
                 $query2 = $this->db->query("SELECT kode_ukuran FROM ukuran where ukuran ='".$items['size']."'");
                        
                        foreach ($query2->result_array() as $row2)
                        {
                                $kode_ukuran=$row2['kode_ukuran'];
                        }
                
            }
        }
          $query3 = $this->db->query("SELECT harga FROM pricelist where kode_barang ='$kode_barang' and kode_laminasi='$kode_laminasi' and kode_ukuran='$kode_ukuran' and qty='$qty_barang'");
                        
                        foreach ($query3->result_array() as $row3)
                        {
                                $harga=$row3['harga'];
                        }
   
    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
    $file_name = $upload_data['file_name'];
    
        if($harga!="")
         {
                 $data = array(
				'rowid' =>$kode,
				'price'   => $harga,
                'image'   => $file_name,
                'status'   => 'terbuka');
				$this->cart->update($data);
              $this->load->view('basket');
         }else
         {
              $this->load->view('basket');
             $data = array(
				'rowid' =>$kode,
				'qty'   => 0);
				$this->cart->update($data);
               // unlink(FCPATH."assets/admin_data/galery/".$kode.".jpg");
                //unlink(FCPATH."assets/admin_data/galery/".$kode.".png");
         }
    }
    public function updatebasket()
	{
        $data=$this->cart->contents();
      foreach($data as $items)
                  {
                        $data = array(
                        'rowid' =>$items['rowid'],
                        'qty'   => 0);
                        $this->cart->update($data);
                  } 
        header("Location:".base_url('Php/basket'));
    }
                    //
    public function deletebasket($rowid)
	{
        
		$data = array(
				'rowid' =>$rowid,
				'qty'   => 0);
				$this->cart->update($data);
        unlink(FCPATH."assets/admin_data/galery/".$rowid.".jpg");
        unlink(FCPATH."assets/admin_data/galery/".$rowid.".png");
		header("Location:".base_url('Php/basket'));
	}
    //CARTPAGE
 public function lihat()
	{
        $data=$this->cart->contents();
     echo '<pre>'; print_r($data); echo '</pre>';
        foreach($data as $items)
        {
            echo "Nama :".$items['id'];
            echo "<br>";
            echo "QTY :".$items['qty'];
            echo "<br>";
            echo "Harga :".$items['name'];
            echo "<br>";
             echo "Paper :".$items['paper'];
            echo "<br>";
             echo "Lamination :".$items['lamination'];
            echo "<br>";
             echo "Size :".$items['rowid'];
            echo "<br>";
        }
    }
    //MIDTRANS
    public function midtrans()
    {
        $this->load->view('checkout_vtweb.php');
      
    }
    public function notif()
    {
        $this->load->view('transaction.php');
    }
    public function notif2()
    {
       $value = $this->veritrans->status('TH002');
        $ranking = array();
        foreach ($value as $k => $v){
            array_push($ranking, $v);
        }
        echo "STATUS SETTLE: ".$ranking[14]."  <br>"; // Result 'Hello'
        echo "STATUS GAGAL: ".$ranking[11]."  <br>"; // Result 'Hello'
        echo "STATUS PENDING: ".$ranking[10]."  <br>"; // Result 'Hello'
        echo "KODE PESANAN Gagal: ".$ranking[6]."  <br>"; // Result 'Kode Pesanan Gagal'
        echo "KODE PESANAN SETTLE: ".$ranking[9]."  <br>"; // Result 'Kode Pesanan Berhasil'
        echo "KODE PESANAN Pending: ".$ranking[5]."  <br>"; // Result 'Kode Pesanan Berhasil'
        var_dump($value);
    }
    
}
