<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trains extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('assets');
        $this->load->helper('url');
    }

	public function index(){
        $this->load->view('header/head');
		$this->load->view('body/trains');
        $this->load->view('footer/footerjs');
        $this->load->view('footer/footer'); 
	}
    
    public function api_aller(){
        $this->load->library('apisncf');
        $paramsAller = ['from' => 'admin:fr:30189', 'to' => 'admin:fr:34172', 'datetime' => strftime('%Y%m%dT%H%M%S', time()), 'datetime_represents' => 'departure', 'min_nb_journeys' => 10]; 
        echo json_encode($this->apisncf->get_tab_trains($paramsAller));
    }
}