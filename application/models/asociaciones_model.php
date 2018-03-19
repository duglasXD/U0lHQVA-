<?
function __construct()

{

parent::__construct();

$this->load->database();

}

class asociaciones_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function getAllAsociaciones()
        {
        		//$this->load->database();
                $query = $this->db->get('SAP_ASOCIACIONES');
                return $query->result_array();
        }

        public function verSector($codigo)
        {
             // $where = "ID_ASOCIACION=".$codigo;
              $query = $this->db->query('select B.NOMBRE_SECTOR_ASOCIACION as nomSector from SAP_ASOCIACIONES a, SAP_SECTOR_ASOCIACION b where a.ID_SECTOR_ASOCIACIONES=b.ID_SECTOR_ASOCIACION AND  a.ID_ASOCIACIONES='.$codigo);
           if ($query->num_rows() > 0) {
                   return $query->row()->nomSector;
                }
            return "Sin sector";
        }

        public function verClase($codigo)
        {
             // $where = "ID_ASOCIACION=".$codigo;
              $query = $this->db->query('select B.NOMBRE_CLASE_ASOCIACION as nomClase from SAP_ASOCIACIONES a, SAP_CLASE_ASOCIACION b where a.ID_CLASE_ASOCIACIONES=b.ID_CLASE_ASOCIACION AND  a.ID_ASOCIACIONES ='.$codigo);
               if ($query->num_rows() > 0) {
                  return $query->row()->nomClase;
                }
            return "Sin Clase";
        }
        public function verTipo($codigo)
        {
             // $where = "ID_ASOCIACION=".$codigo;
              $query = $this->db->query('select B.NOMBRE_TIPO_ASOCIACION as tipoAsoc from SAP_ASOCIACIONES a, SAP_TIPO_ASOCIACION b where a.ID_TIPO_ASOCIACIONES=b.ID_TIPO_ASOCIACION AND  a.ID_ASOCIACIONES='.$codigo);
           if ($query->num_rows() > 0) {
                   return $query->row()->tipoAsoc;
                }
            return "Sin Tipo";
        }

        public function guardaAsociacion($data)
        {

              if($this->db->query("INSERT INTO SAP_ASOCIACIONES (ID_TIPO_ASOCIACIONES ,ID_SECTOR_ASOCIACIONES,AFILIACION_ID_ASOCIACIONES,ID_CLASE_ASOCIACIONES,ID_MUNICIPIO_ASOCIACIONES,NOMBRE_ASOCIACIONES,NUMERO_ASOCIACIONES, FECHA_CONSTITUCION_ASOCIACIONES,FECHA_RESOLUCION_FINAL,FOLIO_ASOCIACIONES,LIBRO_ASOCIACIONES,REG_ASOCIACIONES,INSTITUCION_PERTENECE_ASOCIACIONES,DIRECCION_ASOCIACIONES,EMAIL_ASOCIACIONES,TELEFONO_ASOCIACIONES,ESTADO_ASOCIACIONES,SIGLAS_ASOCIACIONES,HOMBRES_ASOCIACIONES,MUJERES_ASOCIACIONES,ARTICULO_ASOCIACIONES) VALUES(".$data['tipo'].",".$data['sector'].",".$data['dependencia'].",".$data['clase'].",".$data['municipio'].",'".$data['nombre']."','".$data['numero']."','".$data['constitucion']."','".$data['resolucion']."','".$data['folio']."','".$data['libro']."','".$data['reg']."','".$data['institucion']."','".$data['direccion']."','".$data['email']."','".$data['telefono']."','".$data['estado']."','".$data['siglas']."',0,0,'".$data['art']."')")){
              /************** Inicio de fragmento bitácora *********************
              $this->bitacora_model->bitacora("Se registró el modulo '".$data["nombre"]."' con id: ".$id." para el sistema con id: ".$data["id_sistema"],"3");
                    /************** Fin de fragmento bitácora *********************/
              return "exito";
            }else{
              return "fracaso";
            }
        }
        public function getAsociacion($codigo)
        {
            //$this->load->database();
                $where = "ID_ASOCIACIONES=".$codigo;
                $this->db->where($where);
                $query = $this->db->get('SAP_ASOCIACIONES');
                return $query->result_array();
        }

        public function getClasesAsociacion($tipo)
        {
          
          if($tipo==1)
          {
            $where = "NOMBRE_CLASE_ASOCIACION LIKE '%PUBLICOS%'";
          }
          else
          {
            $where = "NOMBRE_CLASE_ASOCIACION NOT LIKE '%PUBLICOS%'";
          }

          $this->db->where($where);
          $query = $this->db->get('SAP_CLASE_ASOCIACION');
          return $query->result_array();

        }
        public function getAllTipoAsociacion ()
        {
            $query = $this->db->get('SAP_TIPO_ASOCIACION');
            return $query->result_array();

        }
        public function getAllSectorAsociacion()
        {
            $query = $this->db->get('SAP_SECTOR_ASOCIACION');
            return $query->result_array();

        }
        public function getAllDeptos()
        {
            $query = $this->db->get('SAP_DEPARTAMENTO');
            return $query->result_array();

        }
        public function getMunicipiosByDepto($depto)
        {
            $this->db->where('ID_DEPARTAMENTO ='.$depto);
            $query = $this->db->get('SAP_MUNICIPIO');
            return $query->result_array();

        }
        public function getDependencias($tipo)
        {
            $tipo--;
            if($tipo!=0)
            {
              $where = "ID_TIPO_ASOCIACIONES =".$tipo;
               $this->db->where($where);
              $query = $this->db->get('SAP_ASOCIACIONES');
              if($query->result_array())
              {
                return $query->result_array();
              }
              return -1;
            }
            
            return 0;
        }

         public function verTipoAsoc($tipo)
        {
             // $where = "ID_ASOCIACION=".$codigo;
              $query = $this->db->query('select NOMBRE_TIPO_ASOCIACION as tipoAsoc from SAP_TIPO_ASOCIACION  where ID_TIPO_ASOCIACION='.$tipo);
           if ($query->num_rows() > 0) {
                   return $query->row()->tipoAsoc;
                }
            return "Sin Tipo";
        }
        public function getCorrelativo($sector,$tipo,$afiliacion)
        {
          $query = $this->db->query('SELECT MAX(NUMERO_ASOCIACIONES) AS ULTIMO  FROM SAP_ASOCIACIONES WHERE ID_SECTOR_ASOCIACIONES = '.$sector.' AND ID_TIPO_ASOCIACIONES = '.$tipo.' AND AFILIACION_ID_ASOCIACIONES = '.$afiliacion.'');
           if ($query->num_rows() > 0 &&  $query->row()->ULTIMO != NULL) {
                   return $query->row()->ULTIMO;
                }
            return 0;
        }

      /*  public function getTotalAsociacionesPorTipo($tipo)
        {
               	$where = "ID_SECTOR_ASOCIACION=".$tipo;
              	$this->db->where($where);
				 $query = $this->db->count_all_results('SAP_ASOCIACION');
				
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
											SELECT COUNT(a.ID_CLASE_ASOCIACION) AS TOT, b.NOMBRE_CLASE_ASOCIACION as nombre 
  											FROM SAP_ASOCIACION a, SAP_CLASE_ASOCIACION b 
  											WHERE a.ID_CLASE_ASOCIACION = b.ID_CLASE_ASOCIACION AND b.ID_CLASE_ASOCIACION <> 8 
  											GROUP BY b.NOMBRE_CLASE_ASOCIACION
  											");
				$aux=$query->result_array();
				
                return $aux;
        }*/

}
?>