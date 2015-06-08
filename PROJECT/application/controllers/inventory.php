<?php  
class Inventory extends CI_Controller{

	public function Inventory() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->model("m_jadwal");
        //$this->header[2] = "active"; //untuk indikasi active header
		$this->id_user = "";

		if (($this->session->userdata('username_apoteker'))=="" || ($this->session->userdata('username_apoteker'))==null) {
		redirect(base_url()."login_apoteker");
		}
		$this->user = $this->session->userdata('username_apoteker');
	
	}

	public function index()
	{
		$data = array("idobat"=>"", "nama_obat"=>"", "kategori"=>" ", "harga"=>" ", "obat_kritis"=>"", "query2"=>null); 

		$this->header[3] = "active"; //untuk indikasi active header

      	$this->load->view('v_header_apoteker');
	    $this->load->view('inventory/v_conten', $data);
		$this->load->view('v_footer');

		// $this->load->database();
		// $this->load->model("m_inventory");

		/*$call = $this->m_inventory->getObat("paramex");
		$ro = $call->row();*/
		//echo $ro->takaran;
		//echo $ro->nama_obat;



	}
	public function index2()
	{
		$data = array("idobat"=>"", "nama_obat"=>"", "kategori"=>" ", "harga"=>" ", "obat_kritis"=>"", "query2"=>null); 

		$this->header[3] = "active"; //untuk indikasi active header

      	$this->load->view('v_header_apoteker');
	    $this->load->view('inventory/v_contenkritis', $data);
		$this->load->view('v_footer');

		// $this->load->database();
		// $this->load->model("m_inventory");

		/*$call = $this->m_inventory->getObat("paramex");
		$ro = $call->row();*/
		//echo $ro->takaran;
		//echo $ro->nama_obat;



	}

	public function testingInv()
	{
		$this->load->library("unit_test");

		$this->unit->run($this->inpValidasi(""),"error=null", "ID pasien kosssonngg");
		$this->unit->run($this->inpValidasi("!@$)"),"error=symbol", "ID pasien dengan simbolll");
		$this->unit->run($this->inpValidasi("p0010"),"true", "ID pasien benarrr");
		//$this->unit->run($this->inCheckdb("p0010"),"true", "uji Id pasien benar");

		echo $this->unit->report();
	}
	
	public function stokkritis()
	{
		$data = array("idobat"=>"", "nama_obat"=>"", "harga"=>" ", "obat_kritis"=>"", "query2"=>null); 

		$this->header[3] = "active"; //untuk indikasi active header

      	$this->load->view('v_header_apoteker');
	    $this->load->view('inventory/v_contenkritis', $data);
		$this->load->view('v_footer');

		// $this->load->database();
		// $this->load->model("m_inventory");

		/*$call = $this->m_inventory->getObat("paramex");
		$ro = $call->row();*/
		//echo $ro->takaran;
		//echo $ro->nama_obat;



	}

	public function validasi()
	{
	 $nama_obat = $this->input->post('nama_obat');
	 $nama_obat2 = $this->inpValidasi($nama_obat);	  

	 	if ($nama_obat2 == "error=null"){
	 	//echo "belum mengisi nama obat";
	 	redirect (base_url().'inventory?error=null');
	  	}
	  	else if ($nama_obat2 == "error=symbol"){
	  		redirect(base_url().'inventory?error=symbol');
	  	}
		   else if ($nama_obat2 == "true"){
	  		$this->tampil($nama_obat);
		  		}

	}
	public function inpValidasi($nama_obat)
	{
		if ($nama_obat == "" || $nama_obat == null){
	 	//echo "belum mengisi nama obat";
	 	//redirect (base_url().'inventory?error=null');
	  	return "error=null";
	  	}
	  	else if (preg_match ('/[^_a-z0-9]/i', $nama_obat)){
	  		return "error=symbol";
	  	}
		   else {
	  		return "true";
		  		}		
	}

	public function tampil($nama_obat)
	{ 
		$this->load->database();

		$nama_obat = $this->input->post('nama_obat');

		$this->load->model("m_inventory");
		$query = $this->m_inventory->getObat($nama_obat);

		$this->header[3] = "active"; //untuk indikasi active header

		// $data = array("idobat"=>$ro->ID_OBAT, "nama_obat"=>$ro->NAMA_OBAT, "kategori"=>$ro->KATEGORI_OBAT, "harga"=>$ro->HARGA, "obat_kritis"=>$ro->OBAT_KRITIS); 
			$data = array('query2'=>$query);
			$this->load->view('v_header_apoteker');
	   		$this->load->view('inventory/v_conten', $data);
			$this->load->view('v_footer');

	}
	public function stok(){
		$this->load->database();
		$this->load->model('m_inventory');
		$data = $this->m_inventory->stokkritis();
		$data2 = array('stokkritis'=>$data);
	}
	public function hitung ($a, $b){
		return $a+$b;
	}
	/*public function getObat($ido){
		$query = $this->db->query('SELECT * FROM `obat_pasien` WHERE `nama_obat`= "'.$nobat.'"');
		$row = $query->row();
		return $row->nama_obat;
	}*/
}
	