$configku['upload_path']          = './assets/user_image';
        $configku['allowed_types']        = 'jpg|png|mp4';
        $configku['max_size']             = 0;
        $configku['max_width']            = 0;
        $configku['max_height']           = 0;
		$configku['file_name']			= $nama;
		$this->upload->initialize($configku);
        if (!$this->upload->do_upload('userfile'))
        {
            $error=array('error'=>$this->upload->display_errors());
            $this->load->view('edit_profile',$error);
            echo "Masuk";
        }
        if($this->upload->do_upload('userfile'))
        {
            $data = array('upload_data' => $this->upload->data());
			$all = $this->upload->data();
			$file_name = $all['file_name'];
          
        }
		else {
          echo"Masuk 2";
        //$this->Hub->update($nama,$subjudul,$email,$password,$telepon,$alamat,$website,$deskripsi,$instagram,$facebook,$twitter,$linkedin);
		}*/