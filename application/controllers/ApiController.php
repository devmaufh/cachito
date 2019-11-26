<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

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

	public function departamentos(){	
        $data['departamentos'] = $this->DepartamentoModel->getDepartamentos();
       
        echo json_encode($data);
    }
    public function dependencias(){	
        $data['dependencias'] = $this->DepartamentoModel->getDependencias();
       
        echo json_encode($data);
    }
    public function eventos(){	
        $data['eventos'] = $this->DepartamentoModel->getEventos();
       
        echo json_encode($data);
    }
    public function salas(){	
        $data['salas'] = $this->DepartamentoModel->getSalas();
        foreach ($data['salas'] as $key => $value) {
            $data['salas'][$key]['edificio'] = $this->DepartamentoModel->getEdificio($value['idEdificio']);
            unset($data['salas'][$key]['idEdificio']);
        }
        echo json_encode($data);
    }
    
    public function solicitudes($rfc){
        $data['solicitudes'] = $this->DepartamentoModel->solicitudes_by_rfc($rfc);
        foreach ($data['solicitudes'] as $key => $value) {
            $data['solicitudes'][$key]['sala'] = $this->DepartamentoModel->get_sala_by_id($value['idSala'])[0];
            unset($data['solicitudes'][$key]['idSala']);

            $data['solicitudes'][$key]['dependencia'] = $this->DepartamentoModel->get_dependencia_by_id($value['idDependencia'])[0];
            unset($data['solicitudes'][$key]['idDependencia']);
        }
        echo json_encode($data);
    }

    public function login(){
        $datos = $this->DepartamentoModel->usuario_by_correo($_POST['Correo']);
        if(!isset($datos[0]['RFC'])){
            $datos = array(
                'status' => false,
                'msg' =>'Login fallido'
            );
        }else{
            if($datos[0]['Contrasena'] != $_POST['Contrasena']){
                $datos = array(
                    'status' => false,
                    'msg' =>'Login fallido'
                );            
            }
        }
        echo json_encode($datos[0]);

	}
	
	
}
