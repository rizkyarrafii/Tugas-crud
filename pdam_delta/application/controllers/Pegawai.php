<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('PegawaiModel');
      }
	
	public function index()
	{

        // Fetch data from the model
        $data['pegawai'] = $this->PegawaiModel->get_data();
        //var_dump($data);
		$this->load->view('pegawai_view',$data);
	}

    public function add(){
        $this->load->view('add');
        // echo "tambah";
    }
}
