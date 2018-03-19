<?
function __construct()

{

parent::__construct();

$this->load->database();

}

class dashboard_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function getTotalAsociaciones()
        {
        		//$this->load->database();
                $query = $this->db->count_all_results('SAP_ASOCIACIONES');
                return $query;
        }

        public function getTotalAsociacionesPorTipo($tipo)
        {
               	$where = "ID_SECTOR_ASOCIACIONES=".$tipo;
              	$this->db->where($where);
				 $query = $this->db->count_all_results('SAP_ASOCIACIONES');
				
                return $query;
        }

        public function getTotalAsociadosPorEstado($tipo)
        {
               	$where = "ESTADO_HISTORICO like '".$tipo."%'";
              	$this->db->where($where);
				 $query = $this->db->count_all_results('SAP_HISTORICO_ASOC_AFILIADO');
				
                return $query;
        }

        public function getTotalSolicitudesPorTipo()
        {
               //$this->db->select('COUNT(a.ID_CLASE_ASOCIACION) AS TOT, b.NOMBRE_CLASE_ASOCIACION');
				//$this->db->from('SAP_ASOCIACION a, SAP_CLASE_ASOCIACION b');
				//$this->db->where('a.ID_CLASE_ASOCIACION = b.ID_CLASE_ASOCIACION AND b.ID_CLASE_ASOCIACION <> 8 GROUP BY b.NOMBRE_CLASE_ASOCIACION');
				$query = $this->db->query("
											SELECT COUNT(ESTADO_SOLICITUD) AS total, ESTADO_SOLICITUD as nombre 
  											FROM SAP_SOLICITUD 
  											 GROUP BY ESTADO_SOLICITUD
  											");
				$aux=$query->result_array();
				
                return $aux;
        }

        public function getTotalAsociacionesPrivadasPorTipo()
        {
               //$this->db->select('COUNT(a.ID_CLASE_ASOCIACION) AS TOT, b.NOMBRE_CLASE_ASOCIACION');
				//$this->db->from('SAP_ASOCIACION a, SAP_CLASE_ASOCIACION b');
				//$this->db->where('a.ID_CLASE_ASOCIACION = b.ID_CLASE_ASOCIACION AND b.ID_CLASE_ASOCIACION <> 8 GROUP BY b.NOMBRE_CLASE_ASOCIACION');
				$query = $this->db->query("
											SELECT COUNT(a.ID_CLASE_ASOCIACIONES) AS TOT, b.NOMBRE_CLASE_ASOCIACION as nombre 
  											FROM SAP_ASOCIACIONES a, SAP_CLASE_ASOCIACION b 
  											WHERE a.ID_CLASE_ASOCIACIONES = b.ID_CLASE_ASOCIACION AND b.ID_CLASE_ASOCIACION <> 8 
  											GROUP BY b.NOMBRE_CLASE_ASOCIACION
  											");
				$aux=$query->result_array();
				
                return $aux;
        }

}
?>