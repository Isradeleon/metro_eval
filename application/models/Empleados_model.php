<?php
/**
* 
*/
class Empleados_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_actions($id) {
		$this->db->select('acciones.*, permisos.nombre as p_nombre, 
			grupos.nombre as g_nombre, 
			grupos.id as g_id,
			departamentos.nombre as d_nombre,
			departamentos.id as d_id');
		$this->db->from('acciones');
		$this->db->join('permisos','permisos.id = acciones.permiso_id');
		$this->db->join('grupos','permisos.grupo_id = grupos.id');
		$this->db->join('departamentos','grupos.departamento_id = departamentos.id');
		$this->db->where('acciones.empleado_id',$id);
		$this->db->order_by('d_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all() {
		$query = $this->db->get('empleados');
		return $query->result_array();
	}

	public function get_by_id($id) {
		$query = $this->db->get_where('empleados',
			array('id' => $id)
		);
		return $query->row_array();
	}

	public function save() {
		$data = array(
	        'nombre' => ucwords(strtolower($this->input->post('nombre'))),
	        'ap_p' => ucwords(strtolower($this->input->post('ap_p'))),
	        'ap_m' => ucwords(strtolower($this->input->post('ap_m')))
	    );

	    $this->db->insert('empleados', $data);
		$empleado_id = $this->db->insert_id();

		foreach ($this->input->post('privileges') as $privilege) {
			$relation = array(
				'empleado_id' => $empleado_id,
				'permiso_id' => $privilege,
				'crear' => $this->input->post('crear'.$privilege) || false,
				'eliminar' => $this->input->post('eliminar'.$privilege) || false,
				'modificar' => $this->input->post('modificar'.$privilege) || false
			);

			$this->db->insert('acciones', $relation);
		}

	}
}