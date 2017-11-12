<?php
/**
* 
*/
class Home extends CI_Controller {
	private function order_actions($actions){
		$result = array();
		foreach ($actions as $action) {
			if (! isset($result[$action['d_nombre']]) ) {
				$result[$action['d_nombre']] = array();
			}
			if (!isset( $result[$action['d_nombre']][$action['g_nombre']] )) {
				$result[$action['d_nombre']][$action['g_nombre']] = array();
			}
			$result[$action['d_nombre']][$action['g_nombre']][$action['p_nombre']] = 
			array($action['crear'],$action['eliminar'],$action['modificar']);
		}
		return $result;
	}
	
	public function index() {
		if ($this->session->userdata('logged_in')) {
			$this->load->model('empleados_model');
			$data['acciones'] = $this->order_actions(
				$this->empleados_model->get_actions($this->session->userdata('logged_in'))
			);

			$this->load->view('templates/header');
			$this->load->view('home/dashboard',$data);
			$this->load->view('templates/footer');
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('empleado_id','ID',
			'trim|required|numeric',
			array(
				'required' => 'Por favor indique el ID.',
				'numeric' => 'El ID es numérico.'
			)
		);

		if ($this->form_validation->run()) {
			$this->load->model('empleados_model');
			$empleado = $this->empleados_model->get_by_id($this->input->post('empleado_id'));
			if ($empleado) {
				$user_data = array(
					'logged_in' => $empleado['id']
				);
				$this->session->set_userdata($user_data);
				redirect();
				return;
			}
		}

		$this->load->view('templates/header');
		$this->load->view('home/access');
		$this->load->view('templates/footer');
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		redirect();
	}	
}