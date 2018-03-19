<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SapAsociacion extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('asociaciones_model', 'AM',true);
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
		
		$data['asociaciones']=$this->AM->getAllAsociaciones();

		//$totalAsociaciones['publicas']=$this->DM->getTotalAsociacionesPorTipo(1);
		//$totalAsociaciones['privadas']=$this->DM->getTotalAsociacionesPorTipo(2);
		//$totalAsociaciones['afiliados']=$this->DM->getTotalAsociadosPorEstado('A');
		//$totalAsociaciones['tipos']=$this->DM->getTotalAsociacionesPrivadasPorTipo();
		//$totalAsociaciones['solicitudes']=$this->DM->getTotalSolicitudesPorTipo();
		// $totalAsociaciones['colores']= array();
		$this->load->view('indexAsociacion',$data);
		//$this->load->view('switch');
		$this->load->view('footer');
		$this->load->view('scripts');
		//$this->load->view('graficasDashboard');
	}
	public function newSapAsociacion()
	{
		//$hola='hola';
		$this->load->view('headFormularios');
		//$this->load->view('top_bar');
		//$this->load->view('menu');
		//$this->load->model('asociaciones_model', 'AM',true);
		//$data['asociaciones']=$this->AM->getAllAsociaciones();

		//$totalAsociaciones['publicas']=$this->DM->getTotalAsociacionesPorTipo(1);
		//$totalAsociaciones['privadas']=$this->DM->getTotalAsociacionesPorTipo(2);
		//$totalAsociaciones['afiliados']=$this->DM->getTotalAsociadosPorEstado('A');
		//$totalAsociaciones['tipos']=$this->DM->getTotalAsociacionesPrivadasPorTipo();
		//$totalAsociaciones['solicitudes']=$this->DM->getTotalSolicitudesPorTipo();
		// $totalAsociaciones['colores']= array();
		$this->load->model('asociaciones_model', 'AM',true);
		$data['sector']=$this->AM->getAllSectorAsociacion();
		$data['deptos']=$this->AM->getAllDeptos();
		$data['tipos']=$this->AM->getAllTipoAsociacion();


		$this->load->view('asociaciones/frmNuevaAsociacion',$data);
		//$this->load->view('switch');
		//$this->load->view('footer');
		//$this->load->view('scripts');
		//$this->load->view('graficasDashboard');
	}

	public function saveAsociacion()
	{

		$data = array(
			'nombre' => $this->input->post('nombreAsociacion'), 
			'numero' => $this->input->post('numeroAsociacion'),
			'siglas' => $this->input->post('siglasAsociacion'),
			'tipo' => $this->input->post('tipoAsociacion'),
			'institucion' => $this->input->post('institucionAsociacion'),
			'dependencia' => $this->input->post('dependenciaAsociacion'),
			'municipio' => $this->input->post('municipioAsociacion'),
			'sector' => $this->input->post('sectorAsociacion'),
			'libro' => $this->input->post('numeroLibro'),
			'clase' => $this->input->post('claseAsociacion'),
			'folio' => $this->input->post('folioAsociacion'),
			'constitucion' => $this->input->post('fechaConstitucionAsociacion'),
			'resolucion' => $this->input->post('resolucionFinal'),
			'email' => $this->input->post('emailAsociacion'),
			'telefono' => $this->input->post('telefonoAsociacion'),
			'direccion' => $this->input->post('direccionAsociacion'),
			'estado' => $this->input->post('estadoAsociacion'),
			'reg' => $this->input->post('regAsociacion'),
			'art' => $this->input->post('articuloAsociacion')
			);
			$this->load->model('asociaciones_model', 'AM',true);
			echo $this->AM->guardaAsociacion($data);
	}
	public function updateAsociacion()
	{
		//$hola='hola';
		$this->load->view('headFormularios');
		$this->load->model('asociaciones_model', 'AM',true);
		$data['sector']=$this->AM->getAllSectorAsociacion();
		$data['deptos']=$this->AM->getAllDeptos();
		$data['tipos']=$this->AM->getAllTipoAsociacion();
		$data['asociacion']=$this->AM->getAsociacion($this->input->get('id'));
		$this->load->view('asociaciones/frmEditAsociacion',$data);

	}

	public function viewAsociacion()
	{
		$this->load->view('headFormularios');
		$this->load->model('asociaciones_model', 'AM',true);
		$data['sector']=$this->AM->getAllSectorAsociacion();
		$data['deptos']=$this->AM->getAllDeptos();
		$data['tipos']=$this->AM->getAllTipoAsociacion();
		
		$data['asociacion']=$this->AM->getAsociacion($this->input->get('id'));
		$this->load->view('asociaciones/frmViewAsociacion',$data);

	}

	public function cargarSelect()
	{
		
		$this->load->model('asociaciones_model', 'AM',true);
		$data=$this->AM->getClasesAsociacion($this->input->post('tipo'));
		foreach ($data as $item) {
		 	echo "<option value='".$item['ID_CLASE_ASOCIACION']."'>".$item['NOMBRE_CLASE_ASOCIACION']."</option>";
		 }
	}
	public function cargarDependencia()
	{
		$tipo = $this->input->post('tipo');
		//$this->load->model('asociaciones_model', 'AM',true);
		$data=$this->AM->getDependencias($tipo);
		if($data==0)
		{
			echo "<option value='0'>No aplica</option>";
		}
		else{
			if($data==-1)
			{
				$tipo--;
				echo "<option value='0'>Ninguna</option>";
				//echo "<option value='0'>No hay ".$this->AM->verTipoAsoc($tipo)."</option>";
			}
			else{
				echo "<option value='0'>Ninguna</option>";
				foreach ($data as $item) {
			 		echo "<option value='".$item['ID_ASOCIACIONES']."'>".$item['NOMBRE_ASOCIACIONES']."</option>";
				 }
			}
			
		}

	}
	function cargarCorrelativo()
	{
		$tipo = $this->input->post('tipo');
		$sector = $this->input->post('sector');
		$afiliacion = $this->input->post('dependencia');
		$data=$this->AM->getCorrelativo($sector,$tipo,$afiliacion);
		//echo $data;
		if($data == 0)
		{
			if($sector == 1)
			{			
					switch($tipo)
					{
						case 1:
								$correlativo = 'C.S.P. 1';

							break;

						case 2:
								 $correlativo = 'F.S.P. 1';
								
						break;

						case 3: $correlativo = '1 S.P.';
								
						break;

						case 4:
								if($afiliacion>0)
									{
										$aux = explode(" ", $this->AM->getNumeroAsoc($afiliacion));
										$correlativo = $aux[0].' S-1';
									}else{
										echo 0;
										return 0;
									}
								
						break;
					}	
				 echo $correlativo;
			}
			else {
					switch($tipo)
					{
						case 1:
								$correlativo = 'C-1';
							break;

						case 2:
								 $correlativo = 'F-1';
								
						break;

						case 3: $correlativo = '1';
								 
						break;

						case 4:
								if($afiliacion>0)
									{
										$aux = explode(" ", $this->AM->getNumeroAsoc($afiliacion));
										$correlativo = $aux[0].' S-1';
									}else{
										echo 0;
										return 0;
									}
								
						break;
					}
					 echo $correlativo;	
			}
			

		}
		else{
			if($sector == 1)
			{			
					switch($tipo)
					{
						case 1:
								$aux = explode(" ", $data);
								$correlativo = $aux[0].' '.($aux[1]+1);

							break;

						case 2:
								$aux = explode(" ", $data);
								$correlativo = $aux[0].' '.($aux[1]+1);
								
						break;

						case 3: $aux = explode(" ", $data);
								$correlativo = ($aux[0]+1).' '.$aux[1];
								
						break;

						case 4:
								$aux = explode(" ", $data);
								$aux2=explode("-", $aux[1]);
								$correlativo = ($aux[0]).' '.$aux2[0].'-'.($aux2[1]+1);
								
						break;
					}	
				 echo $correlativo;
			}
			else {
					switch($tipo)
					{
						case 1:
								$aux=explode("-", $data);
								$correlativo = $data[0].'-'.($aux[1]+1);
							break;

						case 2:
								$aux=explode("-", $data);
								$correlativo = $data[0].'-'.($aux[1]+1);
								
						break;

						case 3: $correlativo = $data++;
								 
						break;

						case 4:
								$aux = explode(" ", $data);
								$aux2=explode("-", $aux[1]);
								$correlativo = ($aux[0]).' '.$aux2[0].'-'.($aux2[1]+1);
								
						break;
					}
					 echo $correlativo;	
			}

		}
	}

}
