<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$hola='hola';
		$this->load->view('head');
		$this->load->view('top_bar');
		$this->load->view('menu');
		$this->load->model('dashboard_model', 'DM',true);
		$totalAsociaciones['total']=$this->DM->getTotalAsociaciones();
		$totalAsociaciones['publicas']=$this->DM->getTotalAsociacionesPorTipo(1);
		$totalAsociaciones['privadas']=$this->DM->getTotalAsociacionesPorTipo(2);
		$totalAsociaciones['afiliados']=$this->DM->getTotalAsociadosPorEstado('A');
		$totalAsociaciones['tipos']=$this->DM->getTotalAsociacionesPrivadasPorTipo();
		$totalAsociaciones['solicitudes']=$this->DM->getTotalSolicitudesPorTipo();
		 $totalAsociaciones['colores']= array();
		$this->load->view('dashboard',$totalAsociaciones);
		//$this->load->view('switch');
		$this->load->view('footer');
		$this->load->view('scripts');
		$this->load->view('graficasDashboard');
	}
}
