<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hub extends CI_Model {
	
	public $teks = "contoh text";

	public function __construct(){
		parent::__construct();
		$this->teks = "Diubah dari constructor";
		$this->load->database();
	}
       public function register($namauser,$email,$password){
      
		$query1 = "SELECT * FROM user";
		$sql = $this->db->query($query1);
		$data = ['nama_user'=> $namauser,'email_user'=>$email,'pass_user'=>$password];
		$query = $this->db->insert('user',$data);
	}
    public function towishlist($kodeiklan,$email){
      
		$query1 = "SELECT * FROM wishlist";
		$sql = $this->db->query($query1);
		$data = ['email_user'=> $email,'kode_barang'=>$kodeiklan,'status_delete'=>"0"];
		$query = $this->db->insert('wishlist',$data);
	}
     public function deletewishlist($kodeiklan,$email){
      
		$this->db->where('kode_barang', $kodeiklan);
         $this->db->where('email_user', $email);
      $this->db->delete('wishlist');
	}
    public function ambildatauser(){
		$query1 = $this->db->get('user');
		$hasil1 = $query1->result();
		return $hasil1;
	}
    public function ambildatabarang(){
		$query1 = $this->db->get('barang order by RAND()');
		$hasil1 = $query1->result();
		return $hasil1;
	}
    public function ambildatagalery(){
		$query1 = $this->db->get('template_galery');
		$hasil1 = $query1->result();
		return $hasil1;
	}
     public function ambildatahjual(){
		$query1 = $this->db->get('h_pesan');
		$hasil1 = $query1->result();
		return $hasil1;
	}
     public function ambildatadjual(){
		$query1 = $this->db->get('d_pesan');
		$hasil1 = $query1->result();
		return $hasil1;
	}
     public function ambildatawishlist(){
		$query1 = $this->db->get('wishlist');
		$hasil1 = $query1->result();
		return $hasil1;
	}
    
    public function update_password($password_old,$password_1)
    {
        $this->db->where('pass_user',$password_old);
            $data=['pass_user'=>$password_1];
            $this->db->update('user',$data);
    }
    public function paymentstatus($kodepesanan,$statusakhir)
    {
        $this->db->where('kode_pesanan',$kodepesanan);
            $data=['status'=>$statusakhir];
            $this->db->update('h_pesan',$data);
    }
	  public function update_account($nama,$alamat,$telp,$email)
    {
        $this->db->where('email_user',$email);
            $data=['nama_user'=>$nama,'alamat_user'=>$alamat,'telp_user'=>$telp];
            $this->db->update('user',$data);
    }
     public function addgalery($kodebarang,$size,$image)
    {
          $query1 = "SELECT * FROM template_galery";
		$sql = $this->db->query($query1);
		$data = ['kode_barang'=>$kodebarang,'kode_ukuran'=>$size,'gambar'=>$image];
		$query = $this->db->insert('template_galery',$data);
    }
      public function hpesan($kodepesan,$total,$email)
    {
           $tanggal_pemesanan = date('d/m/Y H:i');
          $query1 = "SELECT * FROM h_pesan";
		$sql = $this->db->query($query1);
		$data = ['kode_pesanan'=> $kodepesan,'tanggal_pesanan'=>$tanggal_pemesanan,'email_user'=>$email,'total'=>$total,'status'=>'On hold'];
		$query = $this->db->insert('h_pesan',$data);
    }
      public function dpesan($kodepesan,$kodebarang,$qty,$name,$image,$price,$paper,$lamination,$size,$position,$picture,$input1,$input2,$delivery,$payment)
    {
          
       
         $query1 = "SELECT * FROM d_pesan";
		$sql = $this->db->query($query1);
		$data = ['kode_pesanan'=> $kodepesan,'kode_barang'=>$kodebarang,'kode_bahan'=>$paper,'kode_laminasi'=>$lamination,'kode_ukuran'=>$size,'jumlah_barang'=>$qty,'harga_barang'=>$price,'subtotal'=>$price,'gambar'=>$image,'posisi_gambar'=>$position,'text_line1'=>$input1,'text_line2'=>$input2];
		$query = $this->db->insert('d_pesan',$data);
    }
}
