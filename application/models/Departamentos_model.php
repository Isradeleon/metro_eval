<?php
/**
* 
*/
class Departamentos_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_all() {
		$query = $this->db->get('departamentos');
		return $query->result_array();
	}

	public function get_all_valid() {
		$this->db->select('departamentos.*');
		$this->db->from('departamentos');
		$this->db->join('grupos','departamentos.id = grupos.departamento_id');
		$this->db->join('permisos','grupos.id = permisos.grupo_id');
		$this->db->distinct('departamentos.id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function save() {
		$data = array(
	        'nombre' => ucwords($this->input->post('nombre'))	    
	    );
	    return $this->db->insert('departamentos', $data);
	}

	public function get_count(){
		return $this->db->count_all('departamentos');
	}
}