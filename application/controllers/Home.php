<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $f= 'home/';
	private $datos= array();
	private $mostrar_barra= true;

	public function __construct(){		
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->datos['js']= 'gastos.js';
	}

	public function index()
	{
		$this->main();
	}

	public function main(){
		$this->mostrar();
	}

	private function mostrar($vista= "gastos"){
		$this->load->view('plantillas/cabecera', $this->datos);		
		if ($this->mostrar_barra){
			$this->load->view('plantillas/navbar', $this->datos);	
		}
		$this->load->view($this->f.$vista, $this->datos);
		$this->load->view('plantillas/pie', $this->datos);
	}
}
