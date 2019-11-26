<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DepartamentoModel extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    public function getDepartamentos(){
        
        $this->db->order_by('idDepartamento','asc');
        $datos = $this->db->get('departamento');
        return $datos->result_array();

    }
    public function getSalas(){
        $this->db->order_by('idSala','asc');
        $datos = $this->db->get('sala');
        return $datos->result_array();
    }
    public function getDependencias(){
        $this->db->order_by('idDependencia','asc');
        $datos = $this->db->get('dependencia');
        return $datos->result_array();
    }
    public function getEventos(){
        $this->db->order_by('idEvento','asc');
        $datos = $this->db->get('evento');
        return $datos->result_array();
    }
    public function getEdificio($idEdificio){
        $this->db->where('idEdificio',$idEdificio);
        $datos = $this->db->get_where('edificio');
        return $datos->result_array();
    }
    public function get_sala_by_id($idSala){
        $this->db->where('idSala',$idSala);
        $datos = $this->db->get_where('sala');
        return $datos->result_array();
    }
    public function get_dependencia_by_id($idDependencia){
        $this->db->where('idDependencia',$idDependencia);
        $datos = $this->db->get_where('dependencia');
        return $datos->result_array();
    }
    public function insert($nombre){
        $data = array(
            'Nom' => $nombre,
        );
        return $this->db->insert('departamento', $data);
    }
    public function solicitudes_by_rfc($rfc){
        $this->db->where('RFC',$rfc);
        $datos = $this->db->get_where('solicitud');
        return $datos->result_array();
    }
    public function usuario_by_correo($correo){
        $this->db->where('Correo',$correo);
        $datos = $this->db->get_where('personal');
        return $datos->result_array();
    }
}

?>