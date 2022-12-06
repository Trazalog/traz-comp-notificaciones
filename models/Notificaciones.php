<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Modelo de Notificaciones 
*
* @autor Rogelio Sanchez
*/
class Notificaciones extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        log_message('DEBUG','#TRAZA | #TRAZ-COMP-NOTIFICACIONES | Notificaciones | cargado exitósamente');
    }

    function insert_image($data){
        
        log_message('DEBUG','#TRAZA | #TRAZ-COMP-NOTIFICACIONES | Notificaciones | insert_image: '.json_encode($data));
        $this->db->insert("core.tbl_images", $data); 
        
    }  
    
    function fetch_image(){

           $output = '';  
           $this->db->select("name");  
           $this->db->from("core.tbl_images");  
           $this->db->order_by("id", "DESC");  
           $query = $this->db->get();  
           foreach($query->result() as $row)  
           {  
                $output .= '  
                     <div class="col-md-3">  
                          <img src="'.base_url().'upload/'.$row->name.'" class="img-responsive img-thumbnail" />  
                     </div>  
                ';  
           }  
           return $output;  
      }  

}