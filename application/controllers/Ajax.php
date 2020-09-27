<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct(){
       parent::__construct();
       
        $this->Gare1 = "admin:fr:30189";  
        $this->Gare2 = "admin:fr:34172";
       
        //NE PAS MODIFIER
        $this->load->helper('url');
        $this->load->helper('assets');
        
    }
    
    public function ajax(){  

        if($this->input->post('block') == 'trainsAller'){ 
            $this->load->library('apisncf'); 
            $paramsAller = ['from' => $this->Gare1, 'to' => $this->Gare2, 'datetime' => strftime('%Y%m%dT%H%M%S', time()), 'datetime_represents' => 'departure', 'min_nb_journeys' => 10]; 
            echo json_encode(tabtrain($this->apisncf->get_tab_trains($paramsAller)));
        }
        
        if($this->input->post('block') == 'trainsRetour'){ 
           $this->load->library('apisncf'); 
           $paramsRetour = ['from' => $this->Gare2, 'to' => $this->Gare1, 'datetime' => strftime('%Y%m%dT%H%M%S', time()), 'datetime_represents' => 'departure', 'min_nb_journeys' => 10]; 
           echo json_encode(tabtrain($this->apisncf->get_tab_trains($paramsRetour)));
        }
    }
}