<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartamentoController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('DepartamentoModel');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['departamentos'] = $this->DepartamentoModel->getDepartamentos();
		$this->load->view('departamento/lista', $data);
	}
	public function insertDepartamento(){
		$this->load->helper('form');
		$this->load->view('departamento/insert');
	}

	public function guardar(){	
		$nombre = $this->input->post('departamento');
		$this->DepartamentoModel->insert($nombre);
		redirect('departamentos');
	}

	
	
	
}
