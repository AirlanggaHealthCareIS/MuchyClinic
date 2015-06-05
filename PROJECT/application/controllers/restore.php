<?php 

/**
* 
*/
class Restore extends CI_Controller
{
	
	public function index(){
		$data['error'] = '';
		$this->load->view('B&R/restore', $data);	
	}
	
	function prosesrestore(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'sql|txt|zip|gzip';
		$config['max_size'] = 0;
		$config['overwrite'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('resfile')){
			$this->upload->display_errors('<div class="alert alert-error">', '</div>');
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('restore_form', $error);
		}else{
			$datafile = $this->upload->data();
			$namafile = $datafile['file_name'];
			$direktori = "./upload/".$namafile;
			$isi_file=file_get_contents($direktori);
			$string_query=rtrim($isi_file, "\n;" );
			$array_query=explode(";", $string_query);
			$tables = $this->db->list_tables();
			foreach($tables as $table){
				$this->db->truncate($table);
			}
			foreach($array_query as $query)
			{
				$this->db->query($query);
			}
			$this->session->set_flashdata('pesan','<div class="alert alert-success"><b>Sukses!</b> Restore Database telah selesai dan berhasil.</div>');
			redirect('hddman/restore');
		}
	}
	
}
