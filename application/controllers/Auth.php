<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $f= "auth/";
	private $datos= array();

	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		$this->main();
	}

	public function main(){
		if (isset($_SESSION['usuario_id'])){
			redirect('home');
			return;
		}
		$this->mostrar();
	}

	public function login(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nick', 'Nombre de usuario', 'trim|required');
		$this->form_validation->set_rules('clave', 'Clave', 'required');
		if ($this->form_validation->run()){				
			$nick= $this->input->post('nick');
			$password= $this->input->post('clave');			
			if ($res= $this->usuarios_model->login($datos= array('nick' => $nick, 'password' => $password))){
				$_SESSION['usuario_id']= $res['usuario_id'];
				$_SESSION['usuario']= $nick;
				redirect('home');
				return;
			}
			else{
				$this->datos['errores']= 'Credenciales invalidas, intente de nuevo';				
			}
		}		
		else {			
			$this->datos['errores']= validation_errors();
		}
		$this->mostrar();
	}

	public function cerrar_sesion(){

	}

	private function mostrar($vista= "login"){
		$this->load->view('plantillas/cabecera', $this->datos);
		$this->load->view($this->f.$vista, $this->datos);
		$this->load->view('plantillas/pie', $this->datos);
	}
}
