<?php
/**
* 
*/
class Modulos extends CI_Controller {
	public function departamentos() {
		$this->load->library('form_validation');
		$this->load->model('departamentos_model');

		$this->form_validation->set_rules('nombre','Nombre',
			'trim|required|alpha_numeric_spaces|is_unique[departamentos.nombre]|max_length[20]',
			array(
				'required' => 'Por favor indique un nombre.',
				'alpha_numeric_spaces' => 'Solo números, letras y/o espacios.',
				'is_unique' => 'El nombre ya existe.',
				'max_length' => 'Máximo 20 caracteres'
			)
		);

		if ($this->form_validation->run()) {
			$this->departamentos_model->save();
			redirect('modulos/departamentos');
			return;
		}

		$data['departamentos'] = $this->departamentos_model->get_all();
		$this->load->view('templates/header');
		$this->load->view('departamentos/vista', $data);
		$this->load->view('templates/footer');
	}

	public function grupos() {
		$this->load->model('departamentos_model');
		if ($this->departamentos_model->get_count() == 0) {
			$this->load->view('templates/header');
			$this->load->view('grupos/error');
			$this->load->view('templates/footer');
			return;
		}

		$this->load->model('grupos_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre',
			'trim|required|alpha_numeric_spaces|is_unique[grupos.nombre]|max_length[20]',
			array(
				'required' => 'Por favor indique un nombre.',
				'alpha_numeric_spaces' => 'Solo números, letras y/o espacios.',
				'is_unique' => 'El nombre ya existe.',
				'max_length' => 'Máximo 20 caracteres'
			)
		);

		if ($this->form_validation->run()) {
			$this->grupos_model->save();
			redirect('modulos/grupos');
			return;
		}

		$data['grupos'] = $this->grupos_model->get_all();
		$data['departamentos'] = $this->departamentos_model->get_all();
		$this->load->view('templates/header');
		$this->load->view('grupos/vista', $data);
		$this->load->view('templates/footer');
	}

	public function permisos() {
		$this->load->model('grupos_model');
		if ($this->grupos_model->get_count() == 0) {
			$this->load->view('templates/header');
			$this->load->view('permisos/error');
			$this->load->view('templates/footer');
			return;
		}

		$this->load->model('permisos_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Nombre',
			'trim|required|alpha_numeric_spaces|is_unique[permisos.nombre]|max_length[20]',
			array(
				'required' => 'Por favor indique un nombre.',
				'alpha_numeric_spaces' => 'Solo números, letras y/o espacios.',
				'is_unique' => 'El nombre ya existe.',
				'max_length' => 'Máximo 20 caracteres'
			)
		);

		if ($this->form_validation->run()) {
			$this->permisos_model->save();
			redirect('modulos/permisos');
			return;
		}

		$data['permisos'] = $this->permisos_model->get_all();
		$data['grupos'] = $this->grupos_model->get_all();
		$this->load->view('templates/header');
		$this->load->view('permisos/vista', $data);
		$this->load->view('templates/footer');
	}
}