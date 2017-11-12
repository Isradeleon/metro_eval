<?php
/**
* 
*/
class Permisos_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_all() {
		$this->db->select('permisos.*, grupos.nombre as g_nombre, grupos.id as g_id, departamentos.nombre as d_nombre');
		$this->db->from('permisos');
		$this->db->join('grupos','permisos.grupo_id = grupos.id');
		$this->db->join('departamentos','grupos.departamento_id = departamentos.id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function save() {
		$data = array(
	        'nombre' => ucwords($this->input->post('nombre')),
	        'grupo_id' => $this->input->post('grupo_id')
	    );
	    return $this->db->insert('permisos', $data);
	}

	public function get_count(){
		return $this->db->count_all('permisos');
	}
}