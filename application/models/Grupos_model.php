<?php
/**
* 
*/
class Grupos_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_all() {
		$this->db->select('grupos.*, departamentos.nombre as d_nombre');
		$this->db->from('grupos');
		$this->db->join('departamentos','grupos.departamento_id = departamentos.id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_valid() {
		$this->db->select('grupos.*, departamentos.id as d_id');
		$this->db->from('grupos');
		$this->db->join('permisos','grupos.id = permisos.grupo_id');
		$this->db->join('departamentos','grupos.departamento_id = departamentos.id');
		$this->db->distinct('grupos.id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function save() {
		$data = array(
	        'nombre' => ucwords($this->input->post('nombre')),
	        'departamento_id' => $this->input->post('departamento_id') 
	    );
	    return $this->db->insert('grupos', $data);
	}

	public function get_count(){
		return $this->db->count_all('grupos');
	}
}