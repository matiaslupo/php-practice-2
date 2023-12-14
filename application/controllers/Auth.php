<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $f= "auth/";
	private $datos= array();

	private function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->main();
	}

	public function main(){
		$this->mostrar();
	}

	public function login(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nick', 'Nombre de usuario', 'trim|required');
		$this->form_validation->set_rules('clave', 'Clave', 'required');
		if ($this->form_validation->run() === false){
			$this->datos['errores']= validation_errors();
			redirect('auth');
			exit();
		}		
	}

	private function mostrar($vista= "login"){
		$this->load->view('plantillas/cabecera', $this->datos);
		$this->load->view($this->f.$vista, $this->datos);
		$this->load->view('plantillas/pie', $this->datos);
	}
}
