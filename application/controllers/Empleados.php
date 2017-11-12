<?php
/**
* 
*/
class Empleados extends CI_Controller {
	public function lista() {
		$this->load->model('empleados_model');
		$data['empleados'] = $this->empleados_model->get_all();

		$this->load->view('templates/header');
		$this->load->view('empleados/lista',$data);
		$this->load->view('templates/footer');
	}

	public function agregar() {
		$this->load->model('permisos_model');
		if ($this->permisos_model->get_count() == 0) {
			$this->load->view('templates/header');
			$this->load->view('empleados/error');
			$this->load->view('templates/footer');
			return;
		}

		$this->load->library('form_validation');
		$this->load->model('empleados_model');

		// Reglas del empleado
		$this->form_validation->set_rules('nombre','Nombre',
			'trim|required|alpha_numeric_spaces|max_length[20]',
			array(
				'required' => 'Por favor indique un nombre.',
				'alpha_numeric_spaces' => 'Solo use letras, números o espacios (Nombre).',
				'max_length' => 'Máximo 20 caracteres (Nombre).'
			)
		);
		$this->form_validation->set_rules('ap_p','Apellido paterno',
			'trim|required|alpha_numeric_spaces|max_length[20]',
			array(
				'required' => 'Por favor indique un apellido paterno.',
				'alpha_numeric_spaces' => 'Solo use letras, números o espacios (Ap. paterno).',
				'max_length' => 'Máximo 20 caracteres (Ap. paterno).'
			)
		);
		$this->form_validation->set_rules('ap_m','Apellido materno',
			'trim|required|alpha_numeric_spaces|max_length[20]',
			array(
				'required' => 'Por favor indique un apellido materno.',
				'alpha_numeric_spaces' => 'Solo use letras, números o espacios (Ap. materno).',
				'max_length' => 'Máximo 20 caracteres (Ap. materno).'
			)
		);

		if ($this->form_validation->run()) {
			$this->empleados_model->save();
			redirect('empleados/lista');
			return;
		}

		$this->load->model('departamentos_model');
		$this->load->model('grupos_model');

		$data['departamentos'] = $this->departamentos_model->get_all_valid();
		$data['grupos_json'] = json_encode($this->grupos_model->get_all_valid());
		$data['permisos_json'] = json_encode($this->permisos_model->get_all());

		$this->load->view('templates/header');
		$this->load->view('empleados/agregar', $data);
		$this->load->view('templates/footer');
	}
}